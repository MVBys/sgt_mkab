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
        <h4 class="mb-3">Личные данные</h4>

        <div class="row row-cols-5 row-cols-md-3 g-4 ">
            <div class="col" style="width: 100%;">

                <form action="{{route('saveteacherdata')}}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="col-md-4">

                        @if (empty($teacher_data->teacher_photo))
                            <img src="{{url('/').'/public/images/avatar.jpg'}}" class="img-thumbnail float-start" alt="photo of the author" style="margin: 10px 10px 10px 0; max-width:300px">
                        @else
                            <img src="{{url('/').'/public/storage/'.$teacher_data->teacher_photo}}" class="img-thumbnail float-start" alt="photo of the author" style="margin: 10px 10px 10px 0; max-width:300px">
                        @endif

                    </div>



                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Фамилия</label>
                            <input type="text" class="form-control" id="firstName" name="surname" value="{{$teacher_data->surname}}">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="lastName" name="name" value="{{$teacher_data->name}}">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Отчество</label>
                            <input type="text" class="form-control" id="patronymic"  name="patronymic" value="{{$teacher_data->patronymic}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Педагогический стаж</label>
                            <input type="number" class="form-control" name="experience" min="1" max="40" value="{{$teacher_data->experience}}">

                        </div>
                        <div class="col-12">

                            <label for="email" class="form-label">Ваша кваліфікаційна категорія</span></label>
                            <select class="form-select" aria-label="Default select example" name="qualification_category_id">


                                @foreach ($qualification_categorys as $categorys)
                                    <option value="{{$categorys->id}}"
                                        @if ($categorys->id == $teacher_data->qualification_category_id)
                                            selected
                                        @endif

                                    >{{ $categorys->category_title }}</option>
                                @endforeach

                              </select>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Ваше педагогічне звання</span></label>
                            <select class="form-select" aria-label="Default select example" name="teaching_title_id">

                                @foreach ($teaching_titles as $titles)
                                    <option value="{{$titles->id}}"
                                        @if ($titles->id == $teacher_data->teaching_title_id)
                                            selected
                                        @endif
                                    >{{ $titles->rank }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Загрузить ваше фото</label>
                            <input type="file" class="form-control"  name="teacher_photo">
                          </div>

                          <div class="mb-3" style="hidden=true">
                            <label hidden="true" for="exampleFormControlTextarea1" class="form-label">Загрузить ваше порфолио (презентация)</label>
                            <input hidden="true" type="file" class="form-control"  name="portfolio_presentation">
                          </div>


                        <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>



            </div>
        </div>
    </div>
    </div>


@endsection
