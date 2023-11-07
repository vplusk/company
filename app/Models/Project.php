<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'company_id'
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
