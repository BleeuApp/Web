<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;

class Tifin extends Authenticatable
{
    protected $table = 'tifin';	
	
	public function addNew($data,$type)
    {
        $a                  = isset($data['l_name']) ? array_combine($data['lid'], $data['l_name']) : [];
        $b                  = isset($data['l_desc']) ? array_combine($data['lid'], $data['l_desc']) : [];
        $add                = $type == "add" ? new Tifin : Tifin::find($type);
        $add->name          = isset($data['name']) ? $data['name'] : null;
        $add->text          = isset($data['text']) ? $data['text'] : null;
        $add->price         = isset($data['price']) ? $data['price'] : null;
        $add->sort_no       = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->type          = isset($data['type']) ? $data['type'] : 0;
        $add->status        = isset($data['status']) ? $data['status'] : 0;
        

        if(isset($_GET['store_id']))
        {
            $add->breakfast     = isset($data['array']) && in_array(1,$data['array']) ? 1 : 0;
            $add->lunch         = isset($data['array']) && in_array(2,$data['array']) ? 1 : 0;
            $add->dinner        = isset($data['array']) && in_array(3,$data['array']) ? 1 : 0;
            $add->store_id      = $_GET['store_id'];
        }
        else
        {
            $add->breakfast     = isset($data['breakfast']) ? $data['breakfast'] : 0;
            $add->lunch         = isset($data['lunch']) ? $data['lunch'] : 0;
            $add->dinner        = isset($data['dinner']) ? $data['dinner'] : 0;
            $add->s_data        = serialize([$a,$b]);
            $add->store_id      = Auth::guard('store')->user()->id;
        }

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/tifin/", $filename);   
            $add->img = $filename;   
        }

        $add->save();

        $inv = new Inv;
        $inv->addNew($data,$add->id);

        return $add->id;
    }

    public function getAll($type = "all")
    {
        return Tifin::where(function($query) use($type){

            if($type != "all")
            {
                $query->where('type',$type);
            }

            $query->where('display',0)->where('store_id',Auth::guard('store')->user()->id);

        })->orderBy('sort_no',"ASC")->get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);
 
        return isset($data[$field][$id]) ? $data[$field][$id] : null;
    }

    public function getItem($type = 0)
    {
        $res    = Tifin::where(function($query) use($type){

                        if($type != "all")
                        {
                            $query->where('type',$type);
                        }

                        })->where('store_id',$_GET['store_id'])
                        ->where('status',0)
                        ->where('display',0)
                        ->orderBy('sort_no','ASC')
                        ->get();

        $data   = [];
        $admin  = User::find(1);
        $rating = new Rating;
        foreach($res as $row)
        {
            $data[] = [
            
            'store_id'  => $row->store_id,
            'id'        => $row->id,
            'name'      => $this->getLang($row->id)['name'],
            'desc'      => $this->getLang($row->id)['desc'],
            'price'     => $row->price,
            'img'       => $row->img ? Asset('upload/tifin/'.$row->img): null,
            'breakfast' => $row->breakfast,
            'lunch'     => $row->lunch,
            'dinner'    => $row->dinner,
            'currency'  => $admin->currency,
            'subscribe' => OrderDetail::where('item_id',$row->id)->count(),
            'rating'    => $this->getRating($row->id),
            'ratings'   => $rating->getItemRating($row->id),
            'status'    => $row->status,
            'type'      => $row->type

            ];
        }

        return $data;
    }

    public function getRating($id)
    {
        $total = Rating::where('item_id',$id)->count();
        $sum   = Rating::where('item_id',$id)->sum('star');

        return $total > 0 ? round($sum/$total) : 0;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Tifin::find($id);

        if($lid == 0)
        {
            return ['name' => $data->name,'desc' => $data->text];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['name' => $data[0][$lid],'desc' => $data[1][$lid]];
        }
    }

    public function search()
    {
        $item  = [];
        $res   = Tifin::where('name','LIKE','%'.$_GET['q'].'%')->where('status',0)->where('display',0)->get();
        $admin = User::find(1);
        $rating = new Rating;

        foreach($res as $row)
        {
            $item[] = [
            
                'store_id'  => $row->store_id,
                'id'        => $row->id,
                'name'      => $this->getLang($row->id)['name'],
                'desc'      => $this->getLang($row->id)['desc'],
                'price'     => $row->price,
                'img'       => Asset('upload/tifin/'.$row->img),
                'currency'  => $admin->currency,
                'rating'    => $this->getRating($row->id),
                'ratings'   => $rating->getItemRating($row->id)
    
                ];
        }

        return ['item' => $item];
    }
}
