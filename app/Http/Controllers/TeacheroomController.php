<?php

namespace App\Http\Controllers;

use App\Models\Category;
use \App\Models\Material;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\CategoryMaterial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TeacherdataRequest;
use App\Http\Requests\CreatematerialRequest;
use App\Http\Requests\UpdatematerialRequest;
use App\Models\Material_type;

class TeacheroomController extends Controller
{
    //

    public function index()
    {
        $categorys = Category::get();
        $material_types = Material_type::get();
        return view('mkabview.teacheroom.index', compact('categorys', 'material_types'));
    }

    public function teacherdata()
    {
        $qualification_categorys = DB::table('qualification_category')->get();
        $teaching_titles = DB::table('teaching_title')->get();
        $teacher_datas = DB::table('teachers')->where('user_id', Auth::id())->get();

        if(!isset($teacher_datas[0])){
            $teacher_data = (object) array(
                'id'=>'',
                'user_id'=>'',
                'name'=>'',
                'surname'=>'',
                'patronymic'=>'',
                'experience'=>'',
                'qualification_category_id'=>'',
                'teaching_title_id'=>'',
                'teacher_photo'=>'',
                'portfolio_presentation'=>'',
            );
        } else{
            $teacher_data = (object) array(
                'id'=>$teacher_datas[0]->id,
                'user_id'=>$teacher_datas[0]->user_id,
                'name'=>$teacher_datas[0]->name,
                'surname'=>$teacher_datas[0]->surname,
                'patronymic'=>$teacher_datas[0]->patronymic,
                'experience'=>$teacher_datas[0]->experience,
                'qualification_category_id'=>$teacher_datas[0]->qualification_category_id,
                'teaching_title_id'=>$teacher_datas[0]->teaching_title_id,
                'teacher_photo'=>$teacher_datas[0]->teacher_photo,
                'portfolio_presentation'=>$teacher_datas[0]->portfolio_presentation,
            );
        }
        return view('mkabview.teacheroom.teacherdata', compact('qualification_categorys', 'teaching_titles','teacher_data'));
    }

    public function saveteacherdata(TeacherdataRequest $request)
    {
        $data =  $request->validated();
        $data['name'] = ucfirst($data['name']);
        $data['surname'] = ucfirst($data['surname']);
        $data['patronymic'] = ucfirst($data['patronymic']);

        if (isset($data['teacher_photo'])) {

            $data['teacher_photo'] = Storage::put('/public/theacherdata/'. Auth::id(), $data['teacher_photo'] );
            $data['teacher_photo'] = Str::replace('public/', '', $data['teacher_photo']);
            $foto_name = DB::table('teachers')->where('user_id', Auth::id())->value('teacher_photo');
            if ($foto_name != '') Storage::delete('public/'. $foto_name);

        }
        if (isset($data['portfolio_presentation'])) {
            $data['portfolio_presentation'] = Storage::put('/public/theacherdata/'. Auth::id(), $data['portfolio_presentation'] );
            $data['portfolio_presentation'] = Str::replace('public/', '', $data['portfolio_presentation']);
        }else{
            $data['portfolio_presentation']='';
        }

        DB::table('teachers')->updateOrInsert(['user_id' => Auth::id()], $data);

        return redirect()->route('teacherdata');

    }



    public function materials()
    {
        $materials = Material::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('mkabview.teacheroom.teachermaterials', compact('materials'));
    }

