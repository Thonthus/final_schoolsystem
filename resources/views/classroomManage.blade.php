@extends('layouts')
@section('title', 'จัดการข้อมูลห้องเรียน')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(224, 224, 224, 0.9);">
            <div class="card-body">

                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis">จัดการข้อมูลห้องเรียน</h2>
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
                                            <th scope="col" class="text-primary-emphasis">รหัสห้องเรียน</th>
                                            <th scope="col" class="text-primary-emphasis">ระดับ</th>
                                            <th scope="col" class="text-primary-emphasis">ระดับชั้น</th>
                                            <th scope="col" class="text-primary-emphasis">ห้อง</th>
                                            <th scope="col" class="text-primary-emphasis">แก้ไข</th>
                                            <th scope="col" class="text-primary-emphasis">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ClassroomData as $data)
                                            <tr>
                                                <td class="text-primary-emphasis">
                                                    {{ str_pad($data->class_id, 5, '0', STR_PAD_LEFT) }}</td>
                                                <td class="text-primary-emphasis">
                                                    @if ($data->level_id == '01')
                                                        ปฐมวัย
                                                    @elseif($data->level_id == '02')
                                                        ประถมศึกษา
                                                    @elseif($data->level_id == '03')
                                                        มัธยมศึกษา
                                                    @endif
                                                </td>
                                                <td class="text-primary-emphasis">{{ $data->class_grade }}</td>
                                                <td class="text-primary-emphasis">{{ $data->class_num }}</td>


                                                <td>
                                                    <a href="{{ route('classroomedit', ['class_id' => sprintf('%05d', $data->class_id)]) }}"
                                                        class="btn btn-warning">
                                                        แก้ไข
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('classroomdelete', ['class_id' => sprintf('%05d', $data->class_id)]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('ยืนยันการลบห้อง {{ str_pad($data->class_id, 5, '0', STR_PAD_LEFT) }}')">
                                                        ลบ
                                                    </a>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                {{ $ClassroomData->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('classroomecreate')}}" style="text-decoration: none">
                    <div class="con mt-2" style="display: flex;">
                        <button type="button" class="btn btn-success m-auto"
                            style="width: 60%">เพิ่มข้อมูลห้องเรียน</button>
                    </div>
                </a>
            </div>
        </div>
    </div>






@endsection
