<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Items per page
        $perPage = getOption('doctor_per_page_opt', 8);
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $doctors = Doctor::where('name', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } else {
            $doctors = Doctor::orderBy('created_at', 'desc')->paginate($perPage);
        }
        return view('backend.doctors.index', compact(['doctors', 'search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doctor = new Doctor($request->all());
        $doctor->slug = Str::slug($doctor->name, '-');

        if ($request->doctor_image) {
            $imageFile = $request->file('doctor_image');
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
            $doctor->image_id = $uploadedImage;
        }


        $doctor->save();
        $id = $doctor->id;
        return response()->json(['success' => true, 'error' => null, 'id' => $id, 'url' => route('backend.doctors.edit', $id)]);
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
        $doctor = Doctor::findOrFail($id);
        return view('backend.doctors.edit', compact(['doctor']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $doctor = Doctor::find($id);
        $doctor->update($request->except(['doctor_image']));

        if ($request->doctor_image) {
            $imageFile = $request->file('doctor_image');
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
            $doctor->image_id = $uploadedImage;
        }

        $doctor->save();

        return redirect()->route('backend.doctors.edit', [$id])
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }

    /**
     * Settings for Posts
     */
    public function settings()
    {
        $doctors = Doctor::all();
        $options = getOptions('doctor_');
        return view('backend.doctors.settings', compact(['doctors', 'options']));
    }
}
