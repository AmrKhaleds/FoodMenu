@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1">
                                            {{-- @if (file_exists(public_path('storage/images/logo/' . $dashboardSettings['white_logo'])))
                                                <img style="width: 300px; "
                                                    src="{{ asset('storage/images/logo/' . $dashboardSettings['white_logo']) }}"
                                                    alt="My Image">
                                            @else
                                                <img style="width: 300px;"
                                                    src="{{ asset('assets/admin/images/logo/defaultLogo.png') }}"
                                                    alt="My Image">
                                            @endif --}}
                                            {{-- <img style="width: 300px;" 
                      src="
                        {{ asset('storage/images/logo/' . $white_logo) ?? asset('asset/images/logo/defaultLogo.png')}}

                        " 
                        alt="branding logo"> --}}
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center h2 pt-2">
                                        <span>Admin Login</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal form-simple" method="POST"
                                            action="{{ route('login') }}">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                                <input id="email" type="email"
                                                    class="form-control form-control-lg input-lg @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="Enter Email Address" required autocomplete="email"
                                                    autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input id="password" type="password"
                                                    class="form-control form-control-lg input-lg @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Enter Your Password" required
                                                    autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-md-left">
                                                    <fieldset>
                                                        <input class="chk-remember" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                                    class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                                {{-- <div class="card-footer">
                  <div class="">
                    <p class="float-sm-left text-center m-0"><a href="{{ route('password.request') }}" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-center m-0">New to AddYou? <a href="{{ route('register') }}" class="card-link">Sign Up</a></p>
                  </div>
                </div> --}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection