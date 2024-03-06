@extends('layouts')
@section('title', 'แก้ไขข้อมูลห้องเรียน')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary-emphasis">แก้ไขข้อมูลห้องเรียน</h2>

                <form method="POST" action="{{route('classroomupdate',$class_info->class_id)}}" enctype="multipart/form-data" id="classroom">
                    @csrf

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">รหัสห้องเรียน</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="class_id"
                            placeholder="รหัสห้องเรียน" value="{{$class_info->class_id}}">
                        <div id="textDes" class="form-text text-danger-emphasis">เลขห้องเรียนมี 5 หลัก ประกอบด้วย 2
                            หลักแรกคือรหัสระดับชั้น | 3 หลักหลังคือเลขห้อง เช่น มัธยมศึกษาปีที่ 1/1 : 03101
                        </div>
                    </div>

                    <div class="mb-3">

                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">ระดับ</h6>
                        </label>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="level_id" name="level_id" form="classroom" value="{{$class_info->level_id}}">
                                <option selected>เลือกระดับ</option>
                                <option value="01">ปฐมวัย</option>
                                <option value="02">ประถมศึกษา</option>
                                <option value="03">มัธยมศึกษา</option>
                            </select>
                            <label for="floatingSelect">เลือกระดับ</label>
                        </div>
                    </div>

                    <label for="text" class="form-label">
                        <h6 class="text-primary-emphasis">ระดับชั้น และ ห้อง</h6>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-primary-emphasis">ระดับชั้น</span>
                        <input type="text" class="form-control" placeholder="ระดับชั้น" name="class_grade" value="{{$class_info->class_grade}}">
                        <span class="input-group-text text-primary-emphasis">ห้อง</span>
                        <input type="text" name="class_num" class="form-control" placeholder="ห้อง" value="{{$class_info->class_num}}">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">รหัสอาจารย์ที่ปรึกษา</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="counselor_id"
                            placeholder="รหัสอาจารย์ที่ปรึกษา" value="{{$class_info->counselor_id}}">
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
