<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class OfferStore extends Authenticatable
{
    protected $table = 'offer_store';	
	
	public function addNew($data,$id)
    {
        OfferStore::where('offer_id',$id)->delete();

        $store_id = isset($data['store_id']) ? $data['store_id'] : [];

        for($i=0;$i<count($store_id);$i++)
        {
            $add            = new OfferStore;
            $add->offer_id  = $id;
            $add->store_id  = $store_id[$i];
            $add->save();
        }
    }
}
