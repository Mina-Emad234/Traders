@extends('layouts.login')
@section('content')

    <section class="flexbox-container">

    <div class="col-12 d-flex align-items-center justify-content-center">

        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1">
                            <img src="{{asset('assets/front/images/logo.png')}}" alt="LOGO"/>

                        </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                        <span>Register</span>
                    </h6>
                </div>
                @include('includes.alerts.errors')
                @include('includes.alerts.success')
                <div class="card-content">
                    <div class="card-body">

                        <form id="admin" style="display: block" class="form-horizontal form-simple" action="{{ route('user.register')}}" method="post"
                              novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="name" class="form-control form-control-lg input-lg"
                                       value="{{old('name')}}" id="email" placeholder="Enter your Name">
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="email" class="form-control form-control-lg input-lg"
                                       value="{{old('email')}}" id="email" placeholder="Enter Email">
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" name="domain" class="form-control form-control-lg input-lg"
                                       value="{{old('domain')}}" id="domain" placeholder="Enter Domain">
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                @error('domain')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" value="{{old('password')}}" name="password" class="form-control form-control-lg input-lg"
                                       id="user-password"
                                       placeholder="Your Password">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control form-control-lg input-lg"
                                       id="user-password"
                                       placeholder="Confirm Your Password">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                                @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                                sign Up
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('script')
    <script>

    </script>
    @stop
