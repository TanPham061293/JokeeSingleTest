<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Jokee;

class JokeeController extends Controller
{
    //
    public function displayJokee()
    {
        if (cookie('jokee')) {
            $Jokee = Cookie::get('jokee');
            $arrCookie = explode('-', $Jokee);
            $arrData = Jokee::pluck('id');
            if (count($arrCookie) >= count($arrData)) {
                return view('jokee', ['jokeeSingle' => "That's all the jokes for today! Come back another day!"]);
            }
            $jokeeSingle = Jokee::whereNotIn('id', $arrCookie)->first();
            return view('jokee', compact('jokeeSingle'));
        } else {
            $jokeeSingle = Jokee::inRandomOrder()->first();
            return view('jokee', compact('jokeeSingle'));
        }
        
    }
    public function saveJokee(Request $req)
    {
        if ($req->ajax()) {
            $jokeeSingle = Jokee::find($req->id);
            $jokeeSingle->status = $req->status;
            $jokeeSingle->update_at = date('Y-m-d');
            $jokeeSingle->save();
            if ($req->cookie('jokee')) {
                $Jokee =  $req->cookie('jokee');
                $Jokee .= '-' . $req->id;
                Cookie::queue('jokee', $Jokee);
                $arrCookie = explode('-', $Jokee);
                $arrData = Jokee::pluck('id');
                if (count($arrCookie) >= count($arrData)) {
                    return response()->json("That's all the jokes for today! Come back another day!");
                }
                $jokeeSingle = Jokee::whereNotIn('id', $arrCookie)->first();
                return response()->json($jokeeSingle);
            }
            $Jokee =  $req->id;
            Cookie::queue('jokee', $Jokee);
            $jokeeSingle = Jokee::inRandomOrder()->first();
            return response()->json($jokeeSingle);
        }
    }
}
