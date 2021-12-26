<?php

namespace App\Models;

use App\Models\Qualification_category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
    ];

    public function qualification_category()
    {
        return $this->belongsTo(Qualification_category::class, 'qualification_category_id', 'id');
    }




}
