<?php

namespace App\Http\Controllers;

use App\Mall;
use App\space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces = space::where('company_id',auth()->user()->company_id)->get();
        return view('mall.space',compact('spaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mall.addLeaseSpace');
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
        $pictures_name = time().'.'.$request->file->getClientOriginalExtension();
        $uploadPath = "uploads/".$pictures_name;
        $request->file->move(public_path('uploads'), $pictures_name);
        $s = space::create([
            'company_id' => auth()->user()->company_id,
            'floor_no'=>$request->floor,
            'area'=>$request->area,
            'purpose'=>$request->purpose,
            'description' => $request->description,
            'photo_path' => $uploadPath
        ]);
        if ($s){
            $message = "the lease space successfully posted.";
            session()->regenerate();
            session()->flash('slide',$message);
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\space  $space
     * @return \Illuminate\Http\Response
     */
    public function show(space $space)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\space  $space
     * @return \Illuminate\Http\Response
     */
    public function edit(space $space)
    {
        return view('mall.editSpace',compact('space'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\space  $space
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, space $space)
    {
        //
        $this->validate($request,[
           'floor'=>'required',
            'area'=>'required',
            'purpose'=>'required',
        ]);
        $space->floor_no = $request->floor;
        $space->area = $request->area;
        $space->purpose = $request->purpose;
        $space->description = $request->description;
        $space->save();
        $message = "the lease space successfully updated.";
        session()->regenerate();
        session()->flash('slide',$message);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\space  $space
     * @return \Illuminate\Http\Response
     */
    public function destroy(space $space)
    {
        //
        $space->delete();
        return redirect()->back();
    }
    public function showSpaceInsideMall(Mall $mall){
        $spaces = space::where('company_id',$mall->company_id)->get();
        return view('showLease',compact(['mall','spaces']));
    }
}
