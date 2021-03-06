@extends('mkablayout')

@section('title')Главная@endsection


@section('pagetopic')

    @if (!empty($id))
        <section class="page-title">
            <div class="container">
                <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">

                    <h1 class="display-5 fst-italic text-center">{{$categorys[$id-1]['title']}}</h1>


                </div>
            </div>
        </section>
    @else
       <section class="pagetitle">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">Методический кабинет</h1>
                    <p class="lead my-3">Школа Гумантираного Труда</p>

                </div>
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
                    href="{{route('showCategory', ['id'=>$category['id']]) }}">{{ $category['title'] }}</a>
            @endforeach

        </div>
    </div>
@endsection


@section('content')

    <div class="col-md-9 col-lg-9 ">
        <h4 class="mb-3">Список материалов</h4>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($materials as $material)


                <div class="col">
                    <div class="card h-100">
                        <img src="{{url('/')}}/public/images/{{ $material['image'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href= "{{route('showMaterial',['id'=>$material['id']])}}" class="link-info text-decoration-none">
                                <h5 class="card-title">{{ $material['title'] }}</h5>
                            </a>

                            <p class="card-text" style="text-align: justify">{{ $material['description'] }}</p>
                            <p class=""><b>Категории</b>:
                                @foreach ($material->categorys as $category)
                                    <span>{{$category['title']}}</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{substr($material['updated_at'],0,10)}}</small>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>

        <br>
        <div class="paginate flex">
            {{$materials->links()}}
        </div>
        <br>
        <br>
    </div>


@endsection
