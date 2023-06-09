@extends('layouts.error')

@section('content')
    <img src="{{asset('assets/images/error/404.png')}}" class="img-fluid mb-4 w-50" alt=""> 
    <h2 class="mb-0 mt-4 text-white">Oops! This Page is Not Found.</h2>
    <p class="mt-2 text-white">The requested page dose not exist.</p>
    <a class="btn bg-white text-primary d-inline-flex align-items-center" href="../index.html">Back to Home</a>
@endsection