<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Repositories\ClickRepository;

class MainController extends Controller
{
    public function home() {

        $site = new Site();

        return view('home', ['sites' => $site->all()]);
    }

    public function site($id) {

        $site = new Site();
        $clickRepository = new ClickRepository();

        $clicks = $clickRepository->getClicksAtHours($id);
        $count = $clickRepository->getCountClicks($id);
        $map = $clickRepository->getMap($id);
        
        $click_str = json_encode($clicks);
        $map = json_encode($map);

        return view('site', ['site' => $site->find($id), 'click_hours' => $click_str, 'clicks_map' => $map, 'count' => $count]);
    }

}
