<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SiteController extends Controller 
{
    /**
     * Get list of sites.
     * @return list of sites
     */
    public function index() 
    {
        $sites[] = ['site_id' => 1, 'site_name' => "Site One"];
        $sites[] = ['site_id' => 2, 'site_name' => "Site Two"];
        return ['sites' => $sites];
    }
}
