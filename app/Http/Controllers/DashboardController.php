<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use App\Models\Client;
use App\Models\ExpenseItems;
use App\Models\ReceiveCash;
use App\Models\Service;
use App\Models\ServiceProviders;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $users_count = User::count();
        $clients_count = Client::count();
        $service_providers_count = ServiceProviders::count();
        $services_count = Service::count();
        $receive_cash_count = ReceiveCash::count();
        $cash_out_count = CashOut::count();
        $expense_items_count = ExpenseItems::count();
        return view('backend.pages.dashboard.index',
    compact('users_count','clients_count','service_providers_count',
    'services_count','receive_cash_count','cash_out_count','expense_items_count'));
    }
}