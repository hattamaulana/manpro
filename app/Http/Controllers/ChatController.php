<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {

    public function index() {
        $data = Chat::where('psikolog_id', 'is', null)->orWhere('psikolog_id', Auth::user()->psikolog->id)->get();
        return view('super-admin.chatting', compact('data'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show(Chat $chat) {
        return view('super-admin.chatting');
    }

    public function edit($id) {
        $data = Chat::find($id);
        $data->psikolog_id =Auth::user()->psikolog->id;
        $data->save();
    }

    public function update(Request $request, $id) {

    }

    public function destroy(Chat $chat) {
        //
    }
}
