<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Qualification_category extends Model
{
    use HasFactory;
    protected $table = 'qualification_category';


    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'id', 'qualification_category_id');
    }

}
