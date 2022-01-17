<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Material_type extends Model
{
    use HasFactory;

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

}
