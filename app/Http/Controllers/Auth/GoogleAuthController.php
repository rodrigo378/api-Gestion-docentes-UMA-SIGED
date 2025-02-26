<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Buscar o crear usuario
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make(uniqid()),
            ]
        );

        // Iniciar sesión en `auth:web`
        Auth::login($user);

        // Generar token de Sanctum
        $token = $user->createToken('AuthToken')->plainTextToken;

        return redirect()->to('http://localhost:4200/login?token=' . $token);

        // return response()->json([
        //     'user' => $user,
        //     'token' => $token
        // ]);
    }
    // public function handleGoogleCallback()
    // {
    //     Log::info("Se ejecutó handleGoogleCallback");

    //     try {
    //         $googleUser = Socialite::driver('google')->stateless()->user();

    //         $user = User::where('google_id', $googleUser->getId())
    //             ->orWhere('gmail', $googleUser->getEmail())
    //             ->first();

    //         if (!$user) {
    //             $user = new User();
    //             $user->name = $googleUser->user['given_name'] ?? 'No Name';
    //             $user->lastname = $googleUser->user['family_name'] ?? 'No Lastname';
    //             $user->password = Hash::make('MirellaC');
    //             $user->status = 'R';
    //             $user->email = $googleUser->getEmail();
    //             $user->google_id = $googleUser->getId();
    //             $user->save();
    //         }

    //         if ($user->status == 'I') {
    //             return redirect()->to('http://localhost:4200/login?error=Acceso%20denegado.');
    //         }

    //         // Autenticamos al usuario en Laravel
    //         Auth::login($user);

    //         // Generamos un token de acceso (requiere que tengas Passport configurado)
    //         $tokenResult = $user->createToken('AuthToken');
    //         $token = $tokenResult->accessToken;

    //         $minutos = 60;
    //         $cookie = cookie(
    //             "authToken",
    //             $token,
    //             $minutos,
    //             "/",
    //             null,
    //             app()->environment("production"), // Secure: true en produccion (usa https)
    //             true,
    //             false,
    //             "Strict"
    //         );

    //         // Redirigimos a la aplicación Angular pasando el token como query parameter
    //         return redirect()->to('http://localhost:4200/registrodocentes')->withCookie($cookie);
    //     } catch (\Exception $e) {
    //         Log::error("Error en la autenticación de Google: " . $e->getMessage());
    //         return redirect('http://localhost:4200/login?error=Hubo%20un%20problema%20con%20la%20autenticación.');
    //     }
    // }
}
