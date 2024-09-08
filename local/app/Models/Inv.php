<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;

class Inv extends Authenticatable
{
    protected $table = 'tifin_inv';	
	
	public function addNew($data,$id)
    {
        Inv::where('item_id',$id)->delete();

        $name = isset($data['item_name']) ? $data['item_name'] : [];
        $qty  = isset($data['item_qty']) ? $data['item_qty'] : [];

        for($i=0;$i<count($name);$i++)
        {
           if(isset($name[$i]))
           {
            $add            = new Inv;
            $add->item_id   = $id;
            $add->name      = $name[$i];
            $add->qty       = $qty[$i];
            $add->save();
           }
        }
    }

    public function getChart()
    {
        $itemID = OrderDates::join('order_detail','order_dates.detail_id','=','order_detail.id')
                         ->where('order_dates.delivery_date',$_GET['date'])
                         ->pluck('item_id')->toArray();
    
       $sum  = [];
       $data = [];

       foreach(array_unique($itemID) as $id)
       {
            $name   = Inv::where('item_id',$id)->pluck('name')->toArray();
            $sum    = [];
            foreach(array_unique($name) as $n)
            {
                $total = OrderDates::join('order_detail','order_dates.detail_id','=','order_detail.id')
                         ->where('order_dates.delivery_date',$_GET['date'])
                         ->where('order_detail.item_id',$id)->count();

                $sum[] = ['name' => $n,'sum' => Inv::where('item_id',$id)->where('name',$n)->sum('qty') * $total];
            }

            $data[] = ['tiffin' => Tifin::find($id)->name,'item' => $sum];

            unset($sum);
       }

       return $data;
    }
}
