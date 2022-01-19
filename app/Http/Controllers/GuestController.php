<?php

namespace App\Http\Controllers;

use App\Psikolog;

class GuestController extends Controller {

    public function index() {
        $psikolog = Psikolog::all();
        return view('landing-page', compact('psikolog'));
    }
}
