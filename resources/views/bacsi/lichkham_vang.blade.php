@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('backend/css/lichtruc.css')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{asset('frontend/js/jquery.magnifier.js')}}"></script>


<div class="card">
    <div class="card-body">
        <div id="form" class="row">
            <div class="col-4">

                <div class="single-team mb-30">

                    <div class="team-caption">
                        <h2 class="contact-title">Danh sách chưa khám {{($title)}} </h2>

                    </div>
                    <hr>
                </div>
            </div>
            <br>
            <div class="col-12">
                @if(strlen($title)==0)
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Ca khám</th>
                            <th>Ngày khám</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Trạng thái </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach($danhsach as $key=>$value)
                        <?php $i++; ?>
                        <tr>
                            <td id="hello" data-label="Ca khám:">{{($value->giokham)}}</td>
                            <td data-label="Ngày sinh :">{{($value->NgayTruc)}}</td>
                            <td data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>

                            <td data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                                echo "Nam";
                                                            } else {
                                                                echo "Nữ";
                                                            } ?></td>

                            @if($value->Trangthai == 3)
                            <td class="error" data-label="Trạng thái"> Vắng </td>
                            @else
                            <td class="success" data-label="Trạng thái"> </td>
                            @endif


                            <td><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi">Chi tiết</a></td>
                        </tr>
                        @endforeach


                    </tbody>

                </table>
                @else
                <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                    <th>Ca khám </th>
                        <th>STT</th>

                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $key=>$value)
                        <?php $time = substr($value->giokham,0,2) ?>
                    <tr>
                        @if($time % 2==0)
                        <td style="color: red; background-color:aqua" data-label="Ca khám:">{{($value->giokham)}}</td>
                        <td style="color: red; background-color:aqua" id="hello" data-label="Mã bệnh nhân :">{{($value->STT)}}</td>
                        <td style="color: red; background-color:aqua" data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>
                        <td style="color: red; background-color:aqua" data-label="Ngày sinh :">{{($value->Ngaysinh)}}</td>
                        <td style="color: red; background-color:aqua" data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>
                        <td style="color: red; background-color:aqua"><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi" >Chi tiết</a>|
                        <a style="color: red;" href="{{URL::to('/bac-si/kham/?key=1&mabn='.$value->MaLK)}}" class="hihi" >Khám</a></td>
                        @else
                        <td  data-label="Ca khám:">{{($value->giokham)}}</td>
                        <td  id="hello" data-label="Mã bệnh nhân :">{{($value->STT)}}</td>
                        <td  data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>
                        <td  data-label="Ngày sinh :">{{($value->Ngaysinh)}}</td>
                        <td  data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>
                        <td ><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi" >Chi tiết</a>|
                          <a style="color: red;" href="{{URL::to('/bac-si/kham/?key=1&mabn='.$value->MaLK)}}" class="hihi" >Khám</a></td>
                    @endif
                    </tr>

                    @endforeach


                </tbody>

            </table>
            @endif
            </div>
            <a onclick="hi()" class="btn btn-primary">
                Quay lại </a>
            <script type="text/javascript">
                function hi(){
                    parent.history.back();
                }
            </script>
        </div>

    </div>
</div>
</div>

@endsection
