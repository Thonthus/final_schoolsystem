@extends('layouts')
@section('title', 'เข้าสู่ระบบ')
@section('content')

    <div class="mt-4" style="display:flex;">
        <div class="card m-auto"  style="width: 80%">
            <div class="card-body">
                <div class="" >
                    <div class="">
                        <h2 class="text-center mb-4">เข้าสู่ระบบ</h2>
                        <div style="display: flex; width: 100%;">
                            <img src="{{ asset('images/loginhead.png') }}" alt="login" class="m-auto mb-4" style="width:15%">
                        </div>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="text" class="form-label">
                                    <h6>ชื่อผู้ใช้</h6>
                                </label>
                                <input type="text" class="form-control"aria-describedby="textDes" name="username"
                                    placeholder="Username" >
                                <div id="textDes" class="form-text">นักเรียนและผู้ปกครองกรอกรหัสประจำตัวนักเรียน</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <h6>รหัสผ่าน</h6> 
                                </label>
                                <input type="password" name="password" placeholder="Password" class="form-control">
                                <div id="textDes" class="form-text">เลขประจำตัวประชาชนของนักเรียน</div>
                            </div>
                            <div class="text-danger">
                                {{ session('error') }}
                            </div>
                            <div class="con" style="display: flex;">
                                <button type="submit" class="btn btn-success m-auto" style="width: 60%">เข้าสู่ระบบ</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
