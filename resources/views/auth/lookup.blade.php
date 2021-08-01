@extends('layouts.auth')

@section('content')

    <h3><b>Log in</b></h3>
    <p>Continue to Shopify</p>

    <form method="POST" action=
    @if($roles == 'user')
    {{ url('lookup/user') }}
    @else
    {{ url('lookup/admin') }}
    @endif
    >
        @csrf
        @method('GET') 
        <div class=" form-floating mt-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="email">Email</label>

            @if ($roles == 'user')
                <input type="hidden" name="roles" value="user">
            @elseif ($roles == 'admin')
                <input type="hidden" name="roles" value="admin">
            @else
            @endif

            {{-- @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror --}}

            <button type="submit" class="btn btn-success px-4 py-3 my-3">
                <b class="text-white">{{ __('Next') }}</b>
            </button>

            <p>New to Shopify?&nbsp;&nbsp;
                @if ($roles == 'user')
                    <a href="{{ url('register/user') }}">Register</a>

                @elseif ($roles == 'admin')
                    <a href="{{ url('register/admin') }}">Register</a>

                @else
                @endif
            </p>
        </div>
    </form>
@endsection
