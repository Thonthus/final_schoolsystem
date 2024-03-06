@extends('layouts')
@section('title', 'ค้นหาข้อมูลนักเรียนรายบุคคล')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(29, 72, 136, 0.9);">
            <div class="card-body">

                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis mb-3">ค้นหาข้อมูลนักเรียนรายบุคคล</h2>
                            </div>

                            <div style="display: flex; justify-content: center; width: 100%;" class="mb-2">
                                <div class="image-frame">
                                    <img src="{{ asset('images/loginhead.png') }}" alt="login" id="StudentImg">
                                </div>
                            </div>

                            <div class="ct ms-auto">
                                <form method="GET" action="/studentinfoAdmin" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <input type="text" class="form-control" aria-describedby="textDes"
                                            name="student_id" placeholder="รหัสประจำตัวนักเรียน" required>
                                    </div>

                                    <div class="con mt-1" style="display: flex;">
                                        <button type="submit" class="btn btn-primary m-auto"
                                            style="width: 60%">ค้นหา</button>
                                    </div>
                                    @error('student_id')
                                        <div class="my-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($student)
                    <div class="container mt-3">
                        <div class="row text-center">
                            <div class="bg-white rounded shadow-sm py-3 px-4">
                                <h3 class="m-auto text-primary-emphasis mb-3">ข้อมูลนักเรียน</h3>
                                <div style="display: flex; justify-content: center; width: 100%;" class="mb-2">
                                    <div class="image-frame">
                                        @if ($student && $student->student_img && $student->student_img !== '-')
                                            <img src="{{ asset('storage/studentimgs/' . $student->student_img) }}"
                                                alt="student_img" id="StudentImg">
                                        @else
                                            <img src="{{ asset('images/loginhead.png') }}" alt="default" id="StudentImg">
                                        @endif
                                    </div>
                                </div>
                                <div class="con" style="display: flex">
                                    <div class="m-auto" style="width: 70%">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            รหัสนักศึกษา</th>
                                                        <td
                                                            style="color: rgb(27, 60, 136);"style="color: rgb(27, 60, 136);">
                                                            {{ $student->student_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            ชื่อ - นามสกุล</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->firstname }}
                                                            {{ $student->lastname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            ชั้น</th>
                                                        <td style="color: rgb(27, 60, 136);">
                                                            {{ $student->classroom->level->level_name }}ปีที่
                                                            {{ $student->classroom->class_grade }}/{{ $student->classroom->class_num }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            เลขที่</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            ชื่อเล่น</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->nickname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            วันเกิด</th>
                                                        <td style="color: rgb(27, 60, 136);">
                                                            @php
                                                                $birthdate = \Carbon\Carbon::parse($student->birthdate);
                                                                $thaiMonths = [
                                                                    1 => 'มกราคม',
                                                                    2 => 'กุมภาพันธ์',
                                                                    3 => 'มีนาคม',
                                                                    4 => 'เมษายน',
                                                                    5 => 'พฤษภาคม',
                                                                    6 => 'มิถุนายน',
                                                                    7 => 'กรกฎาคม',
                                                                    8 => 'สิงหาคม',
                                                                    9 => 'กันยายน',
                                                                    10 => 'ตุลาคม',
                                                                    11 => 'พฤศจิกายน',
                                                                    12 => 'ธันวาคม',
                                                                ];
                                                                $formattedDate =
                                                                    $birthdate->day .
                                                                    ' ' .
                                                                    $thaiMonths[$birthdate->month] .
                                                                    ' ' .
                                                                    ($birthdate->year + 543);
                                                            @endphp
                                                            {{ $formattedDate }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            เพศ</th>
                                                        <td style="color: rgb(27, 60, 136);">
                                                            @if ($student->gender === 'M')
                                                                ชาย
                                                            @elseif($student->gender === 'F')
                                                                หญิง
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            เลขประจำตัวประชาชน</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->personal_id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            เบอร์โทรศัพท์</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            อีเมล</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            ที่อยู่</th>
                                                        <td style="color: rgb(27, 60, 136);">{{ $student->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            ครูที่ปรึกษา</th>
                                                        <td style="color: rgb(27, 60, 136);">
                                                            {{ $student->classroom->counselor->counselor_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"
                                                            style=" background-color: rgb(39, 74, 156); color:rgb(255, 255, 255);">
                                                            เบอร์โทรศัพท์ครูที่ปรึกษา</th>
                                                        <td style="color: rgb(27, 60, 136);">
                                                            {{ $student->classroom->counselor->counselor_tel }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- <pre>{{ json_encode($student, JSON_PRETTY_PRINT) }}</pre> --}}

                                <div class="con mt-1" style="display: flex;">
                                    <a href="{{ route('studentdelete', ['student_id' => $student->student_id]) }}"
                                        class="btn btn-danger m-auto" style="width: 35%">ลบข้อมูล</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
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
