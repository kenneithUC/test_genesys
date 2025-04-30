@extends('layouts.app')
@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header text-center">Log In</div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
              @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
              @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
              <button type="submit" class="btn btn-primary">Log In</button>
            </div>
            @if (Route::has('password.request'))
            <div class="mt-3 text-center">
              <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection