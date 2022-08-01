<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class MainController extends Controller
{
    public function home() {

        $site = new Site();

        return view('home', ['sites' => $site->all()]);
    }

    public function site($id) {

        $site = new Site();

        return view('site', ['site' => $site->find($id)]);
    }

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
