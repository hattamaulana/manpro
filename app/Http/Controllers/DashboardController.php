<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Contracts\Service\Attribute\Required;

class DashboardController extends Controller
{
    public function index() {
        $label = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $dataset = [[
                'label' => 'Google',
                'data' => [290, 358, 220, 402, 690, 510, 688],
                'borderWidth' => 2,
                'backgroundColor' => 'transparent',
                'borderColor' => 'rgba(254,86,83,.7)',
                'borderWidth' => 2.5,
                'pointBackgroundColor' => 'transparent',
                'pointBorderColor' => 'transparent',
                'pointRadius' => 4
            ],
            [
                'label' => 'Facebook',
                'data' => [450, 258, 390, 162, 440, 570, 438],
                'borderWidth' => 2,
                'backgroundColor' => 'transparent',
                'borderColor' => 'rgba(63,82,227,.8)',
                'borderWidth' => 0,
                'pointBackgroundColor' => 'transparent',
                'pointBorderColor' => 'transparent',
                'pointRadius' => 4
            ],
        ];

        $label = collect($label)->toJson();
        $dataset = collect($dataset)->toJson();

        return view('dashboard', compact('label', 'dataset'));
    }

    public function logout()
    {
        session()->flush();

        Alert::success('Logout berhasil');

        return redirect('/login');
    }

    public function gantipasswd(Request $request)
    {
        if ($request->password === $request->password_confirmation) {
            $passuser = User::where('id', $request->id)
                ->update(['password' => Hash::make($request->password)]);

            if ($passuser) {
                // dd('success');
                session()->flash('message', 'success to change password ');
                return view('auth.edit-password');
            } {
                dd('failed');
            }
        }
        session()->flash('message', 'password does not match');
        return view('auth.edit-password');
    }

    public function gantipassword()
    {
        return view('auth.edit-password');
    }
}
