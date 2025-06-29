@extends('layouts.kelompok3')

@section('ataskelompok3', 'Home')

@section('tengahkelompok3')

{{-- Session  error --}}
@if (session('error'))
    <div class="bg-red-700/80 text-white text-center py-3">
        {{ session('error') }}
    </div>
@endif

<div class="bg-gray-50">

    {{-- @php

        $page = request()->query('page');


    @endphp

    @if ($page === 'tiket')

        @include('form.form_588')

    @elseif ($page === 'buytiket')

        @include('form.form_592')

    @else

        @include('layouts.body')

    @endif --}}

    @include('layouts.body')

</div>

@endsection

@section('bawahkelompok3', 'Copyright 2025 Kelompok 3')
