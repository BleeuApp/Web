<?php namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Models\Store;
use App\Models\Language;
use App\Models\Order;
use App\Models\User;
use App\Models\Paid;
use DB;
use Validator;
use Redirect;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return View('store_login.index',['form_url' => Asset('login')]);
    }

    /*
	|------------------------------------------------------------------
	|Login attempt,check username & password
	|------------------------------------------------------------------
	*/
	public function login(Request $request)
	{
		$username = $request->input('username');
		$password = $request->input('password');
		
		if (Auth::guard('store')->attempt(['email' => $username, 'password' => $password]))
		{
			return Redirect::to(env('store').'/home')->with('message', 'Welcome ! Your are logged in now.');
		}
		else
		{
			return Redirect::back()->with('error', 'Username password not match')->withInput();
		}
	}

	public function home()
	{
		$store = new Store;
		$order = new Order;
	
		return View('store_login.home.home',[
		
			'overview'  => $store->dashOverview(),
			'orders'    => $order->getAll(Auth::guard('store')->user()->id,10),
			'setting'   => User::find(1)

		]);
	}

	public function setting()
	{
		return view('store_login.home.setting');
	}

	public function update(Request $Request)
	{		
		$admin = new Store;
		$id    = Auth::guard('store')->user()->id;
		
		$count = Store::where('id','!=',$id)->where('phone',$Request->get('phone'))->count();

		if($count > 0)
		{
			return Redirect::back()->with('error','Sorry! This phone number is already exists.');
			exit;
		}

		$admin->addNew($Request->all(),$id);

		return Redirect::back()->with('message','Account Information Updated Successfully.');
	}

	public function setLang()
	{
		Session::put('locale', $_GET['lang']);
    		
		return Redirect::back()->with('message', 'Language Changed Successfully.');
	}

    public function logout()
	{
		Auth::guard('store')->logout();

		return Redirect(env('store').'/login')->with('error', 'Logout Successfully.');

	}

	public function paid()
	{
		return View('store_login.home.paid',['data' => Paid::where('store_id',Auth::guard('store')->user()->id)->orderBy('id','DESC')->get(),'c' => User::find(1)->currency]);
	}
}
