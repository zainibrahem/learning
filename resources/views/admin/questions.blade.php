@extends('admin.layouts.layouts')
@section('content')

@if($type=="view")
    <livewire:pagination.question-pagination />
@endif
@if($type=="create")
    <livewire:questions.create />
@endif

@if($type=="edit")
    @livewire('questions.edit', ['data' => $id])
@endif





@endsection
