<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizzamenu extends Model
{   
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'pizzamenu';
    protected $fillable = [
        
        'PizzaName',
        'Description', 
        'R',
        'L',   
        'XL',
        'Img',
        'isAvailable',
        'create_at',
        'updated_at'
    ];

}
