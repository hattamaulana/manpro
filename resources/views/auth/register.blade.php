@extends('layouts.basic')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('public/assets/img/logo-dinsos.png') }}" alt="" style="width:200px;">
            </div>
            <div class="card card-primary">
                <div class="card-header justify-content-between">
                    <h4>Register</h4>
                    <a class="badge badge-primary" href="{{ route('login')}}">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input id="nik" type="text" class="form-control @error('nik'){{'is-invalid'}}@enderror" name="nik" value="{{old('nik') ?? ''}}">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password'){{ 'is-invalid' }}@enderror"
                                    name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text" id="toggle-password" style="cursor: pointer">
                                        <i id="icon-password" class="fas fa-eye"></i>
                                    </div>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                Daftar Sebagai Petugas Survey
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                Daftar Sebagai Pegawai Kelurahan
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Register
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
