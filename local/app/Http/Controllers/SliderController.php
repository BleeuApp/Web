<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Slider;
use DB;
use Validator;
use Redirect;
class SliderController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$slider = new Slider;
		
		$data = [
		
		'data'	 => $slider->getAll(),
		'link'	 => 'slider/'
		
		];
				
		return View('slider.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('slider.add',['data' => new Slider]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Slider;	
		$data->addNew($Request->all(),"add");

		return Redirect('slider')->with('message','New slider Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('slider.edit',['data' => Slider::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Slider::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('slider')->with('message','slider Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Slider::find($id)->delete();	
			
		return Redirect('slider')->with('message','slider Deleted Successfully.');
	}
}
