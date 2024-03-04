@extends('layouts')
@section('title', 'เมนูหลัก')
@section('content')
    <div class="mt-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(233, 233, 233, 0.7);">
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto" style="color: rgb(10, 88, 213)">เมนูหลัก</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row text-center">

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/studentinfo" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/personalInfo.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">ข้อมูลส่วนตัว</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/studentcheckedhistory" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/checkedInfo.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">ประวัติบันทึกเวลาเข้า - ออกโรงเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                       



                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
