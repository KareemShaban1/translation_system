<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Models\ReceiveCash;
use App\Models\Service;
use App\Models\ServiceProviders;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ServiceProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $service_providers = ServiceProviders::all();

        return view('backend2.pages.service_providers.index',compact('service_providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $expense_types = ExpenseType::all();
        return view('backend2.pages.service_providers.create',compact('expense_types'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'another_phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:service_providers,email',
            'expense_type_id' => 'nullable|exists:expense_types,id',
        ]);
    
        // Store the service provider
        ServiceProviders::create($validatedData);
    
        return redirect()->route('service_providers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $serviceProvider = ServiceProviders::findOrFail($id);
        $expense_types = ExpenseType::all();

        return view('backend2.pages.service_providers.edit',compact('expense_types','serviceProvider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $serviceProvider = ServiceProviders::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'another_phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:service_providers,email,' . $serviceProvider->id,
            'expense_type_id' => 'nullable|exists:expense_types,id',

        ]);
    
        // Update the service provider
        $serviceProvider->update($validatedData);
    
        return redirect()->route('service_providers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $service_provider = ServiceProviders::findOrFail($id);
        $service_provider->delete();
        return redirect()->route('service_providers.index');

    }

    public function serviceProviderReceiveCash($id){
        $receiveCash= ReceiveCash::where('service_id',$id)->get();
        $data = [
            'receiveCash'=>$receiveCash
        ];

        $pdf =  PDF::loadView('backend2.pages.service_providers.service_provider_report',$data);
        return $pdf->stream('Report.pdf');
        
    }
}