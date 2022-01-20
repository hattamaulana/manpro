@extends('super-admin.master', [
'title' => 'Detail Data Usulan'
])

@section('body')
    @if (session('data'))
        @include('layouts.alert')
    @endif

    <x-table>
        <x-slot name="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">First Chat</th>
                <th scope="col">Date</th>
                <th scope="col" style="width: 20%">Action</th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            <tbody>
                @foreach ($data ?? [] as $i => $item)
                    <tr>
                        <td scope="row">{{ $i+1 }}</td>
                        <td scope="row">{{ $item->username }}</td>
                        <td scope="row">{{ $item->alamat }}</td>

                        <td scope="row">
                            <button onclick="showRemoveModal(parseInt({!! $item->id !!}))" class="btn btn-danger btn-icon">
                                <i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
@endsection
