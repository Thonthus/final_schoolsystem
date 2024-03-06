@extends('layouts')
@section('title', 'แก้ไขข้อมูลนักเรียน')
@section('content')
   
    <div class="mt-4 mb-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary-emphasis">แก้ไขข้อมูลนักเรียน</h2>
                <div>
                    <form id="studentSearchForm">
                        <div class="mb-3">
                            <label for="student_id" class="form-label">
                                <h6 class="text-primary-emphasis">รหัสประจำตัวนักเรียนที่ต้องการแก้ไข</h6>
                            </label>
                            <input type="text" class="form-control" id="student_id" aria-describedby="textDes" name="student_id"
                                   placeholder="รหัสประจำตัวนักเรียน">
                        </div>
                    
                        <div class="con mt-2" style="display: flex;">
                            <button type="submit" class="btn btn-success m-auto" style="width: 60%">ค้นหา</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('studentSearchForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var studentId = document.getElementById('student_id').value;
        window.location.href = `/editstudentinfo/${studentId}`;
    });
</script>
@endsection
