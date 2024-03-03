@extends('layouts')
@section('title', 'เพิ่ม/แก้ไขรูปภาพนักเรียน')
@section('content')

    <div class="mt-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4">เพิ่ม/แก้ไขรูปภาพนักเรียน</h2>
                <div style="display: flex; width: 100%;">
                    <img src="{{ asset('images/loginhead.png') }}" alt="login" class="m-auto mb-4" style="width:15%">
                </div>
                <form method="POST" action="/storeImage" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6>รหัสประจำตัวนักเรียน</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="student_id"
                            placeholder="รหัสประจำตัวนักเรียน">
                        <div id="textDes" class="form-text">ใส่รหัสประจำตัวนักเรียนที่ต้องการเพิ่ม</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h6>เลือกรูปภาพ</h6>
                        </label>
                        <input type="file" name="student_img" class="form-control">
                    </div>

                    <div class="con" style="display: flex;">
                        <button type="submit" class="btn btn-success m-auto" style="width: 60%">บันทึก</button>
                    </div>
                    <div class="con pt-2" style="display: flex;">
                        <p class="m-auto text-success">{{ session('success') }}</p>
                    </div>

                    <div class="con pt-2" style="display: flex;">
                        @error('student_id')
                            <p class="text-danger m-auto">{{ $message }}</p>
                        @enderror
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
