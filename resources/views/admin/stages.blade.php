@extends('admin.layouts.layouts')
@section('content')
    @if($type=="view")
    <livewire:pagination.stages-pagination />
    @elseif($type=="create")
        <livewire:stages.create />
    @elseif($type=="edit")
{{--        <livewire:stages.edit />--}}
        @livewire('stages.edit', ['data' => $id])
    @endif
@endsection
