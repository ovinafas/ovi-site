<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return Response::json($users);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function register(Request $request) {
        $email = $request->get('email');

        $password = $request->get('password');

        if ($this->checkIfUserExist($email)) {
            return response()->json([
                'message' => 'User already exist'
            ], 500);
        } else {
            $password = bcrypt($password);
            $name = explode("@", $email);

            User::create([
                'email' => $email,
                'password' => $password,
                'name' => $name[0]
            ]);
            return response()->json(true);
        }
    }
    private function checkIfUserExist($email) {
        $user = User::where('email', $email)->first();
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');

        $user = $this->checkIfUserExist($email);

        if ($user) {
            $confirmPassword = Hash::check($password, $user->password);
            return response()->json([
                'status' => $confirmPassword,
                'token' => $user->authToken
            ]);
        } else {
            return response()->json([
                'message' => "Invalid credentials"
            ], 500);
        }
    }

    public function updateToken(Request $request) {
        $email = $request->get('uid');
        $token = $request->get('token');

        User::where('email', $email)->update([
            'authToken' => $token
        ]);
    }
}
