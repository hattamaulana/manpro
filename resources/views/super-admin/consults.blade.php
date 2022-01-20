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
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Whatsapp</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Paket</th>
                <th scope="col">Status</th>
                <th scope="col" style="width: 20%">Action</th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            <tbody>
                @foreach ($data ?? [] as $i => $item)
                    <tr>
                        <td scope="row">{{ $i+1 }}</td>
                        <td scope="row">{{ $item->nama }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row">+62{{ $item->no_wa }}</td>
                        <td scope="row">{{ $item->gender }}</td>
                        <td scope="row">
                            @if ($item->paket == 1)
                            Paket 1 (Voice Call)
                            @elseif($item->paket == 2)
                            Paket 2 (Video Call)
                            @else
                            Paket 3 (Bundling)
                            @endif
                        </td>

                        <td scope="row">
                            @if ($item->paket == 0)
                            Baru Mendaftar
                            @elseif($item->paket == 1)
                            Sedang Berlangsung
                            @else
                            Berakhir
                            @endif
                        </td>

                        <td scope="row">
                            @if ($item->status < 2)
                            <a href="{{ route('consult.edit', ['consult' => $item->id]) }}"
                                class="text-warning">
                                @if ($item->status == 0)
                                Verifikasi
                                @elseif($item->status == 1)
                                Akhiri
                                @endif
                            </a>
                            @else
                                Selesai
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
@endsection
