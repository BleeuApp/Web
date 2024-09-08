<?php namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\AppUser;
use App\Models\Withdraw;
use App\Models\Trans;
use DB;
use Validator;
use Redirect;
class UserController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$res = new AppUser;
		
		$data = [
		
		'data'	  => $res->getStoreUser(Auth::guard('store')->user()->id),
		
		];
				
		return View('store_login.user.index',$data);
	}

    public function edit()
    {
        return View('store_login.user.edit',['data' => AppUser::find($_GET['id'])]);
    }

    public function _edit(Request $Request)
    {
        $res                = AppUser::find($_GET['id']);
        $res->name          = $Request->get('name');
        $res->phone         = $Request->get('phone');
        $res->email         = $Request->get('email');
        $res->Save();

      
        if($Request->get('type') != "" && $Request->get('amount') != "")
        {
            $trans                  = new Trans;
            $trans->user_id         = $res->id;
            $trans->trans_id        = time();
            $trans->payment_method  = 1;
            $trans->type            = $Request->get('type');
            $trans->amount          = $Request->get('amount');
            $trans->notes           = $Request->get('notes') != "" ? $Request->get('notes') : "Updated from admin";
            $trans->save();

            if($Request->get('type') == 0)
            {
                $res->wallet        = $res->wallet + $Request->get('amount'); 
            }
            else
            {
                $res->wallet        = $res->wallet - $Request->get('amount');
            }

            $res->save();
        }

        return Redirect(env('store').'/user')->with('message','Updated successfully');
    }
}
