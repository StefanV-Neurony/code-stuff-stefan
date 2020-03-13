<?php

namespace App\Http\Controllers;


use App\Item;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function displaybought()
    {   $user = Auth::user();
        if (auth()->check()) {
            $items = Item::with('advertisement')->where('bought_by', $user->name);
            return view('ads.boughtitems')->with([
                'items' => $items,
            ]);
        } else {
            return view('/home');
        }
    }
}
