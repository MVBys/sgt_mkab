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
        <h4 class="mb-3">Материалы учителя</h4>

        <div class="row row-cols-5 row-cols-md-3 g-4 ">
            <div class="col" style="width: 100%;">

                @if (isset($message))
                    @include('mkabview.teacheroom.message')
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($materials as $material)


                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ url('/') }}/public/images/{{ $material['image'] }}" class="card-img-top"  alt="...">
                                <div class="card-body">

                                        <h5 class="card-title">{{ $material['title'] }}</h5>


                                    <p class="card-text" style="text-align: justify">{{ $material['description'] }}</p>
                                    <p class=""><b>Категории</b>:
                                        @foreach ($material->categorys as $category)
                                            <span>{{ $category['title'] }}</span>
                                        @endforeach
                                    </p>


                                </div>

                                <a href="{{ route('pageupdate', ['id' => $material['id']]) }}"
                                    class="btn btn-primary m-1 ">Редактировать</a>
                                @if (!$material['published'])
                                    <a href="{{ route('publish', ['id' => $material['id']]) }}"
                                        class="btn btn-warning m-1">Опубликовать</a>
                                @else
                                    <a href="{{ route('unpublish', ['id' => $material['id']]) }}"
                                        class="btn btn-secondary m-1">Снять с публикации</a>

                                @endif
                                <a href="{{ route('delete', ['id' => $material['id']]) }}"
                                    class="btn btn-danger m-1 ">Удалить</a>

                                <div class="card-footer">
                                    <small class="text-muted">{{ $material['updated_at'] }}</small>
                                </div>



                            </div>
                        </div>

                    @endforeach


                </div>

            </div>
        </div>
    </div>
    </div>


@endsection
