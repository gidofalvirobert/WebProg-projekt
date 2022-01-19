<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public  function login(Request $request)
    {

        //adatok validalasa az alapjan h nem ures erteket kuldunk
        $validatedUser=$request->validate([
            'username'=>'required',
            'password'=>'required',
            'client_secret' => ['required', 'alpha_num', 'exists:oauth_clients,secret'],//a kulcs amivel hasznalja az API-t
            'client_id' => ['required', 'numeric', 'exists:oauth_clients,id'],//az adott kliens (frontend) hasznalhassa az API-t
        ]);

        // letrehozok egy objektumot amennyiben sikerult a validacio
        $user = collect($validatedUser);

        // kiveszem az ertekeket a tombbol es marad az email es a password
        $user->forget('client_id');
        $user->forget('client_secret');


        if(!auth()->attempt($user->toArray())) //megprobalja bejelentkeztetni es ha nem sikerul
        {
            return "nem sikerult";
        }
        $user = auth()->user();
        $isAdmin = $user->proles_id;
        $generatedToken = $user->createToken('accessToken');

        return response()->json([
            'access_token' => $generatedToken->accessToken,
            'expires_at' => $generatedToken->token->expires_at,
            'admin' => $isAdmin,
        ]); //json valasz tokennel es lejarattal

    }
}
