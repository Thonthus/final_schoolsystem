@extends('layouts')
@section('title', 'แก้ไขข้อมูลครูที่ปรึกษา')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary-emphasis">แก้ไขข้อมูลครูที่ปรึกษา</h2>

                <form method="POST" action="{{ route('counselorupdate', $counselor_info->counselor_id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">รหัสครูที่ปรึกษา</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_id"
                            placeholder="รหัสครูที่ปรึกษา" value="{{ $counselor_info->counselor_id }}">
                        <div id="textDes" class="form-text text-danger-emphasis">4 หลัก
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">ชื่อ และ นามสกุล</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_name"
                            placeholder="ชื่อ และ นามสกุล" value="{{ $counselor_info->counselor_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">เบอร์โทรศัพท์</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_tel"
                            placeholder="รหัสอาจารย์ที่ปรึกษา" value="{{ $counselor_info->counselor_tel }}">
                    </div>


                    <div class="con mt-2" style="display: flex;">
                        <button type="submit" class="btn btn-success m-auto" style="width: 60%">บันทึก</button>
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
