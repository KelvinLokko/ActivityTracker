<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    // Define the attributes that are mass assignable
    protected $fillable = [
        'description',  // Add the 'description' field to the fillable array
        'status',
        'remarks',
        'updated_by',
        'created_at'
    ];
    
}
