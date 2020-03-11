<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Http\Requests\StoreAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementsController extends Controller
{
    public function index(Advertisement $advertisement)
    {   $ads = $advertisement->where('valid','1')->get();
        $currentuser = Auth::user();

        return view('home')->with([
            'advertisements' => $ads,
            'currentuser' => $currentuser,
        ]);
    }

    public function store(StoreAdvertisement $request)
    {
        try {
            $newad = Advertisement::create([
                'user_id' => Auth::id(),
                'body' => $request->input('body'),
                'title' => $request->input('title'),
                'valid' => $request->input('valid'),
            ]);
            $newad->item()->create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
            ]);//persist the data
            return response()->json([
                'status' => 'success',
                'url' => route('ads.myads'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function edit(Advertisement $advertisement)
    {
        $advertisement->find('id');
        return view('ads.edit',[
            'advertisements' => $advertisement,
        ]);
    }

    public function update(StoreAdvertisement $request, Advertisement $advertisement)
    {
        try {
            $advertisement->find('id');
            $advertisement->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'valid' => $request->input('valid'),
            ]);
            $advertisement->item()->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function destroy(Advertisement $advertisement)
    {
        try {
            $advertisement->find('id');
            $advertisement->delete();
            return view('ads.myads');
        } catch (\Exception $e) {
        }
    }

    public function displayPersonal()
    {
        if (auth()->check()) {
            $user = Auth::user();
            $advertisements = $user->advertisements()->where('user_id', $user->id)->get();
            return view('ads.myads')->with([
                'advertisements' => $advertisements,
            ]);
        } else return view('/home');
    }

    public function buyItem(Request $request,Advertisement $advertisement)
    {
        try {
            $advertisement->find('id');
            $advertisement->update([
                'valid' => 0,
            ]);
            $advertisement->item()->update([
                'bought_by' => $request->input('bought_by'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }

    }

}
