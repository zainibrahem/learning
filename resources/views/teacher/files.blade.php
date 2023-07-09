@extends('admin.layouts.layouts')
@section('content')
<style>
    .card-body{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        overflow:hidden
    }
</style>
<div class="row">
    <div class="col-12 col-md-4">
        <div class="row">
            @foreach ($teacherFiles as $file)
                <div class="col-12 col-md-6">
                    <a href="/draw-pdf/{{$file->id}}">
                        <div class="card">
                            <div class="card-body">
                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <mask maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24" fill="black">                                    <rect fill="white" x="3" width="18" height="24"></rect>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"></path>                                    </mask>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z" stroke="#130F26" stroke-width="2" mask="url(#path-1-outside-1)"></path>                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24">                                    <mask mask-type="luminance" maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24" fill="black">                                    <rect fill="white" x="3" width="18" height="24"></rect>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"></path>                                    </mask>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z" fill="#130F26"></path>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z" stroke="#130F26" stroke-width="2" mask="url(#path-2-outside-2)"></path>                                    </mask>                                    <path d="M14 6V0L21 8H16C14.8954 8 14 7.10457 14 6Z" stroke="#130F26"></path>                                    <mask fill="white">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.5945L8.99429 12.1334C9.12172 11.9761 9.34898 11.9549 9.50189 12.0859C9.6548 12.217 9.67546 12.4507 9.54804 12.6079L7.93828 14.5945L9.54804 16.581C9.67546 16.7383 9.6548 16.972 9.50189 17.103C9.34898 17.2341 9.12172 17.2128 8.99429 17.0556L7 14.5945Z"></path>                                    </mask>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.5945L8.99429 12.1334C9.12172 11.9761 9.34898 11.9549 9.50189 12.0859C9.6548 12.217 9.67546 12.4507 9.54804 12.6079L7.93828 14.5945L9.54804 16.581C9.67546 16.7383 9.6548 16.972 9.50189 17.103C9.34898 17.2341 9.12172 17.2128 8.99429 17.0556L7 14.5945Z" stroke="#130F26" stroke-width="2" stroke-linecap="round" mask="url(#path-4-inside-3)"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.771 11.1638C13.9576 11.2542 14.0356 11.4769 13.9451 11.6611L10.9973 17.6664C10.9069 17.8506 10.6823 17.9267 10.4957 17.8363C10.3091 17.7458 10.2311 17.5232 10.3215 17.3389L13.2693 11.3336C13.3598 11.1494 13.5844 11.0733 13.771 11.1638Z" fill="#130F26"></path>                                    <mask fill="white">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17 14.5945L15.0057 17.0556C14.8783 17.2128 14.651 17.2341 14.4981 17.1031C14.3452 16.972 14.3245 16.7383 14.452 16.581L16.0617 14.5945L14.452 12.6079C14.3245 12.4507 14.3452 12.217 14.4981 12.0859C14.651 11.9549 14.8783 11.9761 15.0057 12.1334L17 14.5945Z"></path>                                    </mask>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17 14.5945L15.0057 17.0556C14.8783 17.2128 14.651 17.2341 14.4981 17.1031C14.3452 16.972 14.3245 16.7383 14.452 16.581L16.0617 14.5945L14.452 12.6079C14.3245 12.4507 14.3452 12.217 14.4981 12.0859C14.651 11.9549 14.8783 11.9761 15.0057 12.1334L17 14.5945Z" stroke="#130F26" stroke-width="2" stroke-linecap="round" mask="url(#path-6-inside-4)"></path>                                </svg>                            
                                <div class="d-flex align-items-center justify-content-center mt-3">
                                <h4>{{$file->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>    
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <label for="">Enter Url to view</label>
                <input type="text" class="form-control viewInput">
                <button class="btn btn-primary mt-2 view"  data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">View</button>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="row">
            @foreach ($adminFiles as $file)
                <div class="col-12 col-md-4">
                <a href="/draw-pdf/{{$file->id}}">
                    <div class="card">
                        <div class="card-body">
                                                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <mask maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24" fill="black">                                    <rect fill="white" x="3" width="18" height="24"></rect>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"></path>                                    </mask>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z" stroke="#130F26" stroke-width="2" mask="url(#path-1-outside-1)"></path>                                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24">                                    <mask mask-type="luminance" maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24" fill="black">                                    <rect fill="white" x="3" width="18" height="24"></rect>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"></path>                                    </mask>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z" fill="#130F26"></path>                                    <path d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z" stroke="#130F26" stroke-width="2" mask="url(#path-2-outside-2)"></path>                                    </mask>                                    <path d="M14 6V0L21 8H16C14.8954 8 14 7.10457 14 6Z" stroke="#130F26"></path>                                    <mask fill="white">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.5945L8.99429 12.1334C9.12172 11.9761 9.34898 11.9549 9.50189 12.0859C9.6548 12.217 9.67546 12.4507 9.54804 12.6079L7.93828 14.5945L9.54804 16.581C9.67546 16.7383 9.6548 16.972 9.50189 17.103C9.34898 17.2341 9.12172 17.2128 8.99429 17.0556L7 14.5945Z"></path>                                    </mask>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14.5945L8.99429 12.1334C9.12172 11.9761 9.34898 11.9549 9.50189 12.0859C9.6548 12.217 9.67546 12.4507 9.54804 12.6079L7.93828 14.5945L9.54804 16.581C9.67546 16.7383 9.6548 16.972 9.50189 17.103C9.34898 17.2341 9.12172 17.2128 8.99429 17.0556L7 14.5945Z" stroke="#130F26" stroke-width="2" stroke-linecap="round" mask="url(#path-4-inside-3)"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.771 11.1638C13.9576 11.2542 14.0356 11.4769 13.9451 11.6611L10.9973 17.6664C10.9069 17.8506 10.6823 17.9267 10.4957 17.8363C10.3091 17.7458 10.2311 17.5232 10.3215 17.3389L13.2693 11.3336C13.3598 11.1494 13.5844 11.0733 13.771 11.1638Z" fill="#130F26"></path>                                    <mask fill="white">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17 14.5945L15.0057 17.0556C14.8783 17.2128 14.651 17.2341 14.4981 17.1031C14.3452 16.972 14.3245 16.7383 14.452 16.581L16.0617 14.5945L14.452 12.6079C14.3245 12.4507 14.3452 12.217 14.4981 12.0859C14.651 11.9549 14.8783 11.9761 15.0057 12.1334L17 14.5945Z"></path>                                    </mask>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17 14.5945L15.0057 17.0556C14.8783 17.2128 14.651 17.2341 14.4981 17.1031C14.3452 16.972 14.3245 16.7383 14.452 16.581L16.0617 14.5945L14.452 12.6079C14.3245 12.4507 14.3452 12.217 14.4981 12.0859C14.651 11.9549 14.8783 11.9761 15.0057 12.1334L17 14.5945Z" stroke="#130F26" stroke-width="2" stroke-linecap="round" mask="url(#path-6-inside-4)"></path>                                </svg>                            
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                    <h4>{{$file->name}}</h4>
                            </div>
                        </div>
                    </div>
                </a>
                </div>    
            @endforeach
        </div>
    </div>
    <div class="modal" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <iframe src="" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
       $('.sidebar').addClass('sidebar-mini')
    })
    $('.view').click(function(){
        url = $('.viewInput').val();
        $('#iframe').attr('src',url);
    })
</script>
@endsection