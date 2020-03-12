<?php

namespace App\Http\Controllers;


use App\Item;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function displaybought(Item $items)
    {
        if(auth()->check()) {
            $user = Auth::user();
            $items->find('id')->where('bought_by',$user->name);
            return view('ads.boughtitems', [
                'items' => $items,
                ]);
        }
    }
}
