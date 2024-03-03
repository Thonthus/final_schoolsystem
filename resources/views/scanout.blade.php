@extends('scanlayouts')
@section('title', 'บันทึกเวลาออกโรงเรียน')
@section('content')

    <div class="mt-4" style="display:flex;">
        <div class="card m-auto" style="width: 80%">
            <div class="card-body">
                <h2 class="text-center mb-4">บันทึกเวลาออกโรงเรียน</h2>
                <div style="display: flex; justify-content: center; width: 100%;">
                    <div class="image-frame">
                        @if (session('student_img') && session('student_img') !== '-')
                            <img src="{{ asset('storage/studentimgs/' . session('student_img')) }}" alt="student_img"
                                id="StudentImg">
                        @else
                            <img src="{{ asset('images/loginhead.png') }}" alt="login" id="StudentImg">
                        @endif
                    </div>
                </div>

                <div id="messageContainer" class="text-center mt-2">
                    @if (session('success'))
                        <h4 id="dynamicMessage">{{ session('success') }}</h4>
                    @else
                        <h4 id="dynamicMessage">ป้อนรหัสประจำตัวนักเรียน</h4>
                    @endif
                </div>

                <form method="POST" action="/scanOutinsert">
                    @csrf
                    <label for="studentidIn" class="form-label">บันทึกเวลาออกโรงเรียน</label>
                    <input type="text" name="student_id" id="studentidIn" class="form-control"
                        placeholder="รหัสประจำตัวนักเรียน">
                    @error('student_id')
                        <div class="my-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="con mt-2" style="display: flex;">
                        <button type="submit" class="btn btn-success m-auto" style="width: 60%">บันทึก</button>
                    </div>
                </form>


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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('studentidIn').focus();

        if ({{ session('success') ? 'true' : 'false' }}) {
            setTimeout(function() {
                document.getElementById('dynamicMessage').textContent = 'ป้อนรหัสประจำตัวนักเรียน';
                document.getElementById('StudentImg').src = "{{ asset('images/loginhead.png') }}";
            }, 3000);
        }
    });
</script>
