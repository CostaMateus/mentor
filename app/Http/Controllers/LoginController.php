<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Autenticação Google
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Valida login, segundo retorno da autenticação google
     *
     * @return void
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user       = User::where('email', $googleUser->email)->first();

            // Valida se usuário existe
            if ($user) {

                // Verifica primeiro acesso
                if (is_null($user->google_id))
                {
                    $user->google_id         = $googleUser->id;
                    $user->name              = $googleUser->name;
                    $user->picture           = ($googleUser->avatar) ?: null;
                    $user->email_verified_at = ($googleUser->user['email_verified']) ? now() : false;
                    $user->verify            = 1;
                    $user->save();

                    Auth::loginUsingId($user->id);

                    session()->put('user', $user);
                    session()->save();

                    Log::info('User first loggin: ' . $user->id . ' - ' . $user->name);

                    return redirect('/novo');
                }

                // Verifica se usuário está ativo
                if ($user->active)
                {
                    Auth::loginUsingId($user->id);

                    session()->put('user', $user);
                    session()->save();

                    Log::info('User loggin: ' . $user->id . ' - ' . $user->name);

                    $player = Player::where('user_id', $user->id)->first();

                    if (is_null($player))
                    {
                        return redirect('/novo');
                    }

                    return redirect('/');
                }
                else
                {
                    Log::info('User blocked trying to loggin: ' . $user->id . ' - ' . $user->name);

                    return redirect('login')->with('error', 'Usuário bloqueado!');
                }
            }
            else
            {
                Log::info('User not registred trying to loggin: ' . $googleUser->name . ' - ' . $googleUser->email);

                return redirect('login')->with('error', 'Usuário não cadastrado!');
            }
        }
        catch (Exception $e) {
            Log::warning('Something is wrong: ' . $e);

            return redirect('login');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
