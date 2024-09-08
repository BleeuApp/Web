<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Offer extends Authenticatable
{
    protected $table = 'offer';	
	
	public function addNew($data,$type)
    {
        $a              = isset($data['lid']) ? array_combine($data['lid'], $data['l_desc']) : [];
        $add            = $type == "add" ? new Offer : Offer::find($type);
        $add->code      = isset($data['code']) ? $data['code'] : null;
        $add->text      = isset($data['text']) ? $data['text'] : null;
        $add->type      = isset($data['type']) ? $data['type'] : 0;
        $add->value     = isset($data['value']) ? $data['value'] : 0;
        $add->s_data    = serialize($a);
        $add->save();

        $offerStore = new OfferStore;
        $offerStore->addNew($data,$add->id);
    }

    public function getAll()
    {
        return Offer::get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);

        return isset($data[$id]) ? $data[$id] : null;
    }
    public function getAppData($id = 0)
    {
        $res = Offer::where(function($query) use($id){

                    if($id > 0)
                    {
                        $getId = OfferStore::where('store_id',$id)->pluck('offer_id')->toArray();

                        $query->whereIn('id',$getId);
                    }

                     })->where('status',0)->get();

        $data = [];

        foreach($res as $row)
        {
            $data[] = [
            
            'code'  => $row->code,
            'desc'  => $this->getLang($row->id)['desc'],
            'type'  => $row->type,
            'value' => $row->value

            ];
        }

        return $data;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Offer::find($id);

        if($lid == 0)
        {
            return ['desc' => $data->text];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['desc' => isset($data[$lid]) ? $data[$lid] : null];
        }
    }
}
