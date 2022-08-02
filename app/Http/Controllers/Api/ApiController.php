<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function metrics(Request $rq) {

        $valid = $rq->validate([
            'x' => 'required',
            'y' => 'required'
        ]);

        $click = new Click();
        $click->coord_x = $rq->input('x');
        $click->coord_y = $rq->input('y');
        $click->time = Carbon::now()->format('H:i:s');
        $click->date = Carbon::now()->format('Y-m-d');
        //$click->site_id = 1;

        $site = new Site();
        $rq_site = $site->where('url', $rq->input('url'))->first();
        $click->site_id = $rq_site->id;

        return $click->save();
    }
}
