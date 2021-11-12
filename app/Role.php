<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function mappingMenu () {
        return $this->hasMany(MappingMenu::class);
    }
}
