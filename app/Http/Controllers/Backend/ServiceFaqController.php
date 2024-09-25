<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ServerBag;

class ServiceFaqController extends Controller
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
            $serviceFaqs = ServiceFaq::where('service_id', $serviceId)
                ->where('name', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
        } else {
            $serviceFaqs = ServiceFaq::where('service_id', $serviceId)
                ->orderBy('created_at', 'desc')->paginate($perPage);
        }
        return view('backend.services.faqs.index', compact(['serviceFaqs', 'service', 'search']));
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
        $serviceFaq = new ServiceFaq($request->all());
        $serviceFaq->service_id = $serviceId;
        $serviceFaq->save();
        $id = $serviceFaq->id;
        return response()->json(['success' => true, 'error' => null, 'id' => $id, 'url' => route('backend.services.faqs.edit', [$serviceId, $id])]);
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
    public function edit(string $serviceId, string $id)
    {
        $service = Service::findOrFail($serviceId);
        $serviceFaq = ServiceFaq::findOrFail($id);
        return view('backend.services.faqs.edit', compact(['service', 'serviceFaq']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $serviceId, string $id)
    {
        $request->validate([
            'question' => 'required',
        ]);

        $serviceFaq = ServiceFaq::find($id);
        $serviceFaq->update($request->all());
        $serviceFaq->save();

        return redirect()->route('backend.services.faqs.edit', [$serviceId, $id])
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceFaq = ServiceFaq::find($id);
        $serviceFaq->delete();
        return response()->json(['type' => 'success', 'message' => 'Deleted!'], 200);
    }
}
