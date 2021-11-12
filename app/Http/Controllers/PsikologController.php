<?php

namespace App\Http\Controllers;

use App\Psikolog;
use App\User;
use Illuminate\Http\Request;

class PsikologController extends Controller {
    private function getInputs($values = null) {
        $inputs = [
            [
                'type' => 'text',
                'label' => 'Username',
                'name' => 'username',
                'value' => (isset($values->user->username) ? $values->user->username : ''),
            ],
            [
                'type' => 'text',
                'label' => 'Nama',
                'name' => 'nama',
                'value' => (isset($values->nama) ? $values->nama : ''),
            ],
            [
                'type' => 'text',
                'label' => 'Email',
                'name' => 'email',
                'value' => (isset($values->email) ? $values->email : ''),
            ],
            [
                'type' => 'text',
                'label' => 'Alamat',
                'name' => 'alamat',
                'value' => (isset($values->alamat) ? $values->alamat : ''),
            ],
        ];

        return $inputs;
    }

    public function index() {
        $data = Psikolog::all();
        return view('psikolog.index', compact('data'));
    }

    public function create() {
        $url = route('psikologs.store');
        $title = 'Tambah';
        $inputs = $this->getInputs();

        return view('psikolog.form', compact('inputs', 'url', 'title'));
    }

    public function store(Request $request) {
        return $this->action('Menambah', $this->getInputs($request), function() use ($request) {
            $user = User::create([
                'username' => $request->username,
                'password' => '$2b$10$BXLVQH7sPvyh8UzaRuTL/OqMEVzeBylM110FL1yi8R02w.eXUzX1.',
                'role_id' => 2
            ]);

            $data = $request->except('_token', 'username');
            $data['user_id'] = $user->id;

            Psikolog::create($data);
            return ['redirect' => redirect()->route('psikologs.index')];
        });
    }

    public function show($id) {
    }

    public function edit($id) {
        $url = route('psikologs.update', ['psikolog' => $id]);
        $title = 'Edit';
        $inputs = $this->getInputs(Psikolog::find($id));

        return view('psikolog.form', compact('inputs', 'url', 'title'));
    }

    public function update(Request $request, $id) {
        return $this->action('Menambah', $this->getInputs($request), function() use ($request, $id) {
            $data = Psikolog::find($id);
            $data->update($request->except('_method', '_token', 'username'));
            User::find($data->user_id)->update(['username' => $request->username]);
            return ['redirect' => redirect()->route('psikologs.index')];
        });
    }

    public function destroy($id) {
        return $this->action('Menghapus', [], function() use ($id) {
            $data = Psikolog::find($id);
            $data->delete();
        });
    }
}
