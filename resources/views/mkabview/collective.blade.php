@extends('mkablayout')

@section('title')Главная@endsection


@section('pagetopic')

    <section class="page-title">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded">

                <h1 class="display-5 fst-italic text-center">Коллектив</h1>


            </div>
        </div>
    </section>


@endsection

@section('sidebar')


@endsection


@section('content')

    <div class="container">

        <div class="row" style="text-align: center;">

            @foreach ($collective as $colleg)


            <div class="col-lg-4">
                <img src="{{Storage::url($colleg->teacher_photo)}}" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="photo of the author" style="margin: 10px 10px 10px 0; max-width:300px">
                <h2>{{$colleg->surname .' '.$colleg->name.' '.$colleg->patronymic}}</h2>

                <p>{{$colleg->qualification_category->category_title }} </p>
                {{-- <p><a class="btn btn-secondary" href="#">View details »</a></p> --}}


            </div>

            @endforeach





    </div>



        <div class="paginate flex">
            {{ $collective->links() }}
        </div>
    </div>

@endsection
