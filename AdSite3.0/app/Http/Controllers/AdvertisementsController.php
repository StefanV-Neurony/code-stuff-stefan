<?php

namespace App\Http\Controllers;

use App\Advertisements;
use App\Items;
use DemeterChain\A;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $newad = Advertisements::create([
            'user_id'=>Auth::id(),
            'body'=>$request->input('body'),
            'title'=>$request->input('title'),
            'valid'=>$request->input('valid'),
        ]);


        $newitem = new Items([
            'name'=>$request->input('items'),
            'price'=>$request->input('price'),

        ]);


       $newad->items()->save($newitem); //persist the data
        return json_encode(array("statusCode"=>200));
        return view('ads.myads');

    }

    /**
     * Display the specified resource.
     *
     * @param Advertisements $advertisements
     * @return Response
     */
    public function show(Advertisements $advertisements)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advertisements $advertisements
     * @return \Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $advertisement = Advertisements::with('items')->find($id);




        return view('ads.edit',[
            'var'=>$advertisement,
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Advertisements $advertisements
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $advertisement = Advertisements::with('items')->find($id);
        $advertisement->title=$request->input('title');
        $advertisement->body=$request->input('body');
        $advertisement->save();
        echo $advertisement;




    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Advertisements $advertisements
     * @return Response
     */
    public function destroy($id)
    {
        $advertisements = Advertisements::find($id);
        $advertisements->delete();
        return response()->json(['message'=>'deleted']);

        return view('ads.myads');

    }

    public function displaypersonal(Advertisements $advertisements)
    {   $id = Auth::id();
        $yourads = Advertisements::with('items')->where('user_id',$id)->get();
        return view('ads.myads')->with([
            'yourads' => $yourads,




        ]);


    }
}
