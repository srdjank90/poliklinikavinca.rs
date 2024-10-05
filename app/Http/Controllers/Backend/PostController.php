<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\GenerateController;
use App\Models\File;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends BackendController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Items per page
        $perPage = getOption('post_per_page_opt', 8);
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } else {
            $posts = Post::orderBy('created_at', 'desc')->paginate($perPage);
        }
        return view('backend.posts.index', compact(['posts', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view('backend.posts.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
        $post->slug = Str::slug($post->title, '-');

        if ($request->post_image) {
            $imageFile = $request->file('post_image');
            $extension  = $imageFile->getClientOriginalExtension();
            $originalName = $imageFile->getClientOriginalName();
            $mimeType = $imageFile->getMimeType();
            $imagePath = date('Y') . "/" . date('m');
            $size = $imageFile->getSize();
            // Check is image already exists
            if (File::where('path', $imagePath . "/" . $originalName)->exists()) {
                $originalName = $this->regenerateOriginalName($imagePath, $originalName, $extension);
            }
            $path = Storage::disk('public')->putFileAs($imagePath, $imageFile, $originalName);
            $imageData = [
                "name" => str_replace("." . $extension, "", $originalName),
                "path" => $path,
                "size" => $size,
                "mime_type" => $mimeType,
                "extension" => $extension,
                "media_type" => "image",
                "user_id" => Auth::id()
            ];
            $uploadedImage = File::create($imageData)->id;
            $post->image_id = $uploadedImage;
        }

        $gc = new GenerateController();
        $gc->sitemap();

        $post->save();
        $id = $post->id;
        return response()->json(['success' => true, 'error' => null, 'id' => $id, 'url' => route('backend.posts.edit', $id)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $post = Post::with('categories')->findOrFail($id);
        $postCategories = PostCategory::all();
        $postCategoriesIds = $post->categories->pluck('id')->toArray();
        return view('backend.posts.edit', compact(['post', 'postCategories', 'postCategoriesIds']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);

        $post = Post::find($id);
        $post->update($request->except(['post_image', 'highlighted', 'footer_display', 'menu_display', 'product_single_display']));
        $post->highlighted = isset($request->highlighted) ? 1 : 0;
        $post->footer_display = isset($request->footer_display) ? 1 : 0;
        $post->menu_display = isset($request->menu_display) ? 1 : 0;
        $post->product_single_display = isset($request->product_single_display) ? 1 : 0;
        $post->categories()->sync($request->categories);

        if ($request->post_image) {
            $imageFile = $request->file('post_image');
            $extension  = $imageFile->getClientOriginalExtension();
            $originalName = $imageFile->getClientOriginalName();
            $mimeType = $imageFile->getMimeType();
            $imagePath = date('Y') . "/" . date('m');
            $size = $imageFile->getSize();
            // Check is image already exists
            if (File::where('path', $imagePath . "/" . $originalName)->exists()) {
                $originalName = $this->regenerateOriginalName($imagePath, $originalName, $extension);
            }
            $path = Storage::disk('public')->putFileAs($imagePath, $imageFile, $originalName);
            $imageData = [
                "name" => str_replace("." . $extension, "", $originalName),
                "path" => $path,
                "size" => $size,
                "mime_type" => $mimeType,
                "extension" => $extension,
                "media_type" => "image",
                "user_id" => Auth::id()
            ];
            $uploadedImage = File::create($imageData)->id;
            $post->image_id = $uploadedImage;
        }

        $post->save();

        $gc = new GenerateController();
        $gc->sitemap();

        return redirect()->route('backend.posts.edit', [$id])
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        $gc = new GenerateController();
        $gc->sitemap();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }

    /**
     * Settings for Posts
     */
    public function settings()
    {
        $posts = Post::all();
        $postCategories = PostCategory::all();
        $options = getOptions('post_');
        return view('backend.posts.settings', compact(['posts', 'postCategories', 'options']));
    }

    public function regenerateOriginalName($imagePath, $originalName, $extension)
    {
        $newOriginalName = '';
        $totalFilesSameName = File::where('path', $imagePath . "/" . $originalName)->count();
        $newOriginalName = str_replace("." . $extension, "-" . $totalFilesSameName . "." . $extension, $originalName);
        return $newOriginalName;
    }
}
