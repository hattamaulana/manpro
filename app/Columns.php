<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait Columns
{
    public function getFillable()
    {
        return Schema::getColumnListing($this->getTable());
    }

    public static function input ($params = []) {
        $tableName = (explode('\\', __CLASS__) [1]);
        // dd(Str::snake(Str::pluralStudly($tableName)));

        $inputs = [];
        $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $tables = collect(array_values(Schema::getColumnListing(Str::snake(Str::pluralStudly($tableName)))))
            ->filter(function($val) use($hidden) {
                foreach($hidden as $i => $col) {
                    if ($val === $col) {
                        return false;
                    }
                }

                return true;
            })
            ->each(function($val) use (&$inputs, $params){
                $arr = [
                    'type' => 'text',
                    'label' => Str::upper(str_replace('_', ' ', Str::of($val)->replace('_id', ''))),
                    'name' => $val
                ];

                foreach($params as $i => $col) {
                    if ($val === $col['name']) {
                        if (isset($col['label'])) $arr['label'] = $col['label'];
                        if (isset($col['value'])) $arr['value'] = $col['value'];
                        if (isset($col['type'])) $arr['type'] = $col['type'];
                        if (isset($col['options'])) $arr['options'] = $col['options'];
                    }
                }

                array_push($inputs, $arr);
            });

        return $inputs;
    }

    public static function options ($text, $value, $where = null, $withText = null) {
        $builder = static::orderBy('created_at', 'asc');
        if ($where != null) {
            $where($builder);
        }

        $result = [];

        $builder->get()->each(function($item, $key) use ($value, $text, &$result, $withText) {
            array_push($result, [
                'value' => $item->$value,
                'text' => $item->$text. ($withText === null ? '' : ' - '. $item->$withText),
            ]);
        });

        return $result;
    }
}
