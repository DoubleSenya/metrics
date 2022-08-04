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
            'y' => 'required',
            'window_width' => 'required',
            'window_height' => 'required'
        ]);

        $click = new Click();
        $click->coord_x = $rq->input('x');
        $click->coord_y = $rq->input('y');
        $click->window_width = $rq->input('window_width');
        $click->window_height = $rq->input('window_height');
        $click->time = Carbon::now()->format('H:i:s');
        $click->date = Carbon::now()->format('Y-m-d');

        $site = new Site();
        $rqSite = $site->where('url', $rq->input('url'))->first();
        $click->site_id = $rqSite->id;

        return $click->save();
    }
}
