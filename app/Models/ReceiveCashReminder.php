<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReceiveCashReminder extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'receive_cash_reminder';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['receive_cash_id','receive_cash_reminder_date','paid_amount','remaining_amount',
    'description'
];

    public function receiveCash(){
        return $this->belongsTo(ReceiveCash::class);
    }
}