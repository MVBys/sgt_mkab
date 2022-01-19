@extends('adminpanel.adminpanellayout')



@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Редактирование публикации</strong>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('updateedition', $edition->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Заголовок</label>
                    <div class="col-sm-9">
                        <div class="form-group mb-3">
                            <input type="text" id="example-helping" class="form-control" placeholder="" name="title" value="{{$edition->title}}">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3" for="exampleFormControlTextarea1">Описание</label>
                    <div class="col-sm-9">
                        <textarea style="height: 200px" class="form-control" id="exampleFormControlTextarea1" rows="2"
                            name="description">{{$edition->description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3" for="exampleFormControlTextarea1">Обложка</label>
                    <div class="col-sm-9">
                        <div class="custom-file">

                            <input type="file" id="example-fileinput" class="form-control-file" name="img_file" >
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3" for="exampleFormControlTextarea1">Текст в формате PDF</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" id="example-fileinput" class="form-control-file" name="pdf_file" >


                        </div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection
