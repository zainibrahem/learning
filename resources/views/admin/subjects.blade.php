@extends('admin.layouts.layouts')
@section('content')
    @if($type=="view")
    <livewire:pagination.subjects-pagination />
    @endif

    @if($type=="create")
        <livewire:subjects.create />
    @endif

    @if($type=="view_one")

        @livewire('subjects.edit', ['data' => $id])
    @endif


@endsection
