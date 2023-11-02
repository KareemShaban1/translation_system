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
use Illuminate\Support\Facades\DB;

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
        $receive_cash_monthly = ReceiveCash::select(DB::raw('MONTH(receive_date) as month'), DB::raw('SUM(paid_amount) as total_paid_amount'))
        ->groupBy(DB::raw('MONTH(receive_date)'))
        ->get();
        $cash_out_monthly = CashOut::select(DB::raw('MONTH(date) as month'), DB::raw('SUM(paid_amount) as total_paid_amount'))
        ->groupBy(DB::raw('MONTH(date)'))
        ->get();
        // dd( $receive_cash_monthly);
    return view('backend.pages.dashboard.index',
    compact('users_count','clients_count','service_providers_count', 'receive_cash_monthly',
    'cash_out_monthly',
    'services_count','receive_cash_count','cash_out_count','expense_items_count'));
    }
}