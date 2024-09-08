<?php namespace App\Http\Controllers\Store;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Tifin;
use App\Models\Inv;
use DB;
use Validator;
use Redirect;
class TifinController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$tifin = new Tifin;
		
		$data = [
		
		'data'	 => $tifin->getAll(),
		'link'	 => 'tifin/'
		
		];
				
		return View('store_login.tifin.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('store_login.tifin.add',['data' => new Tifin]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Tifin;	
		$data->addNew($Request->all(),"add");

		return Redirect(env('store').'/tifin')->with('message','New tifin Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('store_login.tifin.edit',['data' => Tifin::find($id),'inv' => Inv::where('item_id',$id)->get()]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Tifin::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect(env('store').'/tifin')->with('message','tifin Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Tifin::find($id)->delete();	
			
		return Redirect(env('store').'/tifin')->with('message','tifin Deleted Successfully.');
	}

    public function tifinStatus()
    {
        $res            = Tifin::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect(env('store').'/tifin')->with('message','tifin Status Changed Successfully.');

    }
}
