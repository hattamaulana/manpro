@extends('layouts.basic')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <a href="{{ url('/') }}" class="btn btn-default">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>

                        <h4>Form Pendaftaran Konsultasi</h4>
                    </div>

                    <div class="card-body">
                        @if (session()->has('data'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session()->get('data') }}
                            </div>
                        </div>
                    @endif
                    
                        <form method="POST" action="{{ route('store.consult') }}">
                            @csrf
                            @include('components.includes.forms', [
                                'inputs' => [
                                    [
                                        'type'  => 'text',
                                        'label' => 'Nama',
                                        'name'  => 'nama',
                                        'value' => (isset($values->nama) ? $values->nama : ''),
                                    ],
                                    [
                                        'type'  => 'text',
                                        'label' => 'Email',
                                        'name'  => 'email',
                                        'value' => (isset($values->email) ? $values->email : ''),
                                    ],
                                    [
                                        'type' => 'text',
                                        'label' => 'Nomor WA',
                                        'name' => 'no_wa',
                                        'input-group-prepend' => '+62',
                                        'value' => (isset($values->email) ? $values->email : ''),
                                    ],
                                    [
                                        'type' => 'radio',
                                        'label' => 'Jenis Kelamin',
                                        'name' => 'gender',
                                        'options' => [
                                            [
                                                'text'  => 'Perempuan',
                                                'value' => 'Perempuan',
                                            ],
                                            [
                                                'text'  => 'Laki-laki',
                                                'value' => 'Laki-laki',
                                            ]
                                        ],
                                        'value' => (isset($values->jenis_kelamin) ? $values->jenis_kelamin : ''),
                                    ],
                                    [
                                        'type' => 'select2',
                                        'label' => 'Paket Konsultasi',
                                        'name' => 'paket_id',
                                        'options' => [
                                            [
                                                'text'  => 'Paket 1 (Voice Call)',
                                                'value' => '1',
                                            ],
                                            [
                                                'text'  => 'Paket 2 (Video Call)',
                                                'value' => '2',
                                            ],
                                            [
                                                'text'  => 'Paket 3 (Bundling)',
                                                'value' => '3',
                                            ]
                                        ],
                                        'value' => (isset($values->jenis_kelamin) ? $values->jenis_kelamin : ''),
                                    ],
                                ]
                            ])

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="simple-footer">
                    Mahatta Maulana &copy; 2022
                </div>
            </div>
        </div>
    </div>
@endsection
