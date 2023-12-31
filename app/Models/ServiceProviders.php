<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProviders extends Model
{
    use HasFactory ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','address','phone_number','another_phone_number','email','expense_type_id'];


    public function expense_type(){
        return $this->belongsTo(ExpenseType::class);
    }

}