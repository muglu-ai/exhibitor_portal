@include('portal.components.header')
@include('portal.components.sidebar')
@php
$exh_id = session('exhibitor_id');
@endphp
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
<script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if(getMode && getMode ==="dark"){
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if(getStatus && getStatus ==="close"){
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () =>{
        body.classList.toggle("dark");
        if(body.classList.contains("dark")){
            localStorage.setItem("mode", "dark");
        }else{
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if(sidebar.classList.contains("close")){
            localStorage.setItem("status", "close");
        }else{
            localStorage.setItem("status", "open");
        }
    })
</script>
