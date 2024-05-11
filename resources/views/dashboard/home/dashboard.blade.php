@extends('layouts.master')

@section('page-icon')
<i class="fa-solid fa-chart-line"></i>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mx-10">
            <h2 class="font-semibold text-4xl text-[#222222]">Welcome Cheif,</h2>
            <div class="flex gap-3 font-medium text-2xl text-[#222222]">
                <p>{{ Auth::user()->firstname }}</p>
                <p>{{ Auth::user()->lastname }}</p>
            </div>
        </div>
    </div>
@endsection
