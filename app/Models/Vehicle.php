<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';

    protected $fillable = [
        'company_id', 'license_plate', 'vehicle_id', 'pool_name', 'pool_location'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function vehicle(){
        return $this->belongsTo(VehicleType::class);
    }

    public function detail(){
        
        return $this->hasMany(DetailCustomer::class);
    }





}