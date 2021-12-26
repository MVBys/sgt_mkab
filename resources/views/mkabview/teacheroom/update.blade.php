@extends('teacheroomlayout')


@section('title')Кабинет учителя@endsection

@section('pagetopic')
    <section class="page-title">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded ">

                <h1 class="display-5 fst-italic text-center">Кабинет учителя</h1>


            </div>
        </div>
    </section>

@endsection


@section('content')


    <div class="col-md-9 col-lg-9 ">
        <h4 class="mb-3">Редактировать материал</h4>

        <div class="row row-cols-5 row-cols-md-3 g-4 ">
            <div class="col" style="width: 100%;">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                @if (isset($message))
                    @include('mkabview.teacheroom.message')
                @endif


                <form action="{{ route('updatematerial') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$material[0]['id']}}" hidden>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                        <input type="text" name='title' class="form-control"  value = '{{$material[0]['title']}}'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                        <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="3">  {{$material[0]['description']}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Укажите категории</label>
                        <div class="flex">

                            @foreach ($categorys as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name='category[]' type="checkbox"
                                        id="Checkbox{{ $category['id'] }}" value="{{ $category['id'] }}"

                                    @foreach ($categorys_material as $cat_mat)
                                        @if ($category['id'] == $cat_mat['category_id'])
                                            checked
                                        @endif
                                    @endforeach
                                    >
                                    <label class="form-check-label"
                                        for="Checkbox{{ $category['id'] }}">{{ $category['title'] }}</label>
                                </div>

                            @endforeach

                        </div>
                    </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" >Заменить PDF файл</label>
                            <input type="file" name='pdf_link' class="form-control" id="inputGroupFile01" >
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label" >Заменить файл презентации</label>
                            <input type="file" name='presentation_link' class="form-control" id="inputGroupFile01">
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" name='published' value="1" type="checkbox" id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Материал опубликован</label>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Редактировать</button>

                </form>



            </div>
        </div>
    </div>
    </div>


@endsection
