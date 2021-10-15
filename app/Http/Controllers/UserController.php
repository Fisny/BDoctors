<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\User;
use App\Specialization;
use App\Message;
use App\Sponsorship;
use App\Review;
use Illuminate\Support\Facades\Storage;

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
        $avgVote = Review::where('user_id', $user->id)->avg('vote');
        if ($avgVote == null) {
            $avgVote = 0;
        }

        // $updateDiff= Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)->locale('it_IT')->diffForHumans(Carbon::now());
        // dd($updateDiff);
        return view('users.show', compact('user'), compact('avgVote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $sponsorships = Sponsorship::all();
        $specializations = Specialization::all();

        if (Auth::user()->id === $user->id) {
            return view('users.edit', compact('user', 'specializations', 'sponsorships'));
        } else {
            return redirect()->route("home");
        }
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
        return redirect()->route('home');
    }


    private function customValidate($request)
    {
        $request->validate([
            "name" => "required|string|max:50",
            "lastname" => "required|string|max:50",
            "email" => "required|email",
            "password" => "required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/",
            "address" => "required|string|min:5",
            "qualification" => "required|string",
            "profile_pic" => "nullable|image",
            "cv" => "nullable|url",
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

        $picturePath = Storage::put('images', $data['profile_pic']);
        $user->profile_pic = $picturePath;

        if ($user->cv != null) {
            $user->cv = $data['cv'];
        }

        $user->save();
    }
}
