@extends('admin.layouts.layouts')
@section('content')

<div class="row">
    @foreach ($subjects as $subject)
        <div class="col-12 col-md-4">
        <a href="/subject/{{$subject->id}}/files">
            <div class="card">
                <div class="card-body">
                    <img style="border-radius: 0.5rem" class="img-fluid" src="{{asset($subject->image)}}" alt="">
                    <div class="d-flex align-items-center justify-content-center mt-3">
                            <h3>{{$subject->name}}</h3>
                    </div>
                </div>
            </div>
        </a>
        </div>    
    @endforeach
</div>
@endsection