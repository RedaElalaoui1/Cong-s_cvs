<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('layouts.app')->with(['data' => User::latest()->paginate(10), 'page' => 10]);
    }

    public function delete(int $id){

        $user = User::find($id);
        $user->delete();
        toastr()->success('User deleted successfuly', 'Success');
        return redirect('/users');
    }

    public function search(){
        $search_nom = trim(request('query'));

        return view('layouts.app')->with(['data' => User::where('name','like','%'.$search_nom.'%')->latest()->paginate(10) , 'page' => 10]);


    }

}
