<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ReceiveCash;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Illuminate\Http\Request;

class ReceiveCashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $receiveCash = ReceiveCash::with('user','client','service_provider','service')->get();
        return view('backend.pages.receive_cash.index',compact('receiveCash'));
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
        return view('backend.pages.receive_cash.create',
        compact('services','service_providers','users','clients'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'receipt_number' => 'required|string',
            'date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'paid_amount' => 'required|numeric',
        ]);

        ReceiveCash::create($validatedData);

        return redirect()->route('receive_cash.index');

        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ReceiveCash $receiveCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);
        $services = Service::all();
        $service_providers = ServiceProviders::all();
        $users = User::all();
        $clients = Client::all();
        return view('backend.pages.receive_cash.edit',
        compact('receiveCash','services','service_providers','users','clients'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);
        
        $validatedData = $request->validate([
            'receipt_number' => 'required|string',
            'date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'paid_amount' => 'required|numeric',
        ]);
        
        $receiveCash->update($validatedData);

        return redirect()->route('receive_cash.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);
        $receiveCash->delete();
        return redirect()->route('receive_cash.index');

    }
}