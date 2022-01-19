@extends('super-admin.master', [
    'title' => "$title Psikolog"
])

@section('body')
    @if (session('data'))
        @include('layouts.alert')
    @endif

    <x-form :column="12">
        <div>
            <x-slot name="body">
                <form method="POST" action="{{$url}}">
                    @csrf

                    @if ($url != route('psikologs.store'))
                        @method('PATCH')
                    @endif

                    @include('components.includes.forms', [
                        'inputs' => session('inputs') ?? $inputs
                    ])

                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Simpan
                    </button>
                </form>
            </x-slot>

            <x-slot name="footer">
            </x-slot>
        </div>
    </x-form>
@endsection
