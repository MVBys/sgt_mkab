<?php

namespace App\Http\Controllers;


use App\Models\Edition;
use App\Models\Teacher;
use \App\Models\Category;
use \App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Material_type;
use App\Models\CategoryMaterial;
use Illuminate\Support\Facades\DB;
use App\Models\Qualification_category;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    //


    public function editions()
    {
        $editions = Edition::latest()->simplePaginate(3);
        return view('mkabview.editions', compact('editions'));
    }


    public function showEdition($id)
    {
        $edition =  Edition::find($id);
        return view('mkabview.edition', compact('edition'));
    }

    public function collective()
    {

        $collective =Teacher::latest()->simplePaginate(3);

        return view('mkabview.collective', compact('collective'));

    }



    public function materials()
    {
        $categorys = Category::all();
        $materials = Material::where('published',1)->latest()->simplePaginate(30);
        $material_types = Material_type::all();

        return view('mkabview.materials', compact('categorys', 'materials','material_types'));
    }


    public function showCategory($id)
    {
        // $categorys = Category::all();
        $categorys = new Category();
        $categorys = $categorys->getCategorys();

        $material_types = Material_type::all();
        $category_ids= CategoryMaterial::where('category_id',$id)->pluck('material_id');
        $materials = Material::whereIn('id',$category_ids)->latest()->simplePaginate(30);

        return view('mkabview.materials', compact('categorys', 'materials', 'id','material_types'));

    }


    public function showMateryalType($id)
    {
        $categorys = new Category();
        $categorys = $categorys->getCategorys();

        $material_types = Material_type::all();
        $category_ids= CategoryMaterial::where('category_id',$id)->pluck('material_id');
        $materials = Material::where('material_type_id',$id)->latest()->simplePaginate(30);

        return view('mkabview.materials', compact('categorys', 'materials', 'id','material_types'));

    }

    public function showMaterial($id)
    {
        $categorys = Category::all();
        $material = Material::find($id);

        $author = DB::table('teachers')->find($material['user_id']);



        return view('mkabview.material', compact('categorys','material', 'author'));

    }
}
