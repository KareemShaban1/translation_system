<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class CashOut extends Model 
{
    use HasFactory , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'receipt_number','expense_type_id','paid_amount','date','description',
        // 'service_id',
        'service_provider_id','client_id','user_id'];

        protected static function booted()
    {

        // while creating order make order number take next available number
        // static::creating(function (CashOut $cashOut) {
        //     //20230001 - 20230002

        //     $deleted_cashOut = CashOut::where('receipt_number',ReceiveCash::getNextOrderNumber())
        //     ->where('deleted_at','<>',null)->first();
            
            
        //     if(!$deleted_cashOut){
        //         $cashOut->receipt_number = CashOut::getNextOrderNumber() + 1;
        //     }else {
                
        //         $deleted_cashOut->receipt_number = CashOut::getNextOrderNumber();

        //     }
            
        //     $cashOut->user_id = Auth::user()->id;
        // });
        static::creating(function (CashOut $cashOut) {
            // Check for the next available receipt_number
            $nextReceiptNumber = ReceiveCash::getNextOrderNumber();
        
            // Find a CashOut with the given receipt_number (deleted or not)
            $deletedCashOut = CashOut::where('receipt_number', $nextReceiptNumber)
            ->where('deleted_at','<>',null)->first();
        
            // If an existing CashOut is found (deleted or not), increment the receipt_number
            if ($deletedCashOut) {
                $cashOut->receipt_number = $nextReceiptNumber + 1;
            } else {
                $cashOut->receipt_number = $nextReceiptNumber;
            }
        
            // Set other properties
            $cashOut->user_id = Auth::user()->id;
        });
    }


    public static function getNextOrderNumber()
    {
        // SELECT MAX(number) FROM orders
        $year = Carbon::now()->year;
        $receipt_number = CashOut::whereYear('created_at', $year)->max('receipt_number');

        // if there is number in this year add 1 to this number
        if ($receipt_number) {
            return $receipt_number + 1;
        }
        // if not return 0001
        return $year . '0001';
    }



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function service_provider(){
        return $this->belongsTo(ServiceProviders::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function expense_type(){
        return $this->belongsTo(ExpenseType::class);
    }
    
    
}