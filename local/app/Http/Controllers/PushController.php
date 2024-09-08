<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Role;
use DB;
use Validator;
use Redirect;
class PushController extends Controller {
	
	public function index()
    {
        return View('push.index');
    }

    public function push(Request $Request)
    {
        $filename = null;

        if($Request->has('file'))
        {
            $filename   = time().rand(111,699).'.' .$Request->file('file')->getClientOriginalExtension(); 
            $Request->file('file')->move("upload/push/", $filename);     
        }

        if($Request->get('app') == 1)
        {
            $this->sendPush($Request->get('title'),$Request->get('desc'),0,$filename);
        }
        elseif($Request->get('app') == 2)
        {
            $this->sendPushS($Request->get('title'),$Request->get('desc'),0,$filename);
        }
        elseif($Request->get('app') == 3)
        {
            $this->sendPushD($Request->get('title'),$Request->get('desc'),0,$filename);
        }

        return Redirect::back()->with('message','Push Notification Sent Successfully.');
    }

    public function report()
    {
        return View('push.report');
    }

    public function _report(Request $Request)
    {

    }
}
