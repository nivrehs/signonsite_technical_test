<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;

class UserSignonController extends Controller 
{
    public function store($user_id, Request $request) 
    {
        $validated = $request->validate([
            'site_id' => 'required|integer',
            'user_id' => 'integer',
        ]);

        $result['user_id'] = $user_id;

        switch($user_id) {
            case 2:  
                $result['name'] = "John Doe";
                $result['site_id'] = 1;
                $result['site_name'] = "Site One";
                $result['time in'] = date("Y-m-d H:i:s");
                //add checking if user is assigned to $site_id, if not, throw 404
                break;

            case 3:  
                $result['name'] = "Jesse James";
                $result['site_id'] = 2;
                $result['site_name'] = "Site Two";
                $result['time in'] = date("Y-m-d H:i:s");
                //add checking if user is assigned to $site_id, if not, throw 404
                break;

            case 4:  
                $result['name'] = "Nomad Damon";
                $result['site_id'] = 1;
                $result['site_name'] = "Site One";
                $result['time in'] = date("Y-m-d H:i:s");
                //add checking if user is assigned to $site_id, if not, throw 404
                break;

            default: 
                return abort(404);
        }
        return $result;
    }
}