<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Role;
use DB;
use Validator;
use Redirect;
class UserController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$user = new User;
		
		$data = [
		
		'data'	 => $user->getAll(),
		'link'	 => 'user/'
		
		];
				
		return View('user.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
        $role = new Role;

		return View('user.add',['data' => new User,'role' => $role->getAll()]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new User;
        
        $count = User::where('username',$Request->get('username'))->count();

        if($count > 0)
        {
            return Redirect::back()->with('error','This username is already exists.');

            exit;
        }

		$data->addNew($Request->all(),"add");

		return Redirect('user')->with('message','New user Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
        $role = new Role;

		return View('user.edit',['data' => User::find($id),'role' => $role->getAll()]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = User::find($id);	

        $count = User::where('id','!=',$id)->where('username',$Request->get('username'))->count();

        if($count > 0)
        {
            return Redirect::back()->with('error','This username is already exists.');

            exit;
        }

		$data->addNew($Request->all(),$id);

		return Redirect('user')->with('message','user Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = User::find($id)->delete();	
			
		return Redirect('user')->with('message','user Deleted Successfully.');
	}

	public function userStatus()
	{				
		$res 			= User::find($_GET['id']);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();
			
		return Redirect('user')->with('message','Status Updated Successfully.');
	}
}
