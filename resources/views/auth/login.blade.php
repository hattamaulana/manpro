@extends('layouts.basic')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    {{-- <img src="{{ asset('public/assets/img/logo-dinsos.png') }}" alt="" style="width:200px;"> --}}
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session()->get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @if (isset($dev))
                            <input type="hidden" name="_device" value="{{ $dev }}">
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('username'){{ 'is-invalid' }}@enderror" name="username"
                                    value="{{ old('username') ?? '' }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                {{-- <div class="float-right">
                                    <a href="{{ route('forgot-password') }}" class="text-small">
                                        Lupa Password?
                                    </a>
                                </div> --}}
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password'){{ 'is-invalid' }}@enderror"
                                        name="password">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="toggle-password" style="cursor: pointer">
                                            <i id="icon-password" class="fas fa-eye"></i>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                Belum punya akun? <a href="{{ route('register') }}">Register</a>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Dinas Sosial Kota Kediri &copy; 2021
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#toggle-password').click(function() {
                console.log('okeee')
                const $password = $('#password')
                if ($password.attr('type') === 'password') {
                    $password.attr('type', 'text')
                    $('#icon-password').removeClass('fa-eye')
                    $('#icon-password').addClass('fa-eye-slash')
                } else {
                    $password.attr('type', 'password')
                    $('#icon-password').removeClass('fa-eye-slash')
                    $('#icon-password').addClass('fa-eye')
                }
            })
        })
    </script>
@endsection
