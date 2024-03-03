@extends('layouts')
@section('title', 'เพิ่มผู้ดูแลระบบ')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary-emphasis">เพิ่มผู้ดูแลระบบ</h2>

                <form method="POST" action="/addadmin" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">ชื่อผู้ใช้ ( ที่ต้องการเพิ่ม )</h6>
                        </label>
                        <input type="text" class="form-control"aria-describedby="textDes" name="username"
                            placeholder="ชื่อผู้ใช้">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">
                            <h6 class="text-primary-emphasis">รหัสผ่าน ( ที่ต้องการเพิ่ม )</h6>
                        </label>
                        <input type="password" class="form-control"aria-describedby="textDes" name="password"
                            placeholder="รหัสผ่าน">
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
