<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Language;
use DB;
use Validator;
use Redirect;
class LanguageController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$language = new Language;
		
		$data = [
		
		'data'	 => $language->getAll(),
		'link'	 => 'language/'
		
		];
				
		return View('language.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('language.add',['data' => new Language]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Language;	
		$data->addNew($Request->all(),"add");

		return Redirect('language')->with('message','New language Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('language.edit',['data' => Language::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Language::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('language')->with('message','language Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Language::find($id)->delete();	
			
		return Redirect('language')->with('message','language Deleted Successfully.');
	}

    public function languageStatus()
    {
        $res            = Language::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect('language')->with('message','language Status Changed Successfully.');

    }
}
