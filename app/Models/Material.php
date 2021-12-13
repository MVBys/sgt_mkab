<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Material_type;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'pdf_link', 'presentation_link', 'other_link', 'published','image','created_at','updated_at','material_type_id','material_type_id'];

    public function categorys()
    {
        return $this->belongsToMany(Category::class);
    }

    public function materials_types()
    {
        return $this->belongsTo(Material_type::class);
    }

    public function getmaterialuser($user_id)
    {
        $materials = DB::table('materials')->where('user_id', $user_id)->get();
        return $materials;
    }
}
