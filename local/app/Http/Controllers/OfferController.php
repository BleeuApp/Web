<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Offer;
use App\Models\Store;
use App\Models\OfferStore;
use DB;
use Validator;
use Redirect;
class OfferController extends Controller {
	
	/*
	|---------------------------------
	|Index page showing all data
	|----------------------------------
	*/
	public function index()
	{
		$offer = new Offer;
		
		$data = [
		
		'data'	 => $offer->getAll(),
		'link'	 => 'offer/'
		
		];
				
		return View('offer.index',$data);
	}
	
	/*
	|---------------------------------
	|Add new page
	|----------------------------------
	*/
	public function show()
	{				
        $store = new Store;

		return View('offer.add',['data' => new Offer,'store' => $store->getAll(),'array' => []]);
	}
	
	/*
	|---------------------------------
	|Add new page, Save in DB
	|----------------------------------
	*/
	public function store(Request $Request)
	{				
		$data = new Offer;	
		$data->addNew($Request->all(),"add");

		return Redirect('offer')->with('message','New offer Added Successfully.');
	}
	
	/*
	|---------------------------------
	|Edit Page
	|----------------------------------
	*/
	public function edit($id)
	{				
        $store = new Store;
        $array = OfferStore::where('offer_id',$id)->pluck('store_id')->toArray();

		return View('offer.edit',['data' => Offer::find($id),'store' => $store->getAll(),'array' => $array]);
	}
	
	/*
	|---------------------------------
	|Edit Update Data in DB
	|----------------------------------
	*/
	public function update(Request $Request,$id)
	{				
		$data       = Offer::find($id);	
		$data->addNew($Request->all(),$id);

		return Redirect('offer')->with('message','offer Updated Successfully.');
	}
	
	/*
	|---------------------------------
	|Delete Data
	|----------------------------------
	*/
	public function delete($id)
	{				
		$data = Offer::find($id)->delete();	
			
		return Redirect('offer')->with('message','offer Deleted Successfully.');
	}

	public function offerStatus()
    {
        $res            = Offer::find($_GET['id']);
        $res->status    = $res->status == 0 ? 1 : 0;
        $res->save();

		return Redirect('offer')->with('message','Offer Status Changed Successfully.');

    }
}
