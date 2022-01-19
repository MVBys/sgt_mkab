@extends('adminpanel.adminpanellayout')



@section('content')

    <div class="col-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="h3 mb-0 page-title">Пользователи</h2>
            </div>
            <div class="col-auto">

                <a href="{{route('create_user')}}"  type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Создать
                    пользователя</a>
            </div>
        </div>
        <!-- table -->
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>created_at</th>
                            <th>email verified at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td>
                                    <div class="avatar avatar-sm">

                                        <p class="mb-0 text-muted">{{$user->id}}</p>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 text-muted"><strong>{{$user->name}}</strong></p>

                                </td>
                                <td>
                                    <p class="mb-0 text-muted">{{$user->email}}</p>

                                </td>
                                <td class="text-muted">{{$user->created_at}}</td>

                                <td class="text-muted">{{$user->email_verified_at}}</td>

                                <td class=""><button class="btn btn-sm dropdown-toggle more-horizontal"
                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('edit_user', $user->id)}}">Редактировать</a>
                                        <a class="dropdown-item" href="{{route('destroy_user', $user->id)}}">Удалить</a>
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

            {{ $users->links() }}
        </nav>
    </div>

@endsection
