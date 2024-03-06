@extends('layouts')
@section('title', 'รายชื่อนักเรียนทั้งหมด')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(224, 224, 224, 0.9);">
            <div class="card-body">

                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis">รายชื่อนักเรียนทั้งหมด</h2>
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
                                            <th scope="col" class="text-primary-emphasis">รหัสนักศึกษา</th>
                                            <th scope="col" class="text-primary-emphasis">รหัสห้องเรียน</th>
                                            <th scope="col" class="text-primary-emphasis">ชื่อ - นามสกุล</th>
                                            <th scope="col" class="text-primary-emphasis">รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($StudentsData as $data)
                                            <tr>
                                                <td class="text-primary-emphasis"> {{ $data->student_id }} </td>
                                                <td class="text-primary-emphasis"> {{ $data->class_id }} </td>
                                                <td class="text-primary-emphasis"> {{ $data->firstname }}
                                                    {{ $data->lastname }} </td>
                                                <td>
                                                    <a href="/studentinfoAdmin?&student_id={{ $data->student_id }}"
                                                        class="btn btn-primary">
                                                        รายละเอียด
                                                    </a>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $StudentsData->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
