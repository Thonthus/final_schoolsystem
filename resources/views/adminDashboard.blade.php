@extends('layouts')
@section('title', 'เมนูหลัก')
@section('content')

    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 90%;  background-color: rgba(233, 233, 233, 0.7);">
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row text-center">
                        <div class="bg-white rounded shadow-sm py-3 px-4">
                            <div class="con" style="display: flex">
                                <h2 class="m-auto" style="color: rgb(10, 88, 213)">เมนูหลัก</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row text-center">


                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/scanIn" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/scanin.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">ระบบบันทึกเวลาเข้าโรงเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/scanOut" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/scanout.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">ระบบบันทึกเวลาออกโรงเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/checkedrecords" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/checkedInfo.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">รายการบันทึกเวลาเข้า - ออกโรงเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        
                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/findcheckedhistory" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/checkedSearch.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">ประวัติบันทึกเวลาเข้า - ออกโรงเรียนรายบุคคล</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/studentinfoAdmin" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/personalInfosearch.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">ค้นหาข้อมูลนักเรียนรายบุคคล</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/studentsdata" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/studentsAll.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">รายชื่อนักเรียนทั้งหมด</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/addstudent" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/addstudent.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">เพิ่มข้อมูลนักเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/storeImage" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/editImg.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">เพิ่ม/แก้ไขรูปภาพนักเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/editstudent" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/editStudentinfo.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">แก้ไขข้อมูลนักเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/counselorManage" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/counselorManage.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">จัดการข้อมูลครูที่ปรึกษา</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/classManage" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/classroomManage.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">จัดการข้อมูลห้องเรียน</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-5">
                            <a href="/addadmin" style="text-decoration: none;">
                                <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                        src="{{ asset('images/addAdmin.png') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                    <h5 class="mb-0">เพิ่มผู้ดูแลระบบ</h5>
                                    <span class="small text-uppercase text-muted">
                                        กดที่นี่
                                    </span>
                                </div>
                            </a>
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </div>






@endsection
