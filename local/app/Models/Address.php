<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Address extends Authenticatable
{
    protected $table = 'address';	
	
	public function addNew($data)
    {
        if(isset($data['store_id']))
        {
            $store              = Store::find($data['store_id']); 

            if($store->max_km != 0 && $this->distance($store->lat,$store->lng,$data['lat'],$data['lng']) > $store->max_km)
            {
                return ['error' => 'Sorry! This service is not avilable in this address. Max delivery area '.$store->max_km.' KM'];
                exit;
            }
        }

        $add                = new Address;
        $add->user_id       = $data['user_id'];
        $add->address       = $data['address'];
        $add->floor         = isset($data['floor']) ? $data['floor'] : null;
        $add->landmark      = isset($data['landmark']) ? $data['landmark'] : null;
        $add->lat           = $data['lat'];
        $add->lng           = $data['lng'];
        $add->type          = $data['type'];
        $add->save();
        
        return ['latest' => $add,'all' => Address::where('user_id',$data['user_id'])->where('active',0)->get()];
    }

    public function distance($lat1, $lon1, $lat2, $lon2) 
    { 
        $pi80 = M_PI / 180; 
        $lat1 *= $pi80; 
        $lon1 *= $pi80; 
        $lat2 *= $pi80; 
        $lon2 *= $pi80; 
        $r = 6372.797; // mean radius of Earth in km 
        $dlat = $lat2 - $lat1; 
        $dlon = $lon2 - $lon1; 
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
        $km = $r * $c; 
        return ceil($km); 
    }
}
