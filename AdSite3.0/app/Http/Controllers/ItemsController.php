<?php

namespace App\Http\Controllers;

use App\Advertisements;
use App\Items;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Items $items
     * @return Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Items $items
     * @return Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Items $items
     * @return Response
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Items $items
     * @return Response
     */
    public function destroy(Items $items)
    {
        //
    }

    public function displaybought(Items $items)
    {   $id = Auth::id();
        $youritems = Advertisements::with('items')->where('user_id',$id)->get();
        return view('ads.boughtitems')->with([
            'youritems' => $youritems,




        ]);
    }
}
