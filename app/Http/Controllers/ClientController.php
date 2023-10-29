<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ReceiveCash;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('backend.pages.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.clients.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'another_phone_number' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
        ]);
    
        // dd($validatedData);
        // Store the client
        Client::create($validatedData);
        
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $client = Client::findOrFail($id);
        return view('backend.pages.clients.edit',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'another_phone_number' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Update the client
        $client->update($validatedData);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index');

    }

    public function clientReceiveCash($id){
        $receiveCash= ReceiveCash::where('client_id',$id)->get();
        $data = [
            'receiveCash'=>$receiveCash
        ];

        $pdf =  PDF::loadView('backend.pages.clients.client_report',$data);
        return $pdf->stream('Report.pdf');
        
    }
}