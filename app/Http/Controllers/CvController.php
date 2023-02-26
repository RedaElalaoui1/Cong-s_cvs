<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(){
        return view('layouts.app')->with(['data' => '', 'page' => 6]);
    }


    public function index(){
        return view('layouts.app')->with(['data' => Cv::latest()->paginate(5), 'page' => 3]);
    }

    public function filterByNote(Request $request): JsonResponse {
        $data = $request->json()->all();
        $cvs = Cv::with('user:id,name')->where('note', $data['note'])->get();
        return response()->json(['cvs' => $cvs]);
    }

    public function search(){
        $search_note = $_GET['query'];


       // return view('layouts.app')->with(['data' => Cv::where('note',$search_note)->latest()->paginate(5) , 'page' => 3]);
       // return view('cherche_cv')->with(['cvs' => DB::table('cvs')->where('note',$search_note)->get()]);
       return view('layouts.app')->with(['data' => Cv::where('name','like','%'.$search_note.'%')->latest()->paginate(5) , 'page' => 3]);



    }

    public function save(Request $req){
        $req->validate([
            'file' => ['required', 'mimes:pdf,docx,jpg,jpeg,png', 'max:4096'],
            'note' => 'required|numeric',
            'name' => 'required|string'
        ]);
        $path = Storage::disk('public')->put('images', $req->file);
        $path = substr($path, 7);
        $cv = new Cv();
        $cv->name = $req->input('name');
        $cv->fichier = $path;
        $cv->note = $req->input('note');
        $cv->user_id = auth()->user()->id;
        $cv->save();
        toastr()->success('Cv added successfuly', 'Success');
        return redirect('/cvs');
    }

    // public function delete(Cv $cv){
    //     $cv->delete();
    //     return view('cherche_cv')->with(['cvs' => Cv::all()]);
    // }


    public function delete(int $id){

        $cv = Cv::find($id);
        $cv->delete();
        toastr()->success('Cv deleted successfuly', 'Success');
        return redirect('/cvs');
    }

/////// update
    public function edit($id){
        return view('layouts.app')->with(['data' => Cv::find($id), 'page' => 7]);
    }

    public function update(Request $req , $id){
        $req->validate([
            // 'file' => ['required', 'mimes:pdf,docx,jpg,jpeg,png', 'max:4096'],
            'note' => 'required|numeric'
        ]);
        // $path = Storage::disk('public')->put('images', $req->file);
        // $path = substr($path, 7);
        $cv = Cv::find($id);
        // $cv->fichier = $path;
        $cv->note = $req->input('note');
        $cv->user_id = auth()->user()->id;
        $cv->update();
        toastr()->success('Cv edited successfuly', 'Success');
        return redirect('/cvs');
    }

    public function image($id){

        return view('image')->with(['cv' => Cv::find($id)]);
    }

    // public function uploadFile(Request $req){

    //     $req->file->store('public');

    // }


}
