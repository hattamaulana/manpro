@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Pengaturan Password</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Password</h4>
                    </div>
                    <div class="card-body">
                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session()->get('message') }}
                            </div>
                        </div>
                     @endif
                        <form method="POST" action="{{ route('gantipasswd') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input id="password" type="password"
                                    class="form-control @error('password'){{ 'is-invalid' }}@enderror" name="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation'){{ 'is-invalid' }}@enderror"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
