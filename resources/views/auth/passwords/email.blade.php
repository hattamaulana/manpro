@extends('layouts.basic')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <h1 class="h1">Starter Code</h1>
                </div>
                <div class="card card-primary">
                    <div class="card-header justify-content-between">
                        <h4>Lupa Password</h4>
                        <a class="badge badge-primary" href="{{ route('login')}}">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#">
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
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Cek Username
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Starter Code &copy; 2021
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
