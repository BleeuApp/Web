<?php namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Delivery;
use App\Models\Withdraw;
use DB;
use Validator;
use Redirect;
class DeliveryController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$delivery = new Delivery;
		
		$data = [
		
		'data'	 => $delivery->getAll(),
		'link'	 => 'delivery/'
		
		];
				
		return View('store_login.delivery.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('store_login.delivery.add',['data' => new Delivery]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{	
        $count = Delivery::where('phone',$Request->get('phone'))->count();

		if($count > 0)
		{
			return Redirect::back()->with('error','Sorry! This phone number is already exists.');
			exit;
		}
        
		$data = new Delivery;	
		$data->addNew($Request->all(),"add");

		return Redirect(env('store').'/delivery')->with('message','New delivery Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('store_login.delivery.edit',['data' => Delivery::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{	
        $count = Delivery::where('id','!=',$id)->where('phone',$Request->get('phone'))->count();

		if($count > 0)
		{
			return Redirect::back()->with('error','Sorry! This phone number is already exists.');
			exit;
		}

		$data       = Delivery::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect(env('store').'/delivery')->with('message','delivery Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		
        $data = Delivery::find($id)->delete();	
			
		return Redirect(env('store').'/delivery')->with('message','delivery Deleted Successfully.');
	}

    public function deliveryStatus()
    {
        $res            = Delivery::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect(env('store').'/delivery')->with('message','delivery Status Changed Successfully.');

    }

    public function onlineStatus()
    {
        $res            = Delivery::find($_GET['id']);
        $res->online    = $res->online == 0 ? 1 : 0;
        $res->save();

		return Redirect(env('store').'/delivery')->with('message','delivery Status Changed Successfully.');

    }

	public function withdraw()
	{
		$res = new Withdraw;

		return View('store_login.delivery.withdraw',['data' => $res->getAllRequest()]);
	}

	public function withdrawStatus()
	{
		$res 			= Withdraw::find($_GET['id']);
		$res->status 	= $_GET['status'];
		$res->save();

		return Redirect::back()->with('message','Status changed successfully.');
	}
}
