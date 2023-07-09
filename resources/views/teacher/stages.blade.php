@extends('admin.layouts.layouts')
@section('content')

<div class="row">
    @foreach ($stages as $stage)
        <div class="col-12 col-md-4">
        <a href="/stage/{{$stage->id}}/subject">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center mt-3">
                            <h3>{{$stage->name}}</h3>
                    </div>
                </div>
            </div>
        </a>
        </div>    
    @endforeach
</div>
@endsection