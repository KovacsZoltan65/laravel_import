<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontUser extends Model
{
    use HasFactory;
    
    protected $table = 'frontuser';
    
    protected $fillable = [
        'org_id','name','website','country',
        'description','founded','industry','employee'
    ];
}
