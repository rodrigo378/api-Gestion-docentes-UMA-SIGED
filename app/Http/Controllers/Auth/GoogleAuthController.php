<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        Log::info("Se ejecutó handleGoogleCallback");

        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('google_id', $googleUser->getId())
                ->orWhere('gmail', $googleUser->getEmail())
                ->first();

            if (!$user) {
                $user = new User();
                $user->name = $googleUser->user['given_name'] ?? 'No Name';
                $user->lastname = $googleUser->user['family_name'] ?? 'No Lastname';
                $user->password = Hash::make('MirellaC');
                $user->status = 'R';
                $user->gmail = $googleUser->getEmail();
                $user->google_id = $googleUser->getId();
                $user->save();
            }

            if ($user->status == 'I') {
                return redirect('/login')->withErrors(['message' => 'Acceso denegado.']);
            }

            Auth::login($user);

            if ($user->status == 'R') {
                return redirect()->route('registro');
            }

            return redirect()->intended('/home');
        } catch (\Exception $e) {
            Log::error("Error en la autenticación de Google: " . $e->getMessage());
            return redirect('/login')->withErrors(['message' => 'Hubo un problema con la autenticación de Google.']);
        }
    }
}
