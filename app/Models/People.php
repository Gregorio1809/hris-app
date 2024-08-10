<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;

class People extends Model
{
    use HasFactory;

    protected $fillable = ['employee_number', 'employee_name', 'legal_address', 'domicile_address', 'organization_id'];

    public function organization(){
        return $this->belongsTo(Organization::class);
    }
}
