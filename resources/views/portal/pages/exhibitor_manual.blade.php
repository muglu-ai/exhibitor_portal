@include('portal.components.header')
@include('portal.components.sidebar')

@extends('layouts.app')

@section('content')
<div class="pdf-container">
    <iframe src="{{ asset('path/to/your/file.pdf') }}" allowfullscreen></iframe>
</div>
@endsection

@section('styles')
<style>
    .pdf-container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
    }
    .pdf-container iframe {
        width: 80%;
        height: 90vh;
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
