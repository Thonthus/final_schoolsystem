@extends('layouts')
@section('title', 'แก้ไขข้อมูลนักเรียน')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary-emphasis">แก้ไขข้อมูลนักเรียน</h2>

                <form method="POST" action="/updatestudent/{{$studentData->student_id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">รหัสประจำตัวนักเรียน</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="student_id"
                            placeholder="รหัสประจำตัวนักเรียน" value="{{$studentData->student_id}}">
                    </div>

                    <label for="text" class="form-label">
                        <h6 class="text-primary-emphasis">รหัสห้องเรียน และ เลขที่</h6>
                        <div id="textDes" class="form-text text-danger-emphasis">เลขห้องเรียนมี 5 หลัก ประกอบด้วย 2
                            หลักแรกคือรหัสระดับชั้น | 3 หลักหลังคือเลขห้อง เช่น มัธยมศึกษาปีที่ 1/1 : 03101
                        </div>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-primary-emphasis">รหัสห้องเรียน</span>
                        <input type="text" class="form-control" placeholder="รหัสห้องเรียน" name="class_id" value="{{$studentData->class_id}}">
                        <span class="input-group-text text-primary-emphasis">เลขที่</span>
                        <input type="text" name="number" class="form-control" placeholder="เลขที่" value="{{$studentData->class_id}}">
                    </div>

                    <label for="text" class="form-label">
                        <h6 class="text-primary-emphasis">ชื่อ และ นามสกุล</h6>
                    </label>
                    <div class="input-group mb-2">
                        <span class="input-group-text">ชื่อ และ นามสกุล</span>
                        <input type="text" name="firstname" aria-label="First name" class="form-control"
                            placeholder="ชื่อ" value="{{$studentData->firstname}}">
                        <input type="text" name="lastname" aria-label="Last name" class="form-control"
                            placeholder="นามสกุล" value="{{$studentData->lastname}}">
                    </div>

                    <label for="text" class="form-label mt-1">
                        <h6 class="text-primary-emphasis">ชื่อเล่น และ วันเกิด</h6>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-primary-emphasis">ชื่อเล่น</span>
                        <input type="text" class="form-control" placeholder="ชื่อเล่น" name="nickname" value="{{$studentData->nickname}}">
                        <span class="input-group-text text-primary-emphasis">วันเกิด</span>
                        <input type="date" class="form-control" placeholder="วันเกิด" name="birthdate" value="{{$studentData->birthdate}}">
                    </div>

                    <label for="text" class="form-label mt-1">
                        <h6 class="text-primary-emphasis">เพศ และ เลขประจำตัวประชาชน</h6>
                        <div id="textDes" class="form-text text-danger-emphasis">
                            เพศชายกรอก 'M' , เพศหญิงกรอก 'F'
                        </div>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-primary-emphasis">เพศ</span>
                        <input type="text" class="form-control" placeholder="เพศ" name="gender" value="{{$studentData->gender}}">
                        <span class="input-group-text text-primary-emphasis">เลขประจำตัวประชาชน</span>
                        <input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน" name="personal_id" value="{{$studentData->personal_id}}">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">ที่อยู่</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="address"
                            placeholder="ที่อยู่" value="{{$studentData->address}}">
                    </div>

                    <label for="text" class="form-label mt-1">
                        <h6 class="text-primary-emphasis">เบอร์โทรศัพท์ และ อีเมล</h6>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-primary-emphasis">เบอร์โทรศัพท์</span>
                        <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" name="phone" value="{{$studentData->phone}}">
                        <span class="input-group-text text-primary-emphasis">อีเมล</span>
                        <input type="email" class="form-control" placeholder="อีเมล" name="email" value="{{$studentData->email}}">
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


                    <div class="con pt-2" style="display: flex;">
                        <p class="m-auto text-danger-emphasis">**รูปภาพนักเรียนสามารถเพิ่มได้ที่เมนู
                            เพิ่ม/แก้ไขรูปภาพนักเรียน</p>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection