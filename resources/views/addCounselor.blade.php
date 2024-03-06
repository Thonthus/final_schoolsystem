@extends('layouts')
@section('title', 'เพิ่มข้อมูลครูที่ปรึกษา')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary-emphasis">เพิ่มข้อมูลครูที่ปรึกษา</h2>

                <form method="POST" action="{{ route('counselorinsert') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">รหัสครูที่ปรึกษา</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_id"
                            placeholder="รหัสครูที่ปรึกษา">
                        <div id="textDes" class="form-text text-danger-emphasis">4 หลัก
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">ชื่อ และ นามสกุล</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_name"
                            placeholder="ชื่อ และ นามสกุล">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">เบอร์โทรศัพท์</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_tel"
                            placeholder="รหัสอาจารย์ที่ปรึกษา">
                    </div>


                    <div class="con mt-2" style="display: flex;">
                        <button type="submit" class="btn btn-success m-auto" style="width: 60%">บันทึก</button>
                    </div>
                    <div class="con pt-2" style="display: flex;">
                        <p class="m-auto text-success">{{ session('success') }}</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                </form>

            </div>
        </div>
    </div>
@endsection
