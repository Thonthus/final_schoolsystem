@extends('layouts')
@section('title', 'รายการบันทึกเวลาเข้า - ออกโรงเรียน')
@section('content')

    <div class="mt-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(224, 224, 224, 0.9);">
            <div class="card-body">

                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis mb-4">ค้นหาข้อมูลนักเรียนรายบุคคล</h2>
                            </div>
                            <div class="ct ms-auto">
                                <form method="GET" action="/studentinfoAdmin" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control"aria-describedby="textDes"
                                            name="student_id" placeholder="รหัสประจำตัวนักเรียน">
                                    </div>

                                    <div class="con mt-2" style="display: flex;">
                                        <button type="submit" class="btn btn-primary m-auto"
                                            style="width: 60%">ค้นหา</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <h3 class="m-auto text-primary-emphasis mb-4">ข้อมูลนักเรียน</h3>
                            <div style="display: flex; justify-content: center; width: 100%;">
                                <div class="image-frame">
                                    @if (session('student_img') && session('student_img') !== '-')
                                        <img src="{{ asset('storage/studentimgs/' . session('student_img')) }}" alt="student_img"
                                            id="StudentImg">
                                    @else
                                        <img src="{{ asset('images/loginhead.png') }}" alt="login" id="StudentImg">
                                    @endif
                                </div>
                            </div>
                           {{$student}}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection

<style>
    .image-frame {
        width: 216px;
        height: 270px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
    }

    #StudentImg {
        max-width: 98%;
        max-height: 98%;
        object-fit: cover;
    }
</style>
