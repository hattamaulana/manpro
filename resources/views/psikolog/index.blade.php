@extends('super-admin.master', [
'title' => 'Detail Data Usulan'
])

@section('body')
    @if (session('data'))
        @include('layouts.alert')
    @endif

    <x-table>
        <x-slot name="header">
            <a href="{{ route('psikologs.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Psikolog Baru
            </a>
        </x-slot>

        <x-slot name="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 20%">Action</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            <tbody>
                @foreach ($data ?? [] as $i => $item)
                    <tr>
                        <td scope="row">{{ $i+1 }}</td>
                        <td scope="row">
                            <a href="{{ route('psikologs.edit', ['psikolog' => $item->id]) }}"
                                class="btn btn-warning btn-icon"><i class="fas fa-edit"></i></a>
                            <button onclick="showRemoveModal(parseInt({!! $item->id !!}))" class="btn btn-danger btn-icon">
                                <i class="fas fa-trash"></i></button>
                        </td>
                        <td scope="row">{{ $item->user->username }}</td>
                        <td scope="row">{{ $item->nama }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row">{{ $item->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot>
    </x-table>
@endsection

<div class="modal fade" tabindex="-1" role="dialog" id="modal-destroy" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5> <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close"><span><i class="fas fa-times-circle"></i></span></button>
            </div>
            <div class="modal-body">
                Apa anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer flex justify-content-center">
                <form id="modal-form-destroy" data-url="{{ route('psikologs.destroy', ['psikolog' => -1]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-icon" data-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-primary btn-icon"><i class="fas fa-check"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        function showRemoveModal(id) {
            const $modal = $('#modal-destroy')
            $modal.modal('show')
            $modal.data('id', id)
        }

        $(document).ready(function() {
            $('#modal-destroy').on('shown.bs.modal', function() {
                const $form = $('#modal-form-destroy')
                const url = $form.data('url').split('-1')[0]
                $form.attr('action', url + $(this).data('id'))
            })
        })
    </script>
@endsection


@section('css')
    <style>
        .delete-image {
            display: none
        }
    </style>
@endsection
