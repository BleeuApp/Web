<?php namespace App\Http\Controllers\Api;

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
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDates;
use DB;
use Validator;
use Redirect;
class OrderController extends Controller {
	
    public function placeOrder(Request $Request)
    {
        $order = new Order;

        $this->sendPushS("New Order Received","New subscription order received, Please check in the app for more detail",$Request->get('store_id'));

        return response()->json($order->addNew($Request->all()));
    }

    public function getWallet()
    {
        $res = new AppUser;

        return response()->json(['data' => $res->getWallet()]);
    }
}
