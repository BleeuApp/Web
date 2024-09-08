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
use App\Models\Offer;
use App\Models\OrderDetail;
use App\Models\OrderDates;
use App\Models\Rating;
use App\Models\Language;
use App\Models\Page;
use DB;
use Validator;
use Redirect;
use Stripe;
use Mail;
class ApiController extends Controller {
	
	public function welcome()
    {
        $res  = new Slider;
        $lang = new Language;
        
		return response()->json([
        
            'data'  => $res->getAppData(),
            'admin' => User::find(1),
            'lang'  => $lang->getEnglish("user")
        ]);
    }

    public function homepage()
    {
        $cate    = new Category;
        $banner  = new Banner;
        $store   = new Store;
        $cart    = new Cart;

        $data = [
        
        'cate'       => $cate->getAppData(),
        'banner'     => $banner->getAppData(),
        'trend'      => $store->getAppData('trend'),
        'new'        => $store->getAppData('new'),
        'random'     => $store->getRandom(),
        'store'      => $store->getAppData(),
        'admin'      => User::find(1),
        'cart'       => $cart->countCart($_GET['cart_no'])

        ];

		return response()->json(['data' => $data]);
    }

    public function view()
    {
        $store   = new Store;

        $data    = isset($_GET['type']) && $_GET['type'] != 'random' ? $store->getAppData($_GET['type']) : $store->getRandom(100000);

		return response()->json(['data' => $data]);
    }

    public function getItem()
    {
        $store = new Store;
        $item  = new Tifin;
        $cart  = new Cart;
        $lang  = new Language;

        $data = [

        'store'     => $store->getSingleStore(),
        'item'      => $item->getItem(),
        'custom'    => $item->getItem(1),
        'cart'      => $cart->countCart($_GET['cart_no']),
        'admin'     => User::find(1),
        'lang'      => $lang->getEnglish("user")
            
        ];

		return response()->json(['data' => $data]);
    }

    public function add_to_cart(Request $Request)
    {
        $res = new Cart;

		return response()->json(['data' => $res->addNew($Request->all())]);
    }

    public function getCart()
    {
        $res    = new Cart;
        $cart   = Cart::where('cart_no',$_GET['cart_no'])->first();
        $store  = isset($cart->id) ? Store::find($cart->store_id) : new Store;

		return response()->json([
		   
		   'data'           => $res->getCart($_GET['cart_no']),
		   'working_day'    => explode(",",$store->working_day),
		   'days'           => $res->getDays()]);
    }

    public function signup(Request $Request)
    {
        $res = new AppUser;

		return response()->json($res->signup($Request->all()));
    }

    public function resendCode()
    {
        $res = new AppUser;

		return response()->json($res->resendCode());
    }

    public function verifyOtp(Request $Request)
    {
        $res = new AppUser;

		return response()->json($res->verify($Request->all()));
    }

    public function login(Request $Request)
    {
        $res = new AppUser;

		return response()->json($res->login($Request->all()));
    }

    public function forgot(Request $Request)
    {
        $res = new AppUser;

		return response()->json($res->forgot($Request->all()));
    }

    public function resetPassword(Request $Request)
    {
        $res = new AppUser;

		return response()->json($res->resetPassword($Request->all()));
    }

    public function checkoutData()
    {
        $cart   = Cart::where('cart_no',$_GET['cart_no'])->first();
        $store  = Store::find($cart->store_id);
        $plan   = new Plan;
        $offer  = new Offer;

        //Subscription start date
        $dates  = [];
		$d      = date("d-M-Y",strtotime(date("Y-m-d")." + 1 day"));
        $array  = explode(",",$store->working_day);

		for($i  = 2;$i<10;$i++)
		{
            $day = date("l",strtotime($d));

			if(in_array($day,$array))
            {
                array_push($dates,date("d-M-Y D",strtotime($d)));
            }

            $d = date('d-M-Y',strtotime(date('Y-m-d').' + '.$i.' days'));
		}
        
        
        $data = [
        
        'time'          => $plan->getAppData(),
        'cart'          => $cart->getCart($_GET['cart_no']),
        'dates'         => $dates,
        'store'         => $store,
        'working_day'   => $array,
        'address'       => Address::where('user_id',$_GET['user_id'])->where('active',0)->get(),
        'stripe_id'     => User::find(1)->stripe_key,
        'user'          => AppUser::find($_GET['user_id']),
        'offer'         => $offer->getAppData($store->id)

        ];

		return response()->json(['data' => $data]);
    }

    public function saveAddress(Request $Request)
    {
        $res = new Address;

		return response()->json($res->addNew($Request->all()));
    }

    public function getAddress()
    {
		return response()->json(['data' => Address::where('user_id',$_GET['user_id'])->where('active',0)->get()]);
    }

    public function getAmount(Request $Request)
    {
        $cart = new Cart;

		return response()->json($cart->getAmount($Request->all()));
    }

    public function updateDays(Request $Request)
    {
        $cart = new Cart;

		return response()->json($cart->updateDays($Request->all()));
    }

    public function updateWallet(Request $Request)
    {
        $res = new AppUser;

        return response()->json($res->updateWallet($Request->all()));
    }

    public function subscription()
    {
        $detail = new OrderDetail;

        return response()->json(['data' => $detail->getAppData()]);
    }

    public function mark(Request $Request)
    {
        $res = new OrderDates;

        return response()->json(['data' => $res->mark($Request->all())]);
    }

    public function undo()
    {
        $res = new OrderDates;

        return response()->json($res->undo());
    }

    public function account()
    {
        $user = AppUser::find($_GET['user_id']);
        
        $data = [
        
        'user'  => AppUser::find($_GET['user_id']),
        'admin' => User::find(1),
        'img'   => $user->img ? Asset('upload/user/'.$user->img) : null

        ];
        return response()->json(['data' => $data]);
    }

    public function deleteAccount()
    {
        AppUser::where('id',$_GET['user_id'])->update(['status' => 0]);

        return response()->json(['data' => true]);
    }

    public function deleteAddress()
    {
        Address::where('user_id',$_GET['user_id'])->where('id',$_GET['id'])->update(['active' => 1]);

        return response()->json(['data' => Address::where('user_id',$_GET['user_id'])->where('active',0)->get()]);
    }

    public function updateData(Request $Request)
    {
        $res = new AppUser;

        return response()->json($res->updateData($Request->all()));
    }

    public function stop()
    {
        $res = new OrderDates;

        $res->stop();

        return response()->json(['data' => true]); 
    }

    public function renew()
    {
        $res = new OrderDetail;

        $res->renew();
    }

    public function customCart(Request $Request)
    {
        $res = new Cart;

        $res->customCart($Request->all());

        return response()->json(['data' => true]); 
    }

    public function review(Request $Request)
    {
        $res = new Rating;

        $res->addNew($Request->all());

        return response()->json(['data' => true]); 
    }

    public function search()
    {
        $res = new Tifin;

        return response()->json(['data' => $res->search()]); 
    }

    public function language()
    {
        $res = new Language;
        
		return response()->json(['data' => $res->getWithEng("user")]);
    }

    public function page()
    {
        $res = new Page;

		return response()->json(['data' => $res->getAppData()]);
    }

    public function contact(Request $Request)
    {
        $email = User::find(1)->email;
        $name  = $Request->get('name');

        Mail::send('home.contact',['data' => $Request->all(),], function($message) use($email,$name)
        {     
            $message->to($email)->subject("Tifin Box - Contact us email from ".$name);                        
        });

        return response()->json(['data' => true]);
    }
}
