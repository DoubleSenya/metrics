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
       // 01:00:00
        $clicks[22] = $click->where('site_id', $id)->whereTime('time', '>=', '22:00:00')->whereTime('time', '<', '23:00:00')->count();

        for ($i = 0; $i < 24; $i++) {
            if ($i < 10)
                $clicks[$i] = $click->where('site_id', $id)->whereTime('time', '>=', '0'.$i.':00:00')->whereTime('time', '<', '0'.($i+1).':00:00')->count();
            elseif ($i >= 10 && $i != 23)
                $clicks[$i] = $click->where('site_id', $id)->whereTime('time', '>=', $i.':00:00')->whereTime('time', '<', ($i+1).':00:00')->count();
            else
                $clicks[23] = $click->where('site_id', $id)->whereTime('time', '>=', '23:00:00')->whereTime('time', '<=', '23:59:59')->count();
        }
        
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
