@extends('layouts')
@section('title', 'จัดการข้อมูลครูที่ปรึกษา')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(224, 224, 224, 0.9);">
            <div class="card-body">

                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis">จัดการข้อมูลครูที่ปรึกษา</h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="overflow-scroll">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-primary-emphasis">รหัสอาจารย์ที่ปรึกษา</th>
                                            <th scope="col" class="text-primary-emphasis">ชื่อ - นามสกุล</th>
                                            <th scope="col" class="text-primary-emphasis">เบอร์โทรศัพท์</th>
                                            <th scope="col" class="text-primary-emphasis">แก้ไข</th>
                                            <th scope="col" class="text-primary-emphasis">ลบ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($CounselorData as $data)
                                            <tr>
                                                <td class="text-primary-emphasis">{{ str_pad($data->counselor_id, 4, '0', STR_PAD_LEFT) }}</td>
                                                <td class="text-primary-emphasis">{{ $data->counselor_name }}</td>
                                                <td class="text-primary-emphasis">{{ $data->counselor_tel }}</td>

                                                <td>
                                                    <a href="{{ route('counseloredit', ['counselor_id' =>  str_pad($data->counselor_id, 4, '0', STR_PAD_LEFT) ]) }}"
                                                        class="btn btn-warning">
                                                        แก้ไข
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('counselordelete', ['counselor_id' =>  str_pad($data->counselor_id, 4, '0', STR_PAD_LEFT) ]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('ยืนยันการลบครูที่ปรึกษา {{ str_pad($data->counselor_id, 4, '0', STR_PAD_LEFT) }}')">
                                                        ลบ
                                                    </a>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                {{ $CounselorData->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('counselorcreate')}}" style="text-decoration: none">
                    <div class="con mt-2" style="display: flex;">
                        <button type="button" class="btn btn-success m-auto"
                            style="width: 60%">เพิ่มข้อมูลครูที่ปรึกษา</button>
                    </div>
                </a>

            </div>
        </div>
    </div>






@endsection
