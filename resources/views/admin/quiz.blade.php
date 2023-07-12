@extends('admin.layouts.layouts')
@section('content')
    @if($type=="view")
        <livewire:pagination.quiz />
    @endif
    @if($type=="add")
        <livewire:quiz.create />
    @endif
@endsection
