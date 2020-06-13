<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        return User::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        $user->fill($validatedData);
        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!$user->verify) 
        {
            $user->active = 0;
            $user->delete();
        }
        else 
        {
            $user->active = 0;
            $user->save();
        }
        return $user;
    }
    
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
            $googleUser = Socialite::driver('google')->stateless()->user();
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
                }

                // Verifica se usuário está ativo
                if ($user->active)
                {
                    Auth::loginUsingId($user->id);

                    session()->put('user', $user);
                    session()->save();
                    
                    return redirect('/');
                }
                else
                {
                    return redirect('login')->with('error', 'Usuário bloqueado!');
                }
            }
            else
            {
                return redirect('login')->with('error', 'Usuário não cadastrado!');
            }
        }
        catch (Exception $e) {
            return redirect('login');
        }
    }
}
