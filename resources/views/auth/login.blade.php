@extends('layouts.auth')

@section('content')
    <h3><b>Log in</b></h3>
    <p>Continue to Shopify</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="">{{ session('email') }}</p>
                </div>
                <div class="col-6">
                    @if (session('roles') == 'user')
                        <a href="{{ url('lookup/user') }}" class="float-end">Change email</a>
                    @else
                        <a href="{{ url('lookup/admin') }}" class="float-end">Change email</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-floating">
            <input type="hidden" name="email" value="{{ session('email') }}">
            <input id="password" type="password"
                class="position-relative form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="password">
            <label for="password">Password</label>

            <div>

                @error('email')
                    <strong class=" text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <input type="hidden" name="roles" value="{{ session('roles') }}">

            <button type="submit" class="btn btn-success px-4 py-3 my-3">
                <b class="text-white">{{ __('Log in') }}</b>
            </button>
        </div>
    </form>
@endsection
