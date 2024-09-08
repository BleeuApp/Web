<?php namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderDates;
use App\Models\User;
use App\Models\Delivery;
use App\Models\Inv;
use App\Models\Tifin;
use DB;
use Validator;
use Redirect;
class OrderController extends Controller {
	
	public function index()
    {
        $res = new Order;

        return View('store_login.order.index',[
        
        'data'      => $res->getAll(Auth::guard('store')->user()->id),
        'setting'   => User::find(1)
        
        ]);
    }

    public function orderView()
    {
        $res = new Order;

        return View('store_login.order.view',[
        
        'data'      => $res->getSingle($_GET['id']),
        'setting'   => User::find(1)
        
        ]);
    }

    public function today()
    {
        $res        = new OrderDates;
        $id         = Auth::guard('store')->user()->id;
        $date       = isset($_GET['date']) ? date('Y-m-d',strtotime($_GET['date'].' + 1 day')) : date('Y-m-d',strtotime(date('Y-m-d').' + 1 day'));
        $delivery   = new Delivery;

        return View('store_login.order.today',[
        
        'breakfast' => $res->today($id,'Breakfast'),
        'lunch'     => $res->today($id,'lunch'),
        'dinner'    => $res->today($id,'dinner'),
        'setting'   => User::find(1),
        'items'     => $res->getItemCount($id),
        'title'     => isset($_GET['date']) ? "Deliveries for ".date('d-M-Y',strtotime($_GET['date'])) : 'Today Deliveries',
        'nextLink'  => Asset(env('store').'/today?date='.$date),
        'delivery'  => $delivery->getAll(0),
        'date'      => isset($_GET['date']) ? $_GET['date'] : date("Y-m-d")

        
        ]);
    }

    public function next()
    {
        $res = new OrderDates;
        $id  = Auth::guard('store')->user()->id;

        return View('store_login.order.next',[
        
        'from' => isset($_GET['from']) ? $_GET['from'] : null,
        'to'   => isset($_GET['to']) ? $_GET['to'] : null,
        'data' => isset($_GET['from']) ? $res->getDateWise() : []
        
        ]);
    }

    public function assign(Request $Request)
    {
        OrderDates::whereIn('id',$Request->get('chk'))->update(['delivery_id' => $Request->get('delivery_id')]);

        $delivery = Delivery::find($Request->get('delivery_id'));

        $this->sendPushD("New Order Assigned","Hi ".$delivery->name.", You have ".count($Request->get('chk'))." new orders in the app. Please check.",$delivery->id);

        return Redirect::back()->with('message','Delivery Person Assigned Successfully');
    }

    public function _print()
    {
        $res = new OrderDates;
        
        return View('store_login.order.print',['data' => $res->getPrint()]);
    }

    public function createOrder()
    {
        return View('store_login.order.create',[
        
        'items' => Tifin::where('store_id',Auth::guard('store')->user()->id)->where('display',0)->get(),
        'data'  => new Order

        ]);
    }

    public function _createOrder(Request $Request)
    {
        $res = new Order;

        $res->manualOrder($Request->all());

        return Redirect::back()->with('message','Order Created Successfully.');
    }

    public function itemChart()
    {
        $res = new Inv;
        
        return View('store_login.order.chart',['data' => $res->getChart()]);
    }
}
