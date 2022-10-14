<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    // public function create(Request $request)
    // {
    //     $visitor = new Visitor();

        
    //     $visitor->name = $request->input('name');
    //     $visitor->source = $request->input('source');
    //     $visitor->company = $request->input('company');
    //     $visitor->contact = $request->input('contact');
    //     $visitor->save();

    //     return redirect('/home');
    
    // }


    public function welcome(Request $request)
    {
        return view('welcome');
    }
}
