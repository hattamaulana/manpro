<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model {
    use Columns;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
