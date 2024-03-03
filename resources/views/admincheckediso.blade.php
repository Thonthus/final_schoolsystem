

@extends('layouts')
@section('title', 'ประวัติบันทึกเวลาเข้า - ออกโรงเรียนรายบุคคล')
@section('content')

    <div class="mt-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(224, 224, 224, 0.9);">
            <div class="card-body">

                <div class="container mt-1 mb-3">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis mb-4">ค้นหาข้อมูลนักเรียนรายบุคคล</h2>
                            </div>
                            <div class="ct ms-auto">
                                <form method="GET" action="/checkedrecordperson" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control"aria-describedby="textDes"
                                            name="student_id" placeholder="รหัสประจำตัวนักเรียน">
                                    </div>

                                    <div class="con mt-2" style="display: flex;">
                                        <button type="submit" class="btn btn-primary m-auto"
                                            style="width: 60%">ค้นหา</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container mt-1">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto text-primary-emphasis">รายการบันทึกเวลาเข้า - ออกโรงเรียน</h2>
                            </div>
                        </div>
                    </div>
                </div>
                {{$checkedData}}
                <div class="container mt-1">
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
                                        @foreach ($checkedData as $item)
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
                            <div class="mt-2">
                                {{ $checkedData->links() }}
                            </div>
                        </div>
                    </div>
                </div>


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
