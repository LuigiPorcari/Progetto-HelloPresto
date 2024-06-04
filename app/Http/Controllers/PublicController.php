<?php

namespace App\Http\Controllers;

use App\Models\Foodbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home() {
        $foodboxes = Foodbox::where('is_accepted', true)->orderBy('created_at','desc')->take(6)->get();
        return view('welcome', compact('foodboxes'));
    }

    public function searchFoodbox(Request $request){
        $query = $request->input('query');
        $foodboxes = Foodbox::search($query)->where('is_accepted' , true)->paginate(9);
        return view('FoodBox.searched' , ['foodboxes' => $foodboxes , 'query' => $query]);
    }
    public function index(){
        $foodboxes= Foodbox::where("is_accepted", true)-> orderBy("created_at", "desc")->paginate(9);
        return view('FoodBox.index', compact('foodboxes'));
    }
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function privacy(){
        return view('policies.privacy');
    }

    public function destroyUser(){
        Auth::user()->foodboxes()->delete();
        Auth::user()->comments()->delete();
        Auth::user()->delete();
        return redirect(route('home'))->with('message' , __('ui.utenteEliminato'));
    }
}
