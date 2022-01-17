@extends('adminpanel.adminpanellayout')



@section('content')

    <div class="col-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="h3 mb-0 page-title">Публикации ШГТ</h2>
            </div>
            <div class="col-auto">

                <a href="{{route('create_edition')}}"  type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Создать
                    публикацию</a>
            </div>
        </div>
        <!-- table -->
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>title</th>
                            <th>description</th>
                            <th>pdf_file</th>
                            <th>img_file</th>
                            <th>created_at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($editions as $edition)
                            <tr>

                                <td>
                                    <div class="avatar avatar-sm">

                                        <p class="mb-0 text-muted">{{$edition->id}}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><strong>{{$edition->title}}</strong></p>

                                </td>
                                <td>
                                    <p class="mb-0 text-muted">{{$edition->description}}</p>

                                </td>
                                <td>

                                    <a href="{{Storage::url($edition->pdf_file)}}" target="blank">
                                    <img src="{{asset('public/images/pdf-icon.png')}}" style="width: 40px;" alt="">
                                    </a>
                                </td>
                                <td class="text-muted">
                                    <img src="{{Storage::url($edition->img_file)}}" style="width: 80px">
                                </td>
                                <td class="text-muted">{{$edition->created_at}}</td>

                                <td class=""><button class="btn btn-sm dropdown-toggle more-horizontal"
                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="#">Редактировать</a>
                                        <a class="dropdown-item" href="{{route('destroy_edition', $edition->id)}}">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Table Paging" class="my-3">
            {{-- <ul class="pagination justify-content-end mb-0">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> --}}

            {{ $editions->links() }}
        </nav>
    </div>

@endsection
