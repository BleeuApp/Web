<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Store;
use App\Models\Category;
use App\Models\StoreCate;
use App\Models\User;
use App\Models\Paid;
use DB;
use Validator;
use Redirect;
class storeController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$store = new Store;
		$cate  = new Category;
		
		$data = [
		
		'data'	 => $store->getAll(),
		'link'	 => 'store/',
		'cates'  => $cate->getAll()
		
		];
				
		return View('store.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('store.add',['data' => new Store,'admin' => true]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Store;
		
		$count = Store::where('phone',$Request->get('phone'))->count();

		if($count > 0)
		{
			return Redirect::back()->with('error','Sorry! This phone number is already exists.');
			exit;
		}

		$data->addNew($Request->all(),"add");

		return Redirect('store')->with('message','New store Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('store.edit',['data' => Store::find($id),'admin' => true]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Store::find($id);
		
		$count = Store::where('id','!=',$id)->where('phone',$Request->get('phone'))->count();

		if($count > 0)
		{
			return Redirect::back()->with('error','Sorry! This phone number is already exists.');
			exit;
		}
		
		$data->addNew($Request->all(),$id);

		return Redirect('store')->with('message','store Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Store::find($id)->delete();	
			
		return Redirect('store')->with('message','store Deleted Successfully.');
	}

    public function storeStatus()
    {
        $res            = Store::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect('store')->with('message','Store Status Changed Successfully.');

    }

	public function storeCate(Request $Request)
	{
		$cate = new StoreCate;

		$cate->addNew($Request->all());

		return Redirect::back()->with('message','Store Category Assigned Successfully.'); 
	}

	public function loginAsStore()
	{
		if(Auth::guard('store')->loginUsingId($_GET['id']))
		{
		   return Redirect::to(env('store').'/home')->with('message', 'Welcome ! Your are logged in now.');	
		}
		else
		{
			return Redirect::back()->with('error', 'Something went wrong.');
		}
	}

	public function trend()
	{
		$res 		= Store::find($_GET['id']);
		$res->trend = $res->trend == 0 ? 1 : 0; 
		$res->save();

		return Redirect::back()->with('message','Trend Status Updated Successfully.'); 
	}

	public function com()
	{
		$store = new Store;
		$cate  = new Category;
		
		$data = [
		
		'data'	   => $store->getAll(0),
		'link'	   => 'store/',
		'currency' => User::find(1)->currency
		];
				
		return View('store.com',$data);
	}

	public function paid()
	{
		return View('store.paid',['data' => Paid::where('store_id',$_GET['id'])->orderBy('id','DESC')->get(),'c' => User::find(1)->currency]);
	}

	public function _paid(Request $Request)
	{
		$res 				= new Paid;
		$res->store_id 		= $Request->get('id');
		$res->amount 		= $Request->get('amount');
		$res->date_added 	= $Request->get('date_added');
		$res->notes 		= $Request->get('notes');
		$res->save();

		return Redirect::back()->with('message','Updated successfully.');
	}

	public function paidDelete()
	{
		Paid::where('id',$_GET['id'])->delete();

		return Redirect::back()->with('message','Deleted successfully.');
	}

	public function createQr()
	{
		
		return View('store.qr',['data' => User::find(1)]);
	}
}