    public function creatematerial(CreatematerialRequest $request)
    {

        $material_data = $request->validated();


        if (isset($material_data['pdf_link'])) {
            $material_data['pdf_link'] = Str::replace('public/', '', Storage::put('/public/materials/'. Auth::id(), $material_data['pdf_link'] ));
        }else{
            $material_data['pdf_link'] = '';
        }

        if (isset($material_data['presentation_link'])) {
            $material_data['presentation_link'] = Str::replace('public/', '',Storage::put('/public/materials/'. Auth::id(), $material_data['presentation_link'] ));
        }else{
            $material_data['presentation_link'] = '';
        }

        $category_ids = Arr::pull($material_data, 'category');



        $missing_data = [
            'user_id' => Auth::id(),
            'image' => $category_ids[0].'.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $material_data = array_merge($material_data, $missing_data);

        $material_id = DB::table('materials')->insertGetId($material_data);

        $category_material    = [];
        foreach ($category_ids as  $category_id ) {
            array_push($category_material, [
                'category_id'=>$category_id,
                'material_id'=>$material_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
        DB::table('category_material')->insert($category_material);

        return redirect()->route('teachermaterials');
    }




    public function publish($id)
    {
        DB::table('materials')->where('id', $id)->update(['published' => 1]);
        $materials = Material::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('mkabview.teacheroom.teachermaterials', compact('materials'));
    }

    public function unpublish($id)
    {
        DB::table('materials')->where('id', $id)->update(['published' => 0]);
        $materials = Material::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('mkabview.teacheroom.teachermaterials', compact('materials'));
    }

    public function delete($id)
    {
        $material = Material::where('id', $id)->get();

        if (empty($material[0])) {
            $message = 'Произошла ошибка попробуйте еще раз.';
            $materials = Material::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            return view('mkabview.teacheroom.teachermaterials', compact('materials', 'message'));
        }

        $exists_pdf = Storage::disk('public')->exists($material[0]['pdf_link']);
        $exists_ppt = Storage::disk('public')->exists($material[0]['presentation_link']);

        if ($material[0]['pdf_link'] != '' && $exists_pdf) {
            Storage::disk('public')->delete($material[0]['pdf_link']);
        }

        if ($material[0]['presentation_link'] != '' && $exists_ppt) {
            Storage::disk('public')->delete($material[0]['presentation_link']);
        }

        DB::table('category_material')->where('material_id', $id)->delete();
        DB::table('materials')->where('id', $id)->delete();


        return redirect()->route('teachermaterials');
    }

    public function showpageupdate($id)
    {
        $material = Material::where('id', $id)->get();
        if (empty($material[0])) {
            $message = 'Произошла ошибка попробуйте еще раз.';
            $materials = Material::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            return view('mkabview.teacheroom.teachermaterials', compact('materials', 'message'));
        }
        $categorys_material = CategoryMaterial::where('material_id', $id)->get();
        $categorys = Category::get();
        return view('mkabview.teacheroom.update', compact('material', 'categorys', 'categorys_material'));
    }

    public function updatematerial(UpdatematerialRequest $request)
    {

        $request_data = $request->validated();

        $old_material= Material::find($request_data['id']);
        if ( is_null($old_material) ) return redirect()->route('teachermaterials');

        if ( isset($request_data['pdf_link']) ) {
            if (Storage::disk('public')->exists($old_material['pdf_link'])) {
                Storage::disk('public')->delete($old_material['pdf_link']);
            }
            $request_data['pdf_link'] = Str::replace('public/', '', Storage::put('/public/materials/'. Auth::id(), $request_data['pdf_link'] ));
        }

        if ( isset($request_data['presentation_link']) ) {
            if (Storage::disk('public')->exists($old_material['presentation_link'])) {
                Storage::disk('public')->delete($old_material['presentation_link']);
            }
            $request_data['presentation_link'] = Str::replace('public/', '', Storage::put('/public/materials/'. Auth::id(), $request_data['presentation_link'] ));
        }

        $category_ids = Arr::pull($request_data, 'category');
        $material_id = Arr::pull($request_data, 'id');
        $request_data = Arr::add($request_data, 'updated_at', date("Y-m-d H:i:s"));

        $category_material = [];
        foreach ($category_ids as  $category_id ) {
            array_push($category_material, [
                'category_id'=>$category_id,
                'material_id'=>$material_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
        DB::table('category_material')->where('material_id', $material_id)->delete();
        DB::table('category_material')->insert($category_material);

        Material::where('id', $material_id)->update($request_data);

        return redirect()->route('teachermaterials');
    }
}
