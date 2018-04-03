@extends('layouts.app')

@section('content')
<div class="container">

    <!-- TOP BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-top.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER -->

    <!-- TOP BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-top-small.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER FOR XS -->

    <div class="row justify-content-center bg-info no-gutters py-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-bottom.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END BOTTOM BANNER -->

    <!-- BOTTOM BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-bottom-small.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END BOTTOM BANNER FOR XS -->

</div>
@endsection
