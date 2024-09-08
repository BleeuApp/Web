<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use DB;
use Validator;
use Redirect;
class CategoryController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$category = new Category;
		
		$data = [
		
		'data'	 => $category->getAll(),
		'link'	 => 'category/'
		
		];
				
		return View('category.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
		return View('category.add',['data' => new Category]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Category;	
		$data->addNew($Request->all(),"add");

		return Redirect('category')->with('message','New category Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
		return View('category.edit',['data' => Category::find($id)]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Category::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('category')->with('message','category Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Category::find($id)->delete();	
			
		return Redirect('category')->with('message','category Deleted Successfully.');
	}

    public function categoryStatus()
    {
        $res            = Category::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect('category')->with('message','category Status Changed Successfully.');

    }
}
