<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Plan;
use DB;
use Validator;
use Redirect;
class PlanController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$plan = new Plan;
		
		$data = [
		
		'data'	 => $plan->getAll(),
		'link'	 => 'plan/'
		
		];
				
		return View('plan.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('plan.add',['data' => new plan]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Plan;	
		$data->addNew($Request->all(),"add");

		return Redirect('plan')->with('message','New plan Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('plan.edit',['data' => Plan::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Plan::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('plan')->with('message','plan Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Plan::find($id)->delete();	
			
		return Redirect('plan')->with('message','plan Deleted Successfully.');
	}

    public function planStatus()
    {
        $res            = Plan::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect('plan')->with('message','plan Status Changed Successfully.');

    }
}
