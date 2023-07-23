@extends('admin.layouts.layouts')
@section('content')
    @if($type=="view")
        <livewire:pagination.quiz />
    @endif
    @if($type=="add")
        <livewire:quiz.create />
    @endif
    @if($type=="edit")

        @livewire('quiz.edit', ['data' => $data])
    @endif
@endsection
