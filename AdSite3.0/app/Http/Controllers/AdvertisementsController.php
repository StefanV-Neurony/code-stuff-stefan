<?php

namespace App\Http\Controllers;

use App\Advertisements;
use DemeterChain\A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $ads = Advertisements::where('valid','1')->get();

        return view('home')->with([
            'ads' => $ads,



        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$advertisement = Advertisements::with('items')->get();

        //input method is used to get the value of input with its
        //name specified
        $advertisement->title = $request->input('title');
        $advertisement-= $request->input('body');
        $advertisement-> = $request->input('department');
        $employee->phone = $request->input('phone');
        $employee->save(); //persist the data
*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisements $advertisements)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisements $advertisements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisements $advertisements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisements $advertisements)
    {
        //
    }

    public function displaypersonal(Advertisements $advertisements)
    {   $id = Auth::id();
        $yourads = Advertisements::where('user_id',$id)->get();
        return view('ads.myads')->with([
            'yourads' => $yourads,




        ]);


    }
}
