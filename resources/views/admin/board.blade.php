@extends('admin.layouts.layouts')

@section('content')
    <iframe style="width:100%;height:100vh" src="https://miro.com/app/live-embed/{{$user->board_id}}" frameborder="0"></iframe>
@endsection