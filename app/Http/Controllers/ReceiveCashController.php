<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Languages;
use App\Models\ReceiveCash;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class ReceiveCashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $receiveCash = ReceiveCash::whereDate('receive_date', Carbon::today())->with('user','client','service_provider','service')->get();
        return view('backend.pages.receive_cash.index',compact('receiveCash'));
    }


    public function reports()
    {
        //
        $receiveCash = ReceiveCash::with('user','client','service_provider','service')->get();
        return view('backend.pages.receive_cash.reports',compact('receiveCash'));
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
        $languages = Languages::all();
        return view('backend.pages.receive_cash.create',
        compact('services','service_providers','users','clients','languages'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'receive_date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'required|exists:clients,id',
            'finish_date' => 'required|date',
            'from_lang_id' => 'nullable|exists:languages,id',
            'to_lang_id' => 'nullable|exists:languages,id',
            'service_price' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
            'description'=>'nullable'
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
        $languages = Languages::all();

        return view('backend.pages.receive_cash.edit',
        compact('receiveCash','services','service_providers','users','clients','languages'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);
        
        $validatedData = $request->validate([
            'receive_date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'required|exists:clients,id',
            'finish_date' => 'required|date',
            'from_lang_id' => 'nullable|exists:languages,id',
            'to_lang_id' => 'nullable|exists:languages,id',
            'service_price' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'required|numeric',
            'description'=>'nullable'

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

    public function pdfReport($id){
        
        $receiveCash = ReceiveCash::findOrFail($id);
        $data = [
            'receiveCash'=>$receiveCash
        ];
        
        $pdf =  PDF::loadView('backend.pages.receive_cash.pdf_report',$data);
        return $pdf->stream('Report.pdf');
    }

    // public function pdfReport($id){
    //     $receiveCash = ReceiveCash::findOrFail($id);

    //     return view('backend.pages.receive_cash.pdf_report',compact('receiveCash'));

        
    // }

    public function test($id){
        
        $receiveCash = ReceiveCash::findOrFail($id);
        // $data = [
        //     'receiveCash'=>$receiveCash
        // ];
        return view('backend.pages.receive_cash.test',compact('receiveCash'));
        
        // $pdf =  PDF::loadView('backend.pages.receive_cash.pdf_report',$data);
        // return $pdf->stream('Report.pdf');
    }


}