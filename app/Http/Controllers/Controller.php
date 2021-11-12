<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function toOptions ($params, $value, $text) {
        $options = [];
        foreach ($params as $key => $val) {
            array_push($options, [
                'text'  => $val[$text],
                'value' => $val[$value]
            ]);
        }

        return $options;
    }

    protected function action($action, $inputs, $callback, $errorMessage = null) {
        DB::beginTransaction();
        try {
            $return = $callback();
            DB::commit();

            $result = [
                'alert' => 'alert-success',
                'data'  => isset($return['message']) ? $return['message'] : "Berhasil $action data",
            ];

            return (isset($return['redirect']) ? $return['redirect'] : redirect()->back())->with($result);
        } catch (Exception $e) {
            DB::rollBack();
            $result = [
                'alert' => 'alert-danger',
                'data'  =>  $errorMessage !== null ? $errorMessage : "Gagal $action data karena ". $e->getMessage(),
            ];

            return redirect()->back()->with(['inputs' => $inputs])->with($result);
        }
    }

    private function getInputs($values = null)
    {

    }
}
