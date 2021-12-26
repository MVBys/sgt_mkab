@extends('mkablayout')

@section('title')Главная@endsection


@section('pagetopic')

    <section class="page-title">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded ">

                <h2 class="display-6 fst-italic text-center">{{ $edition->title }}</h2>


            </div>
        </div>
    </section>


@endsection

@section('sidebar')


@endsection


@section('content')


    <div class="container">


        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">{{ $edition->title }}</h4>
            <p>{{ $edition->description }}</p>
            <hr>
            <p class="mb-0">{{ substr($edition->updated_at, 0, 10) }}</p>
        </div>


        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <img src="{{ Storage::url('editions/' . $edition->img_file) }}" alt="" width="100%">
            </div>
            <div class="col-md-7 col-lg-8">

              <iframe src="https://docs.google.com/viewer?url={{ Storage::url('editions/' . $edition->pdf_file) }}&embedded=true"
                    style="width: 100%; height: 800px;" frameborder="0">Ваш браузер не поддерживает фреймы</iframe>


            </div>
        </div>



    </div>




@endsection
