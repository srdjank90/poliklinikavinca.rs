<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\GenerateController;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Items per page
        $perPage = getOption('service_per_page_opt', 8);
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $services = Service::with(['items', 'faqs'])->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } else {
            $services = Service::with(['items', 'faqs'])->orderBy('created_at', 'desc')->paginate($perPage);
        }
        return view('backend.services.index', compact(['services', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service($request->all());
        $service->slug = Str::slug($service->name, '-');

        if ($request->service_image) {
            $imageFile = $request->file('service_image');
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
            $service->image_id = $uploadedImage;
        }


        $service->save();
        $id = $service->id;

        $gc = new GenerateController();
        $gc->sitemap();

        return response()->json(['success' => true, 'error' => null, 'id' => $id, 'url' => route('backend.services.edit', $id)]);
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
        $service = Service::findOrFail($id);
        return view('backend.services.edit', compact(['service']));
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

        $service = Service::find($id);
        $service->update($request->except(['service_image']));

        if ($request->service_image) {
            $imageFile = $request->file('service_image');
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
            $service->image_id = $uploadedImage;
        }

        $service->save();

        $gc = new GenerateController();
        $gc->sitemap();

        return redirect()->route('backend.services.edit', [$id])
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        $gc = new GenerateController();
        $gc->sitemap();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }

    /**
     * Settings for Posts
     */
    public function settings()
    {
        $services = Service::all();
        $options = getOptions('service_');
        return view('backend.services.settings', compact(['services', 'options']));
    }

    public function regenerateOriginalName($imagePath, $originalName, $extension)
    {
        $newOriginalName = '';
        $totalFilesSameName = File::where('path', $imagePath . "/" . $originalName)->count();
        $newOriginalName = str_replace("." . $extension, "-" . $totalFilesSameName . "." . $extension, $originalName);
        return $newOriginalName;
    }
}
