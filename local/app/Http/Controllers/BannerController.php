<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Banner;
use DB;
use Validator;
use Redirect;
class BannerController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$banner = new Banner;
		
		$data = [
		
		'data'	 => $banner->getAll(),
		'link'	 => 'banner/'
		
		];
				
		return View('banner.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('banner.add',['data' => new Banner]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Banner;	
		$data->addNew($Request->all(),"add");

		return Redirect('banner')->with('message','New Banner Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('banner.edit',['data' => Banner::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Banner::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('banner')->with('message','Banner Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Banner::find($id)->delete();	
			
		return Redirect('banner')->with('message','Banner Deleted Successfully.');
	}

    public function bannerStatus()
    {
        $res            = Banner::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect('banner')->with('message','Banner Status Changed Successfully.');

    }
}
