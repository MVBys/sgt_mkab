@extends('mkablayout')

@section('title')Главная@endsection


@section('pagetopic')

    @if (!empty($id))
        <section class="page-title">
            <div class="container">
                <div class="p-4 p-md-5 mb-4 text-white rounded">

                    <h1 class="display-5 fst-italic text-center">{{ $categorys[$id - 1]['title'] }}</h1>


                </div>
            </div>
        </section>
    @else
        <section class="page-title">
            <div class="container">
                <div class="p-4 p-md-5 mb-4 text-white rounded ">

                    <h2 class="display-6 fst-italic text-center">{{ $material['title'] }}</h2>


                </div>
            </div>
        </section>
    @endif

@endsection

@section('sidebar')
    <!-- Side-bar right -->
    <div class="col-md-3 col-lg-3 order-md-first">
        <h4 class="mb-3">Категории</h4>
        <div id="list-example nav-item" class="list-group">

            @foreach ($categorys as $category)
                <a class="nav-link list-group-item list-group-item-action "
                    href="{{ route('showCategory', ['id' => $category['id']]) }}">{{ $category['title'] }}</a>
            @endforeach

        </div>
    </div>
@endsection


@section('content')

    <div class="col-md-9 col-lg-9 ">


        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">{{ $material['title'] }}</h4>

            {{ $material['description'] }}
            <hr>
            @if (!empty($author->surname))
                <p class="mb-0"> <b> Автор: </b> {{ $author->surname . ' ' . $author->name }} </p>
            @endif
            <p class="mb-0"> <b> Дата: </b> {{ substr($material['updated_at'], 0, 10) }} </p>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
        </svg>


        @if (!empty($material['presentation_link']))
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                    <use xlink:href="#info-fill" />
                </svg>
                <div>
                    <a href="{{ Storage::url($material['presentation_link']) }} ">Скачать презентацию </a>
                </div>
            </div>

            <h2 class="display-6  text-info text-center">Презентация</h2>
            <iframe src="https://docs.google.com/viewer?url={{ Storage::url($material['presentation_link']) }}&embedded=true"
            style="width: 100%; height: 500px;" frameborder="0">Ваш браузер не поддерживает фреймы</iframe>

        @endif

        {{-- <iframe id="iframepdf" style="width: 100%; height: 800px "
            src="{{ Storage::url($material['pdf_link']) }}"></iframe> --}}


        {{-- <object data="{{ Storage::url($material['pdf_link']) }}" type="application/pdf" width="800" height="1200"
            typemustmatch>
            <p>You don't have a PDF plugin, but you can <a href="{{ Storage::url($material['pdf_link']) }}">download the
                    PDF file.</a></p>
        </object> --}}

        <h2 class="display-6  text-info text-center">Текстовый документ</h2>
        <iframe src="https://docs.google.com/viewer?url={{ Storage::url($material['pdf_link']) }}&embedded=true"
            style="width: 100%; height: 800px;" frameborder="0">Ваш браузер не поддерживает фреймы</iframe>

        {{-- <h2 class="mb-3">{{$material['title']}}</h2>
        <p class="text-white-50">Описание</p>

        <div class="alert alert-secondary" role="alert">
            {{$material['description']}}
          </div>
        <p class="lead">
            {{$material['description']}}
        </p>
        <p>{{$material['pdf_link']}}</p> --}}



        <br>
        <br>
    </div>


@endsection
