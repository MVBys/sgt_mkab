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
    @elseif(isset($material['title']))

        <section class="page-title">
            <div class="container">
                <div class="p-4 p-md-5 mb-4 text-white rounded ">

                    <h2 class="display-6 fst-italic text-center">{{ $material['title'] }}</h2>


                </div>
            </div>
        </section>

    @else
        <section class="page-title">
            <div class="container">
                <div class="p-4 p-md-5 mb-4 text-white rounded ">

                    <h2 class="display-6 fst-italic text-center">Учебно-методические материалы</h2>


                </div>
            </div>
        </section>
    @endif

@endsection

@section('sidebar')
    <!-- Side-bar right -->
    <div class="container ">
        <div class="row ">
            <div class="col-12 col-md-6">
                <h4>Категория</h4>

                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                    onchange="window.location.href = this.options[this.selectedIndex].value">
                    <option value="{{ route('home') }}">Все категории</option>
                    @foreach ($categorys as $category)
                        <option value="{{ route('showCategory', ['id' => $category['id']]) }}" @if (url()->current() == route('showCategory', ['id' => $category['id']]))
                            selected
                    @endif
                    >{{ $category['title'] }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-12 col-md-6">
                <h4>Тип материла</h4>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-3 col-lg-2 order-md-first">
        <h4 class="mb-3">Категории</h4>
        <div id="list-example nav-item" class="list-group">

            @foreach ($categorys as $category)
                <a class="nav-link list-group-item list-group-item-action "
                    href="{{route('showCategory', ['id'=>$category['id']]) }}">{{ $category['title'] }}</a>
            @endforeach

        </div>
    </div> --}}
@endsection


@section('content')

    <div class="col-md-12 col-lg-12 ">
        @empty($materials[0])
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Сообщение!</h4>
                <p> К сожалению в данной категории пока нет материалов.</p>
            </div>
        @endempty

        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($materials as $material)

                <div class="col">
                    <div class="card h-100">
                        <img src="{{ url('/') }}/public/images/{{ $material['image'] }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <a href="{{ route('showMaterial', ['id' => $material['id']]) }}"
                                class="link-info text-decoration-none">
                                <h5 class="card-title">{{ $material['title'] }}</h5>
                            </a>

                            <p class="card-text" style="text-align: justify">{{ $material['description'] }}</p>
                            <p class=""><b>Категории</b>:
                                @foreach ($material->categorys as $category)
                                    <span>{{ $category['title'] }}</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ substr($material['updated_at'], 0, 10) }}</small>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>

        <br>
        <div class="paginate flex">
            {{ $materials->links() }}
        </div>
        <br>
        <br>
    </div>


@endsection
