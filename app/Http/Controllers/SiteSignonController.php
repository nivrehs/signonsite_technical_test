<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;


class SiteSignonController extends Controller 
{

    /**
     * Get site sign-ons.
     * @param  $site_id  site_id to view sign ons from
     * @param  $user_id  user_id of the requester
     * @return site sign-ons
     */
    public function index($site_id, Request $request) 
    {
        // validate input
        $validated = $request->validate([
            'user_id' => 'required|integer',
        ]);

        $this->authorise($request['user_id']);

        switch($site_id) {
            case 1:  
                $result['site_name'] = "Site One";
                $result['sign_ons'][] = ['user_id' => 2, 'name' => 'John Doe', 
                                              'time_in' => '11 June 2021 09:00:40'];
                $result['sign_ons'][] = ['user_id' => 4, 'name' => 'Nomad Damon', 
                                              'time_in' => '11 June 2021 09:30:40'];
                break;

            case 2:  
                $result['site_name'] = "Site Two";
                $result['sign_ons'] = ['user_id' => 3, 'name' => 'Jesse James', 
                                              'time_in' => '11 June 2021 09:01:40'];
                break;

            default: 
                return abort(404);
        }
        return $result;
    }

    /**
     * Get site sign-ons.
     * @param  $user_id  user_id to verify access
     * @return abort if not authorised user
     */
    private function authorise($user_id)
    {
        // only site manager can view sign-ons
        return 1 == $user_id ? Response::allow() : abort(403);
    }
}
