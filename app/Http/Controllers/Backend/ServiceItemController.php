<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $serviceId)
    {
        $service = Service::find($serviceId);
        // Items per page
        $perPage = getOption('service_per_page_opt', 8);
        $search = '';
        if ($request->search && $request->search !== '') {
            $search = $request->search;
        }
        if ($search !== '') {
            $serviceItems = ServiceItem::where('service_id', $serviceId)
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } else {
            $serviceItems = ServiceItem::where('service_id', $serviceId)
                ->orderBy('created_at', 'desc')->paginate($perPage);
        }
        return view('backend.services.items.index', compact(['serviceItems', 'service', 'search']));
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
    public function store(Request $request, $serviceId)
    {
        $serviceItem = new ServiceItem($request->all());
        $serviceItem->service_id = $serviceId;
        $serviceItem->save();
        $id = $serviceItem->id;
        return response()->json(['success' => true, 'error' => null, 'id' => $id, 'url' => route('backend.services.items.edit', [$serviceId, $id])]);
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
    public function edit(string $serviceId, $id)
    {
        $service = Service::findOrFail($serviceId);
        $serviceItem = ServiceItem::findOrFail($id);
        return view('backend.services.items.edit', compact(['service', 'serviceItem']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $serviceId, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $serviceItem = ServiceItem::find($id);
        $serviceItem->update($request->all());
        $serviceItem->save();

        return redirect()->route('backend.services.items.edit', [$serviceId, $id])
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $serviceId, $id)
    {
        $serviceItem = ServiceItem::find($id);
        $serviceItem->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }
}
