<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends BackendController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $files = File::where('name', 'LIKE', '%' . $search . '%')
                ->latest()->paginate(15);
        } else {
            $files = File::latest()->paginate(15);
        }

        return view("backend.files.index", compact("files", 'search'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Check is file connected for some entity
        $file = File::find($id);
        $file->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }
}
