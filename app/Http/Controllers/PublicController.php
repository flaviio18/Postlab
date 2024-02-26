<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    
    Public function homepage () {

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(9)->get();
        return view('welcome', compact('articles'));
        
    }
    public function __construct(){
        $this->middleware('auth')->except('homepage');
    }
    public function careers(){
        return view ('careers');
    }
    public function careersSubmit(Request $request){
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;
        $info = compact('role', 'email', 'message');
        // dd($info);
        
        Mail::to('admin@postlab.it')->send(new CareerRequestMail($info));
    
        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;
    
            case 'revisor':
                $user->is_revisor = NULL;
                break;
    
        case 'writer':
                $user->is_writer = NULL;
                break;
                    
                
            }
            $user->update();
            return redirect(route('homepage'))->with('message', 'Grazie per averci contattato!');
    
    }
    public function newsletter(Request $request) {
        $email=$request->email;
        Mail::to('admin@postlab.it')->send(new Newsletter($email));
        return redirect(route('homepage'))->with('message', 'Grazie per esserti iscritto alla newsletter');

    }

}
