@extends('layouts')
@section('title', 'หน้าแรก')
@section('content')
    <marquee behavior="scroll" direction="left" class="mb-4 mq">
        ยินดีต้อนรับเข้าสู่เว็บไซต์ระบบดูแลช่วยเหลือนักเรียนโรงเรียนบ้านหนองจิงเกิลเบล
        ยินดีต้อนรับเข้าสู่เว็บไซต์ระบบดูแลช่วยเหลือนักเรียนโรงเรียนบ้านหนองจิงเกิลเบล
    </marquee>
    <div class="mb-2" style="display: flex">
        <div class="m-auto">
            <img src="{{ asset('images/homebanner.png') }}" alt="Description" style="width: 80vw;">
        </div>
    </div>


    <div class="mb-4" style="display: flex">
        <div class="m-auto mt-2" style="width: 40%">
            <a href="/login">
                <button type="button" class="btn"
                    style="width: 100%;  background-color: rgb(65, 164, 250); color:rgb(255, 248, 224);">
                    เข้าสู่ระบบ
                </button>
            </a>
        </div>
    </div>



@endsection

<style>
    .mq {
        width: 100vw;
        background-color: white
    }
</style>
