@extends('layouts.app')
@section('content')
<div class="section-header">
    <h1>Profil</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-5 col-lg-6">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                </div>
                <div class="profile-widget-description">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->username }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection