@extends('layouts.app')
@section('content')

<div class="container">

    <style>
        .history-table{ margin-top: 50px } table.table.table-bordered.history-table a i { color: black; } table.table.table-bordered.history-table a i:hover { color: #E63D64; } thead { background: #e8ebee; }tbody {background: white;} form{ background-color: #ffffff; padding: 20px; } .form-group{margin-top: 10px;} label{ margin-bottom: 10px; } .sub_title{ font-weight: 700; } .production{ } form{ background: #f9f9f9; margin-top: 50px !important; padding: 50px; border-radius: 20px; box-shadow: 0 3px 25px 0 rgb(30 34 40 / 20%); } .nexa-bold{ font-family: 'Nexa'; } .form-check-input:checked{ background-color: #e63d64; border-color: #e63d64; } #permissions{ margin-top: 10px; font-size: 20px; } #vp_check_all, #dm_check_all,#qubbah_check_all,#kit_check_all{ margin-right: 20px; } .production{ margin-top: 50px !important; } .checkbox-section{ margin-top: 100px !important; } .all { display: flex; flex-direction: row-reverse; } h3.title { margin-right: 15px !important; width: 95%; } .chall { margin-top: -28px; } .service{ margin-left:34px !important; } button.btn.btn-primary { padding: 10px !important; } button.btn.btn-primary:hover{ border:1px solid #fec007; } .service { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 5px 30px 0 rgb(30 34 40 / 20%); margin: 0 auto !important; } .sub_title { font-weight: 600; position: relative; padding-bottom: 1px; } .chall label.form-check-label { font-weight: 600; padding-right: 5px; } .sub_title:before { content: ''; position: absolute; bottom: 5px; width: 100%; height: 1px; background: #0000002e; } .checkbox-section.kit .service:nth-child(1) { margin-right: 20px !important; margin-left: 20px !important; } .checkbox-section.kit .service:nth-child(2) { margin-right: 20px !important; }h3.title .all { flex-direction: row; }
        .col-3.service { margin: 10px; width: calc( 25% - 20px ); }
    </style>

    <section class="home">
        <div class="containe">
            <div class="col-md-12 text-center">
                <img class="eskelah-logo animate__animated animate__zoomIn" src="{{ asset('img/assets/logo.png') }}" alt="">
                <h3 class="page-title animate__animated animate__rubberBand"> اختصر الكثير من الوقت هنا </h3>
            </div>

            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">المستخدم:</label>
                            <input type="text" class="form-control nexa-light" id="name" placeholder="أدخل إسم المستخدم" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني:</label>
                            <input type="email" class="form-control nexa-light" id="email" placeholder="أدخل البريد الإلكتروني" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">كلمة المرور:</label>
                            <input type="password" class="form-control" id="password" placeholder="أدخل  كلمة المرور" name="password" required>

                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="title">
                        <p id="permissions">الصلاحيات:</p>
                    </div>
                    <div class="col-md-12  done_service">

                        <h3 class="title"> 
                            <div class="all">
                                <div class="chall">
                                    <input type="checkbox" class="form-check-input vp_check_all"  value="" name="">
                                    <label class="form-check-label" style="font-size: 16px;" for="">إختيار الكل</label>
                                </div>
                            </div>
                        </h3>

                        <div class="all_inpu collapse show">
                            <div class="row">
                                @foreach ($done as $done_service)
                                    <div class="col-3 service">
                                        <div class="sub_title">
                                            <p> {{$done_service['name']}} </p>
                                        </div>
                                        @foreach ($done_service['buttons'] as $permission)
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input pv_permission"  value="{{$permission['id']}}" name="permission[]">
                                                <label class="form-check-label" for="">{{$permission['name']}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                          </div>
                        </div>

                    </div>

            
                </div>


                <button type="submit" class="btn btn-primary">أنشئ المستخدم</button>
            </form>

        </div>
    </section>

    <script>
        $('.service label.form-check-label').each(function(){
            var $element = $(this);
            var modifiedText = $element.text().replace(/[a-zA-Z]+/g, '<span class="nexa-light">$&</span>');
            $element.html(modifiedText);
        });
    </script>

@endsection

