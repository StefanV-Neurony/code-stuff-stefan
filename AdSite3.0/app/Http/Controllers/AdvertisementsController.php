<?php

namespace App\Http\Controllers;

use App\Advertisements;
use App\Items;
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
    {   $ads = Advertisements::with('items')->where('valid','1')->get();

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
        return redirect()->route('ads.myads');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newad = Advertisements::create([
            'user_id'=>Auth::id(),
            'body'=>$request->input('body'),
            'title'=>$request->input('title'),
        ]);


        $newitem = new Items([
            'name'=>$request->input('items'),
            'price'=>$request->input('price'),

        ]);


       $newad->items()->save($newitem); //persist the data
        return redirect()->route('ads.myads');

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
