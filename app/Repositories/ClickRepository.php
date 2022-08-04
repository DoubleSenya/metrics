<?php

namespace App\Repositories;

use App\Models\Click;

class ClickRepository {

    public $click;

    public function __construct() 
    {
        $this->click = new Click();
    }

    public function getClicksAtHours($id)
    {
        $clicks = array();

        for ($i = 0; $i < 24; $i++) {
            if ($i < 10)
                $clicks[$i] = $this->click->where('site_id', $id)->whereTime('time', '>=', '0'.$i.':00:00')->whereTime('time', '<', '0'.($i+1).':00:00')->count();
            elseif ($i >= 10 && $i != 23)
                $clicks[$i] = $this->click->where('site_id', $id)->whereTime('time', '>=', $i.':00:00')->whereTime('time', '<', ($i+1).':00:00')->count();
            else
                $clicks[$i] = $this->click->where('site_id', $id)->whereTime('time', '>=', '23:00:00')->whereTime('time', '<=', '23:59:59')->count();
        }

        return $clicks;
    }

    public function getCountClicks($id)
    {
        return $this->click->where('site_id', $id)->count();
    }

    public function getMap($id)
    {
        $map = array();
        $map = $this->click->where('site_id', $id)->get();

        return $map;
    }

}