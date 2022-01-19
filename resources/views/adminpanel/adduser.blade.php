@extends('adminpanel.adminpanellayout')



@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Добавление пользователя</strong>

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
            <form action="{{ route('storeuser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Имя</label>
                    <div class="col-sm-9">
                        <div class="form-group mb-3">
                            <input type="text" id="example-helping" class="form-control" placeholder="" name="name">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <div class="form-group mb-3">
                            <input type="email" id="example-helping" class="form-control" placeholder="" name="email">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Пароль</label>
                    <div class="col-sm-9">
                        <div class="form-group mb-3">
                            <input type="password" id="example-helping" class="form-control" placeholder="" name="password">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Подтвердите пароль</label>
                    <div class="col-sm-9">
                        <div class="form-group mb-3">
                            <input type="password" id="example-helping" class="form-control" placeholder="" name="confirm_password">
                        </div>
                    </div>
                </div>
                

                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>

@endsection
