<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashOut extends Model 
{
    use HasFactory , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['receipt_number','expense','recipient','date','service_id','service_provider_id','client_id','user_id'];


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