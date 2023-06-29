@extends('layouts.app')

@section('content')
<section class="login-content">
    <div class="row m-0 align-items-center bg-white vh-100">            
          <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
          <img src="../../assets/images/auth/05.png" class="img-fluid gradient-main animated-scaleX" alt="images">
       </div>
       <div class="col-md-6">               
          <div class="row justify-content-center">
             <div class="col-md-10">
                <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                   <div class="card-body">
                      <a href="../../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                         <!--Logo start-->
                         <!--logo End-->
                         
                         <!--Logo start-->
                         <div class="logo-main">
                             <div class="logo-normal">
                                 <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                     <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                     <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                     <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                 </svg>
                             </div>
                             <div class="logo-mini">
                                 <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                     <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                     <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                     <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                 </svg>
                             </div>
                         </div>
                         <!--logo End-->
                         
                         
                         
                         
                         <h4 class="logo-title ms-3">Hope UI</h4>
                      </a>
                      <h2 class="mb-2 text-center">Sign Up</h2>
                      <p class="text-center">Create your Hope UI account.</p>
                      <form method="POST" action="{{ route('register') }}">
                        @csrf

                         <div class="row">
                            <div class="col-lg-6">
                               <div class="form-group">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label for="email" class="form-label">Email</label>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label for="phone" class="form-label">Phone No.</label>
                                  <input type="text" class="form-control" id="phone" placeholder=" ">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label for="password" class="form-label">Password</label>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label for="confirm-password" class="form-label">Confirm Password</label>
                                  <input id="confirm-password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                               </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="" class="form-label">Stage</label>
                                 <select name="stages" class="form-control" id="stages">
                                    @if ($data['stages'])
                                        @foreach ($data['stages'] as $stage)
                                            <option value="{{$stage->id}}">{{$stage->name}}</option>
                                        @endforeach
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="confirm-password" class="form-label">Subject</label>
                                 <select name="subjects[]" multiple class="form-control" id="subjects">
                                 </select>
                              </div>
                           </div>

                           <div class="pt-5 pb-5">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" name="all" id="all">
                                  <label class="form-check-label" for="all">
                                      Choose All stages and subjects
                                  </label>
                              </div>
                          </div>


                            {{-- <div class="col-lg-12 d-flex justify-content-center">
                               <div class="form-check mb-3">
                                  <input type="checkbox" class="form-check-input" id="customCheck1">
                                  <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                               </div>
                            </div> --}}
                         </div>
                         <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                         </div>
                         {{-- <p class="text-center my-3">or sign in with other accounts?</p>
                         <div class="d-flex justify-content-center">
                            <ul class="list-group list-group-horizontal list-group-flush">
                               <li class="list-group-item border-0 pb-0">
                                  <a href="#"><img src="../../assets/images/brands/fb.svg" alt="fb"></a>
                               </li>
                               <li class="list-group-item border-0 pb-0">
                                  <a href="#"><img src="../../assets/images/brands/gm.svg" alt="gm"></a>
                               </li>
                               <li class="list-group-item border-0 pb-0">
                                  <a href="#"><img src="../../assets/images/brands/im.svg" alt="im"></a>
                               </li>
                               <li class="list-group-item border-0 pb-0">
                                  <a href="#"><img src="../../assets/images/brands/li.svg" alt="li"></a>
                               </li>
                            </ul>
                         </div> --}}
                         <p class="mt-3 text-center">
                            Already have an Account <a href="/login" class="text-underline">Sign In</a>
                         </p>
                      </form>
                   </div>
                </div>    
             </div>
          </div>           
          <div class="sign-bg sign-bg-right">
             <svg width="280" height="230" viewBox="0 0 421 359" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.05">
                   <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8"/>
                   <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 149.47 319.328)" fill="#3A57E8"/>
                   <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 203.936 99.543)" fill="#3A57E8"/>
                   <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857" transform="rotate(45 204.316 -229.172)" fill="#3A57E8"/>
                </g>
             </svg>
          </div>
       </div>   
    </div>
 </section>
<script>
   $(document).on('change','#stages',function(){
      var csrf = $('meta[name="csrf"]').attr('content');
      $.ajax({
         url:"/stages/"+$(this).val()+"/subjects",
         headers:{
            'X-CSRF-TOKEN': csrf
         },
         type:"GET",
         success:function(data){
            console.log(data);
            var options = '';
            data.map((subject)=>{
               options += '<option value="'+subject.id+'">'+subject.name+'</option>';
            })
            $('#subjects').html(options);
         },
         error:function(e){

         }
      })
   })
   $(document).on('change','#all',function(){
      if($(this).is(':checked')){
         $('#stages').attr('disabled','disabled')
         $('#subjects').attr('disabled','disabled')
      }
      else{
         $('#stages').removeAttr('disabled')
         $('#subjects').removeAttr('disabled')
      }
   })
</script>
@endsection
