<?php namespace App\Http\Controllers\Api\Delivery;

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
use App\Models\Language;
use App\Models\Order;
use DB;
use Validator;
use Redirect;

class ApiController extends Controller {
	
	public function login(Request $Request)
    {
        $res = new Delivery;
        
		return response()->json($res->login($Request->all()));
    }

    public function home()
    {
        $order      = new OrderDates;
        $delivery   = Delivery::find($_GET['delivery_id']);
        
        $data = [

        'pending'  =>  $order->today($delivery->store_id,"all",'pending'),
        'complete' =>  $order->complete($delivery->store_id),

        ];

		return response()->json(['data' => $data]);
    }

    public function resendCode()
    {
        $res = new Delivery;
        
		return response()->json($res->resendCode());
    }

    public function forgot(Request $Request)
    {
        $res = new Delivery;
        
		return response()->json($res->forgot($Request->all()));
    }

    public function resetPassword(Request $Request)
    {
        $res = new Delivery;

		return response()->json($res->resetPassword($Request->all()));
    }

    public function updateStatus()
    {
        $res                    = OrderDates::find($_GET['id']);
        $order                  = Order::find($res->order_id);
        $user                   = AppUser::find($order->user_id);

        $res->status            = $_GET['status'];
        
        if($_GET['status'] == 2)
        {
            $res->complete_lat  = $_GET['current_lat'];
            $res->complete_lng  = $_GET['current_lng'];

            $this->sendPush("Order Delivered","Hi ".$user->name.", Your order delivered successfully.",$res->user_id);

        }
        else
        {
            $res->d_lat          = $_GET['current_lat'];
            $res->d_lng          = $_GET['current_lng'];

            $this->sendPush("Order coming","Hi ".$user->name.", Your order is on the way.",$res->user_id);

        }

        $res->status_time       = date('d-M-Y h:i:A');
        $res->save();
        
        return response()->json(['msg' => true]);
    }

    public function account()
    {
        $data = [
        
        'user' => Delivery::find($_GET['delivery_id'])
        
        ];

        return response()->json(['data' => $data]);
    }

    public function accountSetting(Request $Request)
    {
        $res = new Delivery;

        return response()->json($res->setting($Request->all()));
    }

    public function order(Request $Request)
    {
        $order      = new OrderDates;
        $delivery   = Delivery::find($_GET['delivery_id']);
        
        $array = $Request->get('date') ? $Request->get('date') : [];

        usort($array, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

		return response()->json(['data' => $order->complete($delivery->store_id,$array)]);
    }

    public function earning()
    {
        $res = new Delivery;

        return response()->json(['data' => $res->earning()]);
    }

    public function withdraw(Request $Request)
    {
        $res        = new Withdraw;
        $delivery   = Delivery::find($_GET['delivery_id']);

        $this->sendPushS("Payment Withdraw Request","New payment withdraw request comes from delivery person. Please check in app.",$delivery->store_id);

        return response()->json(['data' => $res->addNew($Request->all())]);
    }

    public function history()
    {
        $res = new Withdraw;

        return response()->json(['data' => $res->getAll($_GET['delivery_id'])]);
    }

    public function uploadImage(Request $Request)
    {
        $res                = OrderDates::find($_GET['id']);
        $res->complete_lat  = $_GET['current_lat'];
        $res->complete_lng  = $_GET['current_lng'];
        $res->status        = 2;

        $filename   = time().rand(111,699).'.'.$Request->file('file')->getClientOriginalExtension(); 
        $Request->file('file')->move("upload/order/", $filename);   
        $res->img = $filename; 
        $res->save();
    }

    public function language()
    {
        $res = new Language;
        
		return response()->json(['data' => $res->getWithEng("delivery")]);
    }

    public function myAccount()
    {
        $res = new Delivery;
        
		return response()->json(['data' => Delivery::find($_GET['id']),'url' => Asset('upload/delivery')]);
    }
}
