<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Language;
use App\Models\AppUser;
use App\Models\Trans;
use App\Models\Page;
use App\Models\Tifin;
use App\Models\Store;
use DB;
use Validator;
use Redirect;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return View('index',['form_url' => Asset('login')]);
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
		
		if (Auth::attempt(['username' => $username, 'password' => $password]))
		{
			return Redirect::to('home')->with('message', 'Welcome ! Your are logged in now.');
		}
		else
		{
			return Redirect::to('login')->with('error', 'Username password not match')->withInput();
		}
	}

	public function home()
	{
		$res = User::find(1);

		return View('home.home',[

		'overview' => $res->overview(),
		'setting'  => $res,
		'chart'    => $res->getChart()

		]);
	}

	public function setting()
	{
		return view('home.setting');
	}

	public function update(Request $Request)
	{		
		$admin = new User;

		if($admin->matchPassword($Request->get('current_password')))
		{
			return Redirect::back()->with('error','Opps! Your current password is not match.');
		}
		else
		{
			$admin->updateData($Request->all());

			return Redirect::back()->with('message','Account Information Updated Successfully.');
		}
	}

	public function setLang()
	{
		Session::put('locale', $_GET['lang']);
    		
		return Redirect::back()->with('message', 'Language Changed Successfully.');
	}

	public function logout()
	{
		Auth::logout();

		return Redirect('login')->with('error', 'Logout Successfully.');

	}

	public function appuser()
	{
		return View('home.appuser',['data' => AppUser::orderBy('uid','DESC')->get()]);
	}

	public function appuserStatus()
	{
		$res = AppUser::find($_GET['id']);
		$res->status = $res->status == 0 ? 1 : 0;
		$res->save();

		return Redirect::back()->with('message','Status changed successfully.');
	}

	public function userEdit()
	{
		return View('home.edit',['data' => AppUser::find($_GET['id'])]);
	}

	public function _userEdit(Request $Request)
	{
		$res                = AppUser::find($_GET['id']);
        $res->name          = $Request->get('name');
        $res->phone         = $Request->get('name');
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

        return Redirect('appuser')->with('message','Updated successfully');
	}

	public function page()
	{
		return View('home.page',['data' => Page::find(1)]);
	}

	public function _page(Request $Request)
	{
		$res = new Page;

		$res->addNew($Request->all());

        return Redirect::back()->with('message','Text updated successfully');
	}

	public function key()
	{
		return View('key');
	}

	public function verifyKey()
	{
		return View('verifyKey');
	}

	public function _verifyKey(Request $Request)
	{
		return View('key');
	}
}
