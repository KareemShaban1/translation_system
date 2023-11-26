<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class ReceiveCash extends Model
{
    use HasFactory , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['receipt_number',
    'receive_date','description','service_id',
    'service_provider_id','client_id','user_id',
    'finish_date','from_lang_id','to_lang_id',
    'service_price','paid_amount','remaining_amount'];

    // protected static function booted()
    // {

    //     // while creating order make order number take next available number
    //     static::creating(function (ReceiveCash $receiveCash) {
    //         //20230001 - 20230002
            
    //         $deleted_receipt_number = ReceiveCash::where('receipt_number',ReceiveCash::getNextOrderNumber())
    //         ->where('deleted_at','<>',null)->first();
    //         // dd(ReceiveCash::getNextOrderNumber(),$deleted_receipt_number);
    //         if ($deleted_receipt_number != null){
    //             // if there is deleted receive number
    //             dd('deleted');
    //             $receiveCash->receipt_number = ReceiveCash::getNextOrderNumber() ;
    //         }else {
    //             dd('not_deleted');
    //             $receiveCash->receipt_number = ReceiveCash::getNextOrderNumber() + 1;
    //         }
    //         $receiveCash->user_id = Auth::user()->id;

    //     });
    // }


    // public static function getNextOrderNumber()
    // {
    //     // SELECT MAX(number) FROM orders
    //     $year = Carbon::now()->year;
    //     $receipt_number = ReceiveCash::whereYear('created_at', $year)->max('receipt_number');

    //     // if there is number in this year add 1 to this number
    //     if ($receipt_number) {
    //         return $receipt_number + 1;
    //     }
    //     // if not return 0001
    //     return $year . '0001';
    // }

    protected static function booted()
    {
        // while creating order make order number take the next available number
        static::creating(function (ReceiveCash $receiveCash) {
            $deleted_receipt_number = ReceiveCash::where('receipt_number', ReceiveCash::getNextOrderNumber())
                ->where('deleted_at', '<>', null)
                ->first(); // Use 'first()' to get a single result
                dd($receiveCash , ReceiveCash::getNextOrderNumber());

            if ($deleted_receipt_number !== null) {
                // If there is a deleted receipt number, use it
                $receiveCash->receipt_number = $deleted_receipt_number->receipt_number;
            } else {
                // If not, use the next available order number
                $receiveCash->receipt_number = ReceiveCash::getNextOrderNumber();
            }

            $receiveCash->user_id = Auth::user()->id;
        });
    }

    public static function getNextOrderNumber()
    {
      
          $year = Carbon::now()->year;
        $receipt_number = ReceiveCash::whereYear('created_at', $year)->max('receipt_number');

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
    
}