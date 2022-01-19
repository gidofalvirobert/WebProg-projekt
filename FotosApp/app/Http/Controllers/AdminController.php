<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminResource;
use App\Models\user;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = user::paginate(10);
        return AdminResource::collection($client);
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

        $validatedUser=$request->validate([
            'client_secret' => ['required', 'alpha_num', 'exists:oauth_clients,secret'],//a kulcs amivel hasznalja az API-t
            'client_id' => ['required', 'numeric', 'exists:oauth_clients,id'],//az adott kliens (frontend) hasznalhassa az API-t
        ]);

        if($request->client_secret  =="jGON8VXcTniKyzNDJceZ02nVhxWG1ioZfB5AaKJF"){

        $client = new user();
        $client->username = $request -> username;
        $client->password = bcrypt($request ->password);
        $client->country = $request-> country ;
        $client->locality = $request -> locality ;
        $client->adress = $request -> adress ;
        $client->tel = $request -> tel ;
        $generatedToken = $client->createToken('accessToken');

        if($client->save())
        {
            return response()->json([
                'access_token' => $generatedToken->accessToken,
                'expires_at' => $generatedToken->token->expires_at
            ]);
        }
        }else{
            return "not admin";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = user::findOrFail($id);
        return new AdminResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedUser=$request->validate([
            'client_secret' => ['required', 'alpha_num', 'exists:oauth_clients,secret'],//a kulcs amivel hasznalja az API-t
            'client_id' => ['required', 'numeric', 'exists:oauth_clients,id'],//az adott kliens (frontend) hasznalhassa az API-t
        ]);


        if($request->client_secret  =="jGON8VXcTniKyzNDJceZ02nVhxWG1ioZfB5AaKJF"){
        $client = user::findOrFail($id);
        $client->username = $request -> username;
        $client->country = $request -> country ;
        $client->locality = $request -> locality ;
        $client->adress = $request -> adress ;
        $client->tel = $request -> tel ;
        if($client->save())
        {
            return new AdminResource($client);
        }
        }else{
            return "not admin";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $client = user::findOrFail($id);
        if($client->delete())
        {
            return new AdminResource($client);
        }
    }
}
