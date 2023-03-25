@extends('layouts.app')


@section('content')

<div class="container">
     <div style="position:absolute;top:100px;left:670px;border:#5C6898 solid;height:500px;width:500px;">
<span style="position:relative;bottom:19px;left:50px;color:#fff;background-color:#323232;font-size:26px;padding: 3px">Join us</span>
</div>
  <img src="images/logo1.png" style="position:absolute;width:400px;height:550px;" >
    </div>
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div style="background-color:#323232;position:relative;top:100px;left:370px;">


                <div class="card-body">
            
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                          <div class="row mb-4">
                        

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder=" name" style="position:relative;right:180px;width:325px">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                        

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" email" style="position:relative;right:180px;width:325px">>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

            
                         

                              <div class="row ">
                         

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder=" password" style="position:relative;right:180px;width:325px">>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                         

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder=" password confirm" style="position:relative;right:180px;width:325px">>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn text-light " style="position:relative;top:30px;right:260px;width:325px;background-color:#9098B9">
                                    {{ __('Register') }}
                                </button>
                     
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

