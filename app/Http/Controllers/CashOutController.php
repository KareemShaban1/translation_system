<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cashOut = CashOut::with('user','client','service_provider','service')->get();
        return view('backend.pages.cash_out.index',compact('cashOut'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Service::all();
        $service_providers = ServiceProviders::all();
        $users = User::all();
        $clients = Client::all();
        return view('backend.pages.cash_out.create',
        compact('services','service_providers','users','clients'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validatedData = $request->validate([
            'receipt_number' => 'required|string',
            'date' => 'required|date',
            'expense' => 'required|in:rent,salary',
            'recipient' => 'required|in:client,service_provider,user',
            'service_id' => 'nullable|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        CashOut::create($validatedData);

        return redirect()->route('cash_out.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CashOut $cashOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $cashOut = CashOut::findOrFail($id);
        $services = Service::all();
        $service_providers = ServiceProviders::all();
        $users = User::all();
        $clients = Client::all();
        return view('backend.pages.cash_out.edit',
        compact('cashOut','services','service_providers','users','clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $validatedData = $request->validate([
            'receipt_number' => 'required|string',
            'date' => 'required|date',
            'expense' => 'required|in:rent,salary',
            'recipient' => 'required|in:client,service_provider,user',
            'service_id' => 'nullable|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $cashOut = CashOut::findOrFail($id);
        $cashOut->update($validatedData);

        return redirect()->route('cash_out.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cashOut = CashOut::findOrFail($id);
        $cashOut->delete;

        return redirect()->route('cash_out.index');
    }
}