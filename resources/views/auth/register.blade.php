@extends('layouts.auth')

@section('content')


    <h3>Create an account</h3>
    <p>The ecommerce platform made for you</p>

    <form method="POST" class="register-form" action="{{ route('register') }}">
        @csrf
        <div class="form-group row w-100">
            <label for="email">{{ __('Email') }}</label>
            <div class="col-md-6 w-100">
                <input id="email" type="text" class="form-control w-100 @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col">
                <label for="firstName">{{ __('First name') }}</label>
                <input type="text" class="form-control" placeholder="First name" name="firstName"
                    value="{{ old('firstName') }}">
            </div>
            <div class="col">
                <label for="lastName">{{ __('Last name') }}</label>
                <input type="text" class="form-control" placeholder="Last name" name="lastName"
                    value="{{ old('lastName') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="password">{{ __('Password') }}</label>

            <div class="col-md-6 w-100">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm">{{ __('Confirm new password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>  
        @if ($roles == 'user')
            <input type="hidden" name="roles" value="user">
        @elseif ($roles == 'admin')
            <input type="hidden" name="roles" value="admin">

        @else
        @endif

        <p class="pt-2">By proceeding, you agree to the <a href="#">Terms and Conditions</a></p>

        <div class="form-group row mb-0">
            <div class="">
                <button type="submit" class="btn btn-success px-4 py-3 my-3">
                    {{ __('Create Account') }}
                </button>
            </div>
        </div>

        <p>Already have an account?&nbsp;&nbsp
            @if ($roles == 'user')
                <a href="{{ url('lookup/user') }}">Log in</a>

            @elseif ($roles == 'admin')
                <a href="{{ url('lookup/admin') }}">Log in</a>

            @else
            @endif
        </p>
    </form>
@endsection
