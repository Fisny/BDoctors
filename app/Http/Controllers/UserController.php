<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Specialization;
use App\Message;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function _construct()  (to do)/////
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $users = User::all();
        $specializations = Specialization::all();
        return view('users.index', compact('users', 'specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view('users.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //to do mail

        //questa funzione permette la validazione dei campi passati attraverso $request
        $this->customValidate($request);

        $data = $request->all();

        $user = new User();

        //questa funzione permette il passaggio della chiave valore e il salvataggio
        $this->fillAndSave($user, $data);

        $user->specialization()->sync($data['specializations']);

        return redirect()->route('user.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $specializations = Specialization::all();
        return view('users.edit', compact('user', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->customValidate($request);

        $data = $request->all();

        $this->fillAndSave($user, $data);

        $user->specialization()->sync($data['specializations']);

        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }


    private function customValidate($request)
    {
        $request->validate([
            "name" => "required|string|max:50",
            "lastname" => "required|string|max:50",
            "email" => "required|email",
            "password" => "required|confirmed|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'])",
            "address" => "required|string|min:5",
            "qualification" => "required|string",
            "profile_pic" => "image",
            "cv" => "url",
            "specializations" => "required"
        ]);
    }

    private function fillAndSave($user, $data)
    {
        $user->name = $data['name'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->address = $data['address'];
        $user->qualification = $data['qualification'];
        $user->profile_pic = $data['profile_pic'];
        $user->cv = $data['cv'];
        $user->save();
    }
}
