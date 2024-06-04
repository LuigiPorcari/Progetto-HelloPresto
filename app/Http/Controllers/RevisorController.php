<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Foodbox;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $foodbox_to_check = Foodbox::where('is_accepted' , null)->first();
        return view('revisor.index' , compact('foodbox_to_check'));
    }

    public function accept(Foodbox $foodbox){
        $foodbox->setAccepted(true);
        return redirect()->back()->with("message" , __('ui.accettaFood')."$foodbox->name");
    }

    public function reject(Foodbox $foodbox){
        $foodbox->setAccepted(false);
        return redirect()->back()->with("message" ,  __('ui.rifiutatofood')."$foodbox->name");
    }
    public function becomeRevisor(Request $request){
        Auth::user()->revisor_check = true;
        Auth::user()->save();
        // dd(Auth::user()->revisor_check);
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $message = $request->input('message');
        $content = compact('email' , 'name' , 'message');
        Mail::to('admin@hellopresto.it')->send(new BecomeRevisor($content , Auth::user()));
        return redirect()->route('home')->with('message', __('ui.Complimenti'));
    }
    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor',['email'=> $user->email]);
        return redirect()->back();
    }

    public function undoAcceptReject(){
        $foodbox = Foodbox::orderBy('created_at', 'desc')->whereNotNull('is_accepted')->first();
        $foodbox->setAccepted(null);
        return redirect()->back()->with("message" , __('ui.annullaMessagge'));
    }
}

