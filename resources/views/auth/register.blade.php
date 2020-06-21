@extends('layouts.auth')
@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Nama Lengkap</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} py-4" id="inputEmailAddress" value="{{ old('name') }}" type="text" placeholder="Enter email address" name="name" required autofocus/>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} py-4" id="inputEmailAddress" value="{{ old('email') }}" type="email" placeholder="Enter email address" name="email" required/>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} py-4" id="password" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password" required />
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1" for="password-confirm">Konfirmasi Password</label>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} py-4" id="password-confirm" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password_confirmation" required />
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary">Register</button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('login') }}">Sudah punya akun ? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
