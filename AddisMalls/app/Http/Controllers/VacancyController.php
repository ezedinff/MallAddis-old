<?php

namespace App\Http\Controllers;

use App\Service_provider;
use App\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id  = auth()->user()->company_id;
        if($company_id[0] == "m"){
            return view('mall.vacancy');
        }
        else if ($company_id[0] == "s"){
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ($ser[0]->category_id == 1){
                return view('cafe.vacancy');
            }
            return view('sp.vacancy');
        }
    }

    public function showVacancy(){
        $jobs = Vacancy::where('id', '<>' , '0')->orderBy('id','desc')->get();
        return view('showJobs' ,compact('jobs'));
    }
    public function showVacancySpec(Vacancy $job){
        return view('showJobSpec' ,compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id  = auth()->user()->company_id;
        if($company_id[0] == "m"){
            return view('mall.addVacancy');
        }
        else if ($company_id[0] == "s"){
            $ser  = Service_provider::where('company_id',$company_id)->get();
            if ($ser[0]->category_id == 1){
                return view('cafe.addVacancy');
            }
            return view('sp.addVacancy');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //title,job_category,salary,education,type,descr,exp,date
        $this->validate($request,[
           'title' => 'required',
           'job_category' => 'required',
           'salary' => 'required',
           'education' => 'required',
           'type' => 'required',
           'descr' => 'required',
           'exp' => 'required',
           'date' => 'required',
        ]);

        $s =  Vacancy::create([
            'company_id' => auth()->user()->company_id,
           'job_title' => $request->title,
           'job_category_id' => $request->job_category,
           'salary' => $request->salary,
           'employment_type' => $request->type,
            'qualifications' => $request->education,
            'years_exp' => $request->exp,
            'description' => $request->descr,
            'deadline'=> $request->date
        ]);

        $message = "you have successfully posted vacancy";
        if ($s){
            session()->regenerate();
            session()->flash('vacancy',$message);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
