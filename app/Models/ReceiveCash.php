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
    protected $fillable = ['receipt_number','date','description','service_id','service_provider_id','client_id','user_id','paid_amount'];

    protected static function booted()
    {

        // while creating order make order number take next available number
        static::creating(function (ReceiveCash $receiveCash) {
            //20230001 - 20230002
            $receiveCash->receipt_number = ReceiveCash::getNextOrderNumber();
            $receiveCash->user_id = Auth::user()->id;
        });
    }


    public static function getNextOrderNumber()
    {
        // SELECT MAX(number) FROM orders
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