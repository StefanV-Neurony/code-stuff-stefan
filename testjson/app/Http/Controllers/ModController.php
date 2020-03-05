<?php

namespace App\Http\Controllers;

use App\Mod;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View; // don't forget to add this



class ModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */


    public function index()
    {   $perPage = 5;
        $jsonString = file_get_contents(base_path('database/data/mods.json'));
        $current_page = LengthAwarePaginator::resolveCurrentPage();
        $allvalues = collect(array_values(array_filter(json_decode($jsonString,true))));
        $suffixes = $allvalues->where('generation_type','suffix');
        $prefixes = $allvalues->where('generation_type','prefix');
        $corrupted = $allvalues->where('generation_type','corrupted');


        $current_suffixes_orders = $suffixes->slice(($current_page - 1) * $perPage, $perPage)->all();
        $suffixes_to_show = new LengthAwarePaginator($current_suffixes_orders, count($suffixes), $perPage);

        $current_prefixes_orders = $prefixes->slice(($current_page - 1) * $perPage, $perPage)->all();
        $prefixes_to_show = new LengthAwarePaginator($current_prefixes_orders, count($prefixes), $perPage);

        $current_corrupted_orders = $corrupted->slice(($current_page - 1) * $perPage, $perPage)->all();
        $corrupted_to_show = new LengthAwarePaginator($current_corrupted_orders, count($suffixes), $perPage);

        $current_allmods_orders = $allvalues->slice(($current_page - 1) * $perPage, $perPage)->all();
        $allmods_to_show = new LengthAwarePaginator($current_allmods_orders, count($allvalues), $perPage);


        return view('main',[
            'suffixchunks'=>$suffixes_to_show,
            'prefixchunks'=>$prefixes_to_show,
            'corruptedchunks'=>$corrupted_to_show,
            'allmodlists'=>$allmods_to_show,
        ]);
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
     * @param Mod $mod
     * @return Response|LengthAwarePaginator
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function show(Mod $mod)
    {
        $perPage = 5;
        $jsonString = file_get_contents(base_path('database/data/all_affix/1haxe.json'));
        $current_page = LengthAwarePaginator::resolveCurrentPage();
        $onehandedaxes = collect(array_values(array_filter(json_decode($jsonString, true))));
        $filtered=$onehandedaxes->only('3');
        foreach($filtered as $filter)
            $modlist = collect($filter)->where('ModGenerationTypeID','2');
        $axes = $this->paginate($modlist);

       return view('main2',[
           'axemods'=>$axes]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Mod $mod
     * @return Response
     */
    public function edit(Mod $mod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Mod $mod
     * @return Response
     */
    public function update(Request $request, Mod $mod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Mod $mod
     * @return Response
     */
    public function destroy(Mod $mod)
    {
        //
    }
}
