<?php namespace App\Http\Controllers\Api\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Slider;
use App\Models\User;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Store;
use App\Models\Tifin;
use App\Models\Cart;
use App\Models\AppUser;
use App\Models\Address;
use App\Models\Plan;
use App\Models\Delivery;
use App\Models\OrderDates;
use App\Models\Withdraw;
use App\Models\Order;
use App\Models\Paid;
use App\Models\Language;
use DB;
use Validator;
use Redirect;
use Mail;

class ApiController extends Controller {
	
	public function sendOtp(Request $Request)
    {
        $otp   = rand(1111,9999);
        $email = $Request->get('email');

        Mail::send('home.email',['otp' => $otp,'store' => true,'name' => $Request->get('name')], function($message) use($email)
        {     
            $message->to($email)->subject("Tifin Box - Verify Your Email");                        
        });

		return response()->json(['data' => $otp]);
    }

    public function signup(Request $Request)
    {
        $res = new Store;
        
		return response()->json($res->signupFromApp($Request->all()));
    }

    public function login(Request $Request)
    {
        $res = new Store;
        
		return response()->json($res->login($Request->all()));
    }

    public function resendCode()
    {
        $res = new Store;
        
		return response()->json($res->resendCode());
    }

    public function forgot(Request $Request)
    {
        $res = new Store;
        
		return response()->json($res->forgot($Request->all()));
    }

    public function resetPassword(Request $Request)
    {
        $res = new Store;

		return response()->json($res->resetPassword($Request->all()));
    }

    public function homepage()
    {
        $res  = Store::find($_GET['store_id']);
        $data = [
        
        'overview' => $res->overview(),
        'store'    => $res,
        'currency' => User::find(1)->currency
        ];

        return response()->json(['data' => $data]);
    }

    public function account()
    {
        $res = Store::find($_GET['store_id']);

        return response()->json(['data' => $res->account()]);
    }

    public function updateAccount(Request $Request)
    {
        $res = new Store;

        return response()->json($res->updateAccount($Request->all()));
    }

    public function days(Request $Request)
    {
        $res = new Store;

        return response()->json($res->days($Request->all()));
    }

    public function meal(Request $Request)
    {
        $res = new Store;

        return response()->json($res->meal($Request->all()));
    }

    public function password(Request $Request)
    {
        $res                    = Store::find($_GET['store_id']);
        $res->shw_password      = $Request->get('new_password');
        $res->save();

        return response()->json(['data' => true]);
    }

    public function staff()
    {
        $res = new Delivery;

        return response()->json(['data' => $res->getAppData(),'url' => Asset('upload/delivery')]);
    }

    public function deleteStaff()
    {
        Delivery::where('store_id',$_GET['store_id'])->where('uid',$_GET['uid'])->delete();

        $res = new Delivery;

        return response()->json(['data' => $res->getAppData()]);
    }

    public function addStaff(Request $Request)
    {
        $res = new Delivery;
        $msg = $res->addAppData($Request->all());

        return response()->json(['data' => $res->getAppData(),'msg' => $msg]);
    }

    public function item()
    {
        $res = new Tifin;

        return response()->json(['data' => $res->getItem("all")]);
    }

    public function deleteItem()
    {
        Tifin::where('store_id',$_GET['store_id'])->where('id',$_GET['uid'])->delete();

        $res = new Tifin;

        return response()->json(['data' => $res->getItem()]);
    }

    public function addItem(Request $Request)
    {
        $res  = new Tifin;
        $id   = $res->addNew($Request->all(),$_GET['id']);

        return response()->json(['data' => $res->getItem(),'id' => $id]);
    }

    public function uploadImage(Request $Request)
    {
        $res                = Tifin::find($_GET['id']);
        $filename   = time().rand(111,699).'.'.$Request->file('file')->getClientOriginalExtension(); 
        $Request->file('file')->move("upload/tifin/", $filename);   
        $res->img = $filename; 
        $res->save();

        return response()->json(['data' => $res->getItem()]);
    }

    public function withdraw()
    {
        $res = new Withdraw;

        return response()->json(['data' => $res->getAllRequest()]);
    } 

    public function approve()
    {
        Withdraw::where('id',$_GET['id'])->update(['status' => $_GET['status']]);

        $res = new Withdraw;

        return response()->json(['data' => $res->getAllRequest()]);
    }
    
    public function order()
    {
        $res = new Order;

        return response()->json(['data' => $res->getAppData()]);
    }

    public function delivery()
    {
        $res        = new OrderDates;
        $id         = $_GET['store_id'];
        $date       = isset($_GET['date']) && $_GET['date'] != "" ? $_GET['date'] : date("Y-m-d");

        $data       = [

        'breakfast' => $res->today($id,'Breakfast'),
        'lunch'     => $res->today($id,'lunch'),
        'dinner'    => $res->today($id,'dinner'),
        'delivery'  => Delivery::where('store_id',$_GET['store_id'])->get(),
        'next'      => date('Y-m-d',strtotime($date.' + 1 day')),
        'date'      => date("d M, Y",strtotime($date)),
        'today'     => $_GET['date'] == "" ? true : false

        ];

        return response()->json(['data' => $data]);
    }

    public function assign(Request $Request)
    {
        OrderDates::whereIn('id',$Request->get('date_id'))->update(['delivery_id' => $Request->get('delivery_id')]);

        $delivery = Delivery::find($Request->get('delivery_id'));

        $this->sendPushD("New Order Assigned","Hi ".$delivery->name.", You have ".count($Request->get('chk'))." new orders in the app. Please check.",$delivery->id);

        return response()->json(['data' => true]);
    }

    public function earn()
    {
        $res = new Store;
        
        return response()->json(['data' => $res->getEarning()]);
    }

    public function paid()
    {
        $res = new Paid;
        
        return response()->json(['data' => $res->getAppData(),'total' => Paid::where('store_id',$_GET['store_id'])->sum('amount')]);
    }

    public function language()
    {
        $res = new Language;
        
		return response()->json(['data' => $res->getWithEng("store")]);
    }
}
