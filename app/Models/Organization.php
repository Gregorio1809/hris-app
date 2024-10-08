<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['organization_name', 'organization_code'];

    public function author(){
        return $this->belongsTo(Author::class);
    }
}
