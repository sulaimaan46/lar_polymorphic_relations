<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;



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

        return view('user_lists',compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlazyImage()
    {
        $user= User::all();
        dd($user[0]->image);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEagarImage()
    {
        $user= User::with('image')->get();
        dd($user[0]->image);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeImage($id)
    {
        $user = User::find($id);

        $image= new Image;
        $image->url = "sulaimaan_image.png";
        $user->image()->save($image);

        dd($user->image);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = Str::random(6);
        $data = [
            'name' => $name,
            'email' => $name.'@mailinator.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
        ];
        $user = User::create($data);

        $image= new Image;
        $image->url = "sulaimaan_image.png";
        $user->image()->save($image);
        dd($user);

    }

    /**
     * Store a newly created resource in Comments.
     */
    public function commentScopeRecords(){
        $comment = Comment::select("*")->status(1)->get();
        dd($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        dd('User details deleted');
    }
}
