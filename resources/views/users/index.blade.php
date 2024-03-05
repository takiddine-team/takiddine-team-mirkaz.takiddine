@extends('layouts.app')
@section('content')

<div class="container">

    <style>
        .history-table{ margin-top: 50px }
        table.table.table-bordered.history-table a i { color: black; } table.table.table-bordered.history-table a i:hover { color: #E63D64; }
        thead { background: #e8ebee; }tbody {background: white;}
        i.far.fa-trash-alt:hover {
    color: #E63D64 !important;
    cursor: pointer;
}
.add_user {
   padding: 10px;
}
.add_user:hover {
    background-color: #000000 !important;
    border: #000000 solid 1px;
    color:#e63d64 !important;
}
.add_user a:hover {
    color:#fec007 !important;
}
.add_user a {
    font-weight: 600;
}
a.btn.btn-primary.add_user {
    font-weight: 600;
}
@media (max-width: 600px) and (min-width: 0px) {
    .history-table {
        margin-top: 30px;
    }
    .add_user {
        margin-top: 20px;
    }
    .history-table tr th:nth-child(6), .history-table tr td:nth-child(3), .history-table tr th:nth-child(4), .history-table tr td:nth-child(4) {
        display: none;
    }
    table.table.table-bordered.history-table.animate__animated.animate__zoomIn { width: 100% !important; display: block !important; }
}


    </style>

    <section class="home">
        <div class="containe">
            <div class="col-md-12 text-center">
                <img class="eskelah-logo animate__animated animate__zoomIn" src="{{ asset('img/assets/logo.png') }}" alt="">
                <h3 class="page-title animate__animated animate__rubberBand"> اختصر الكثير من الوقت هنا </h3>
            </div>

            <a class="btn btn-primary add_user" style="text-decoration: none;color:black" href="{{ route('users.create') }}"><i class="fas fa-user-plus"></i>&nbsp; أضف مستخدم جديد</a>
            
            <div class="table-responsive">
                <table class="table table-bordered history-table animate__animated animate__zoomIn">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">مستخدم</th>
                        <th scope="col">البريد الإلكتروني</th>
                        {{-- <th scope="col">نوع الخدمة</th>
                        <th scope="col">اسم الخدمة</th> --}}
                        <th scope="col">تاريخ الإنشاء</th>
                        <th class="text-center" scope="col">تعديل</th>
                        <th class="text-center" scope="col">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                            <tr>
                                <th class="nexa-light" scope="row"> {{ $user->id }} </th>
                                <td class="nexa-light"> {{ $user->name }} </td>
                                <td class="nexa-light"> {{ $user->email }} </td>

                                <td class="nexa-light" > {{ $user->created_at }} </td>
                                <td class="text-center"> <a href="{{ route('users.edit',['id' => $user->id]) }}"> <i class="far fa-edit"></i> </a> </td>
                                {{-- <td class="text-center"> <a onclick="return confirm('هل أنت متأكد أنك تريد الحذف؟')" href="{{ route('users.delete',['id' => $user->id]) }}"> <i class="far fa-trash-alt"></i> </a> </td> --}}

                                <td class="text-center">
                                    <form id="delete-form" method="POST" action="{{ route('users.delete',['id' => $user->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group delete-confirm">
                                        <i class="far fa-trash-alt"></i>
                                        </div>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </section>


@endsection
