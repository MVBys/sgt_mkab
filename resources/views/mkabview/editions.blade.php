@extends('mkablayout')

@section('title')Главная@endsection


@section('pagetopic')
    <section class="pagetitle">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded ">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">Методический кабинет</h1>
                    <p class="lead my-3">Школа Гумантираного Труда</p>

                </div>
            </div>
        </div>
    </section>


@endsection

@section('sidebar')


@endsection


@section('content')

    <div class="container">

        <div class="row mb-2">

            @foreach ($editions as $edition)


            <div class=" col-lg-6">
                <div class="edition row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col edition__text p-4 d-flex flex-column position-static">

                        <h3 class="mb-0 edition__title">{{$edition->title}}</h3>

                        <p class="card-text mb-auto edition__description"> {{Str::limit($edition->description, 200)}}</p>
                        <a href="{{route('show_edition', $edition->id )}}" class="btn btn-outline-info edition__button">Читать далее ...</a>
                    </div>
                    <div class="col-auto  d-lg-block edition__img">
                        <img src="{{Storage::disk('public')->url($edition->img_file) }}" class="bd-placeholder-img">

                    </div>
                </div>
            </div>




            @endforeach


        </div>
        <div class="paginate flex">
            {{ $editions->links() }}
        </div>
    </div>

@endsection
