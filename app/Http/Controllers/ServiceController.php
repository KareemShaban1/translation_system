<?php

namespace App\Http\Controllers;

use App\Models\ReceiveCash;
use App\Models\Service;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('backend2.pages.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend2.pages.services.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);
    
        // Store the service
        Service::create($validatedData);
    
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $service = Service::findOrFail($id);

        return view('backend2.pages.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $service = Service::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
    ]);

    // Update the service
    $service->update($validatedData);

    return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index');
    }

    public function serviceReceiveCash($id){
        $receiveCash= ReceiveCash::where('service_id',$id)->get();
        $data = [
            'receiveCash'=>$receiveCash
        ];

        $pdf =  PDF::loadView('backend2.pages.services.service_receive_cash',$data);
        return $pdf->stream('Report.pdf');
        
    }
}