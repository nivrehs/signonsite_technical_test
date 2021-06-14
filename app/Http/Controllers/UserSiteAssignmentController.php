<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class UserSiteAssignmentController extends Controller 
{
	/**
     * Get site-assignments for a user.
     * @param  $user_id  user_id of the requester
     * @return site-assignments
     */
    public function show($user_id) 
    {
    	$result['user_id'] = $user_id;

        switch($user_id) {
        	case 2:  
        		$result['name'] = "John Doe";
        		$result['site_assignments'] = ['site_id' => 1, 'site_name' => 'Site One', 
        									  'distance from site' => '100 meters'];
        		break;

        	case 3:  
        		$result['name'] = "Jesse James";
        		$result['site_assignments'] = ['site_id' => 2, 'site_name' => 'Site Two', 
        									  'distance from site' => '200 meters'];
        		break;

        	case 4:  
        		$result['name'] = "Nomad Damon";
        		$result['site_assignments'][] = ['site_id' => 2, 'site_name' => 'Site Two', 
        									  'distance from site' => '200 meters'];
        		$result['site_assignments'][] = ['site_id' => 1, 'site_name' => 'Site One', 
        									  'distance from site' => '100 meters'];
        		break;

        	default: 
        		Log::channel('slack')->debug('User id ' . $user_id . 'not found!');
        		return abort(404);
        }
		return $result;

    }
}