<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use Illuminate\Http\Request;

class ConsultController extends Controller {

    public function index() {
        $data = Konsultasi::all();
        return view('super-admin.consults', compact('data'));
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show(Konsultasi $konsultasi) {
    }

    public function edit($id) {
        return $this->action('Menupdate', [], function() use ($id) {
            $data = Konsultasi::find($id);
            if ($data->status == 0) {
                $data->status = 1;
            } else if ($data->status == 1) {
                $data->status = 2;
            }

            $data->save();
        });
    }

    public function update(Request $request, Konsultasi $konsultasi) {
    }

    public function destroy(Konsultasi $konsultasi) {
    }
}
