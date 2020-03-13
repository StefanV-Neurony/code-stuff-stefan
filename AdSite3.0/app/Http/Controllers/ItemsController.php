<?php

namespace App\Http\Controllers;


use App\Item;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function displaybought()
    {   if (auth()->check()) {
        $user = Auth::user();
        $advertisements = $user->advertisements()->where('user_id', $user->id)->get();
        return view('ads.boughtitems')->with([
            'advertisements' => $advertisements,
        ]);
    } else return view('/home');
    }
}
