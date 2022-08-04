<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;
use App\Models\Site;

class PostController extends Controller
{
    public function check(Request $rq){
        
        $valid = $rq->validate([
            'site_name' => 'required',
            'site_url' => 'required|url'
        ]);

        $site = new Site();
        $site->name = $rq->input('site_name');
        $site->url = $rq->input('site_url');

        $site->save();

        return redirect()->route('home');
    }
}