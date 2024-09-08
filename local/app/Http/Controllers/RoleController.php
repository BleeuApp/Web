<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Role;
use DB;
use Validator;
use Redirect;
class RoleController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$role = new Role;
		
		$data = [
		
		'data'	 => $role->getAll(),
		'link'	 => 'role/'
		
		];
				
		return View('role.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('role.add',['data' => new Role]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Role;	
		$data->addNew($Request->all(),"add");

		return Redirect('role')->with('message','New Role Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('role.edit',['data' => Role::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Role::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('role')->with('message','Role Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Role::find($id)->delete();	
			
		return Redirect('role')->with('message','Role Deleted Successfully.');
	}
}
