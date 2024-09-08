<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Plan extends Authenticatable
{
    protected $table = 'plan';	
	
	public function addNew($data,$type)
    {
        $a                      = isset($data['lid']) ? array_combine($data['lid'], $data['l_name']) : [];
        $add                    = $type == "add" ? new Plan : Plan::find($type);
        $add->title             = isset($data['title']) ? $data['title'] : null;
        $add->type              = isset($data['type']) ? $data['type'] : 1;
        $add->value             = isset($data['value']) ? $data['value'] : 1;
        $add->rec_payment       = isset($data['rec_payment']) ? $data['rec_payment'] : 0;
        $add->sort_no           = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->status            = isset($data['status']) ? $data['status'] : 0;
        $add->s_data            = serialize($a);
        $add->save();
    }

    public function getAll($type = "all")
    {
        return Plan::where(function($query) use($type){

            if($type != "all")
            {
                $query->where('status',$type);
            }

        })->orderBy('sort_no',"ASC")->get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);

        return isset($data[$id]) ? $data[$id] : null;
    }

    public function getAppData()
    {
        $data = [];

        foreach($this->getAll(0) as $row)
        {
            $data[] = [

            'id'            => $row->id,
            'title'         => $this->getLang($row->id)['name'],
            'type'          => $row->type,
            'value'         => $row->value,
            'rec_payment'   => $row->rec_payment

            ];
        }

        return $data;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Plan::find($id);

        if($lid == 0)
        {
            return ['name' => $data->title];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['name' => isset($data[$lid]) ? $data[$lid] : null];
        }
    }
}
