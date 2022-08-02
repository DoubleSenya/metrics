<?php

namespace App\Http\Controllers;

use App\Models\Click;
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
        $click = new Click();
        $clicks = array();
       
        $clicks[22] = $click->where('site_id', $id)->whereTime('time', '>=', '22:00:01')->whereTime('time', '<', '23:00:00')->count();

        
        $click_str = json_encode($clicks);

        return view('site', ['site' => $site->find($id), 'click_hours' => $click_str]);
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
