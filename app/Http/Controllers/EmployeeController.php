<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('layouts.app')->with(['data' => Employee::latest()->paginate(8), 'page' => 1]);
    }

    public function add(){
        return view('layouts.app')->with(['data' => ['data' => '' , 'add' => true], 'page' => 4]);

    }

    public function save(Request $req){
        $req->validate([
            'name' => ['required', 'string'],
            'email' => 'required|email|unique:employees',
            'job' => 'required|string',
            'salary' => 'required|numeric'
        ]);
        $emp = new Employee();
        $emp->name = $req->input('name');
        $emp->start_work = $req->input('start_work');
        $emp->email = $req->input('email');
        $emp->job = $req->input('job');
        $emp->salary = $req->input('salary');
        $emp->user_id = auth()->user()->id;
        $emp->save();
        toastr()->success('Employee added successfuly', 'Success');
        return redirect('/employee');

    }

    // public function delete(Employee $emp){
    //     $emp->delete();
    //     return redirect('/employee');
    // }

     public function delete(int $id){

        $emp = Employee::find($id);
        $emp->delete();
        toastr()->success('Employee deleted successfuly', 'Success');
        return redirect('/employee');
    }

    public function edit($id){
        return view('layouts.app')->with(['data' => ['data' => Employee::find($id), 'add' => false], 'page' => 5]);

    }

    public function update(Request $req , $id){
           $var = Employee::find($id);
           $this->validate($req,[
            'name' => ['required', 'string'],
            'email' => ['required','unique:employees,email,'.$var->id],
            'job' => 'required|string',
            'salary' => 'required|numeric'
        ]);
        $emp = Employee::find($id);
        $emp->name = $req->input('name');
        $emp->start_work = $req->input('start_work');
        $emp->email = $req->input('email');
        $emp->job = $req->input('job');
        $emp->salary = $req->input('salary');
        $emp->user_id = auth()->user()->id;
        $emp->update();
        toastr()->success('Employee edited successfuly', 'Success');
        return redirect('/employee');
    }

    public function search(){
        $search_nom = trim(request('query'));

        return view('layouts.app')->with(['data' => Employee::where('name','like','%'.$search_nom.'%')->latest()->paginate(10) , 'page' => 1]);


    }

    public function information(int $id){

        return view('layouts.app')->with(['data' => Employee::find($id), 'page' => 11]);
    }

}
