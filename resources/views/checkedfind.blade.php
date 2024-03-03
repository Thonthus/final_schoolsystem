@extends('layouts')
@section('title', 'ค้นหาประวัติบันทึกเวลาเข้า - ออกโรงเรียนรายบุคคล')
@section('content')
    <div class="mt-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4">ค้นหาประวัติบันทึกเวลาเข้า - ออกโรงเรียนรายบุคคล</h2>
                <div style="display: flex; width: 100%;">
                    <img src="{{ asset('images/loginhead.png') }}" alt="login" class="m-auto mb-4" style="width:15%">
                </div>
                <form method="GET" action="/findcheckedhistory">
                    @csrf
                    <div class="mb-3">
                        <label for="student_id" class="form-label">
                            <h6>รหัสประจำตัวนักเรียน</h6>
                        </label>
                        <input type="text" class="form-control" id="student_id" name="student_id"
                            aria-describedby="textDes" placeholder="รหัสประจำตัวนักเรียน">
                        <div id="textDes" class="form-text">ใส่รหัสประจำตัวนักเรียนที่ต้องการค้นหา</div>
                    </div>

                    <div class="con" style="display: flex;">
                        <button type="submit" class="btn btn-success m-auto" style="width: 60%;">ค้นหา</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (!empty($data) && $data->count() > 0)
        <div class="container mt-1">
            <div class="row text-center">
                <div class="bg-white rounded shadow-sm py-3 px-4">
                    <div class="con" style="display: flex">
                        <h2 class="m-auto text-primary-emphasis">รายการบันทึกเวลาเข้า - ออกโรงเรียน ของ
                            {{ $data[0]->student->firstname }} {{ $data[0]->student->lastname }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-1  mb-4">
            <div class="row text-center">
                <div class="bg-white rounded shadow-sm py-3 px-4">
                    <div class="overflow-scroll">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-primary-emphasis">รหัสประจำตัวนักเรียน</th>
                                    <th scope="col" class="text-primary-emphasis">ชื่อ</th>
                                    <th scope="col" class="text-primary-emphasis">วันที่ ( ปี-เดือน-วัน )</th>
                                    <th scope="col" class="text-primary-emphasis">เวลาเข้า</th>
                                    <th scope="col" class="text-primary-emphasis">เวลาออก</th>
                                    <th scope="col" class="text-primary-emphasis">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-primary-emphasis">{{ $item->student_id }}</td>
                                        <td class="text-primary-emphasis">{{ $item->student->firstname }}
                                            {{ $item->student->lastname }}</td>
                                        <td class="text-primary-emphasis">{{ $item->date }}</td>
                                        <td class="text-primary-emphasis">{{ $item->time_checked_in }}</td>
                                        <td class="text-primary-emphasis">{{ $item->time_checked_out }}</td>
                                        <td class="text-primary-emphasis">{{ $item->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
