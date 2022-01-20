<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Konsultasi;
use App\Psikolog;
use Illuminate\Http\Request;

class GuestController extends Controller {

    public function index() {
        $psikolog = Psikolog::all();
        return view('landing-page', compact('psikolog'));
    }

    public function chatting() {
        return view('guest.chat');
    }

    public function storeChat(Request $request) {
        $chat = Chat::create([
            'token' => $request->input('_token'),
            'username' => $request->input('username')
        ]);

        return response()->json([
            $chat->id
        ]);
    }

    public function registerConsult() {
        return view('guest.regis');
    }

    public function storeConsultation(Request $request) {
        return $this->action('Menyiimpan', $request->except('_token'), function() use ($request) {
            Konsultasi::create($request->except('_token'));
        });
    }
}
