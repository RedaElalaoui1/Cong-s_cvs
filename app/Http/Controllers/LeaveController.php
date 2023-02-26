<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use DateTime;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;
use SebastianBergmann\Diff\Diff;

class LeaveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $leaves = Leave::whereHas('employee')->filter(request(['query']))->paginate(5);
        return view('layouts.app')->with([
            'data' => $leaves,
            "page" => 2
        ]);
    }

    public function add(){
        return view('layouts.app')->with(['data' => ['data' => Employee::all(), 'add' => true], 'page' => 8 ]);
    }

    public function delete(Leave $leave){

        // todo: check if date alreday passed and add error message
        if($leave->begin_date->format("Y-m-d") <= now()->format("Y-m-d")){
            toastr()->info("You can't delete this leave .");
            return back();
        }
        else{
            $daysConj = $leave->begin_date->diff($leave->end_date)->format("%a");
            $months = ($daysConj+1)/1.5;
            $days = $months - intval($daysConj/1.5);
            $days = $days*30;
            $leave->employee->last_m_of_l = $leave->employee->last_m_of_l->subMonths($months)->subDays($days)->format("Y-m-d");
            $leave->employee->update();
            $leave->delete();
            toastr()->success('Leave deleted successfuly', 'Success');
            return redirect('leaves');
        }

    }

    public function save(Request $req){

        $req->validate([
            'employee_id' => 'required',
            'begin_date' => 'required',
            'end_date' => 'required'//'after:begin_date'

        ],
    );

        $date_db=new DateTime($req->input('begin_date'));
        $date_fin=new DateTime($req->input('end_date'));

        // $emp_jrs = Employee::where('id', $req->input('employee_id'))->value('jrs_leave');//value('start_work');

        $dateDifference = $date_db->diff($date_fin)->format("%a");

        $daysConj = $dateDifference+1;

        if ($date_fin < $date_db) {
            return back()->withErrors(['err' => 'The end date must be a date after begin date.']);
        }
        // elseif ($days <= $emp_jrs){

        //     $leave = new Leave();
        //     // $id = Employee::where('name', $name)->value('id');
        //     $leave->employee_id = $req->input('employee_id');
        //     $leave->begin_date = $req->input('begin_date');
        //     $leave->end_date = $req->input('end_date');
        //     $leave->user_id = auth()->user()->id;
        //     $leave->save();

        //     $employee = Employee::find($leave->employee_id);
        //     $employee->jrs_leave = $employee->jrs_leave - $days;
        //     $employee->update();

        //     return view('layouts.app')->with(['data' => Leave::all(),'page' => 2]);
        // } else {
        //     return redirect('/leaves/add')->withErrors(['err' => "Employee haven't enough leave days !"]);
        // }
        else{
            $emp = Employee::find($req->input('employee_id'));
            $resultat = $emp->getCongeStartDate($daysConj);
            $emp->update();

            if($resultat == 1){
                return redirect('/leaves/add')->withErrors(['err' => "Employee has not completed 6 months !"]);

            }
            if($resultat == 2){
            $leave = new Leave();
            $leave->employee_id = $req->input('employee_id');
            $leave->begin_date = $req->input('begin_date');
            $leave->end_date = $req->input('end_date');
            $leave->user_id = auth()->user()->id;
            $leave->save();
                toastr()->success('Leave added successfuly', 'Success');
                return redirect('/leaves');
            }
            if($resultat == 3){
                return redirect('/leaves/add')->withErrors(['err' => "Employee haven't enough leave days ! "]);
            }

        }



    }
    /////// update
    public function edit($id){
        return view('layouts.app')->with(['data' => ['data' => Leave::find($id), 'add' => false],'page' => 9]);
    }

    public function update(Request $req , $id){
        $leave = Leave::find($id);
        $leave->begin_date = $req->input('begin_date');
        $leave->end_date = $req->input('end_date');
        $leave->update();
        toastr()->success('Leave edited successfuly', 'Success');
        return redirect('/leaves');
    }

}
