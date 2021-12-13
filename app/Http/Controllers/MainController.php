<?php

namespace App\Http\Controllers;


use App\Models\Edition;
use \App\Models\Category;
use \App\Models\Material;
use Illuminate\Http\Request;
use App\Models\CategoryMaterial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    //


    public function editions()
    {
        $editions = Edition::latest()->simplePaginate(3);
        return view('mkabview.editions', compact('editions'));
    }


    public function materials()
    {
        $categorys = Category::all();
        $materials = Material::where('published',1)->latest()->simplePaginate(30);


        return view('mkabview.materials', compact('categorys', 'materials'));
    }


    public function showCategory($id)
    {
        // $categorys = Category::all();
        $categorys = new Category();
        $categorys = $categorys->getCategorys();

        $category_ids= CategoryMaterial::where('category_id',$id)->pluck('material_id');
        $materials = Material::whereIn('id',$category_ids)->latest()->simplePaginate(30);

        return view('mkabview.materials', compact('categorys', 'materials', 'id'));

    }

    public function showMaterial($id)
    {
        $categorys = Category::all();
        $material = Material::find($id);

        $author = DB::table('teachers')->find($material['user_id']);



        return view('mkabview.material', compact('categorys','material', 'author'));

    }
}
