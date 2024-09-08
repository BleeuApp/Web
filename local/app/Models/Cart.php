<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;
use Auth;

class Cart extends Authenticatable
{
    protected $table = 'cart';	
	
	public function addNew($data)
    {
        $this->checkStore($data);

        for($i=0;$i<$data['qty'];$i++)
        {
            $add                = new Cart;
            $add->store_id      = $data['store_id'];
            $add->cart_no       = $data['cart_no'];
            $add->item_id       = $data['item_id'];  
            $add->item_type     = $data['item_type'];  
            $add->days          = isset($data['days']) ? implode(",",$data['days']) : "Monday,Tuesday,Wednesday,Thursday,Friday,Saturday";  
            $add->qty           = 1;  
            $add->price         = $data['price'];
            $add->save();
        }
        
        return $this->countCart($data['cart_no']);
    }

    public function customCart($data)
    {
        $this->checkStore($data);

        $array = null;
        foreach($data['item'] as $row)
        {
            $item = Tifin::find($row['id']);

            $array .= $row['qty']." ".$item->name.", ";
        }

        $new = $this->addTempItem($data,$array);

        $add                = new Cart;
        $add->store_id      = $data['store_id'];
        $add->cart_no       = $data['cart_no'];
        $add->item_id       = $new->id; 
        $add->item_type     = $data['item_type'];  
        $add->qty           = 1;  
        $add->price         = $new->price;
        $add->save();
    }

    public function addTempItem($data,$text)
    {
        $add                = new Tifin;
        $add->name          = "Coustom Box";
        $add->text          = $text;
        $add->price         = $data['price'];
        $add->type          = 0;
        $add->display       = 1;
        $add->store_id      = $data['store_id'];
        $add->save();

        return $add;
    }

    public function checkStore($data)
    {
        $count = Cart::where('cart_no',$data['cart_no'])->orderBy('id','DESC')->first();

        if(isset($count->id))
        {    
            Cart::where('cart_no',$data['cart_no'])->where('store_id','!=',$data['store_id'])->delete();
        }
    }

    public function updateDays($data)
    {
        Cart::where('cart_no',$_GET['cart_no'])->update(['days' => ""]);
        
        foreach($data['days'] as $day)
        {
            $cart           = Cart::find($day['id']);
            $cart->days     = $cart->days ? $cart->days.",".$day['day'] : $day['day'];
            $cart->save();
        }

        foreach(Cart::where('cart_no',$_GET['cart_no'])->get() as $row)
        {
            $update         = Cart::find($row->id);
            $array          = explode(",",$row->days);
            $array          = array_unique($array);
            $update->days   = implode(",",$array);
            $update->save();
        }

        return ['data' => $data];
    }

    public function countCart($cart_no)
    {
        return $cart_no > 0 ? Cart::where('cart_no',$cart_no)->sum('qty') : 0;
    }

    public function getCart($cart_no)
    {
        if(isset($_GET['cart_remove_id']))
        {
            Cart::where('id',$_GET['cart_remove_id'])->delete();
        }

        $data  = [];
        $admin = User::find(1);
        $res  = Cart::join('tifin','cart.item_id','=','tifin.id')
                   ->select('cart.*','tifin.name','tifin.img')
                   ->where('cart.cart_no',$cart_no)
                   ->get();

        foreach($res as $row)
        {
            $item   = new Tifin;
            $data[] = [

            'id'        => $row->id,
            'item_id'   => $row->item_id,
            'name'      => $item->getLang($row->item_id)['name'],
            'desc'      => $item->getLang($row->item_id)['desc'],
            'img'       => Asset('upload/tifin/'.$row->img),
            'price'     => $row->price,
            'qty'       => $row->qty,
            'type'      => $this->getType($row->item_type),
            'currency'  => $admin->currency,
            'days'      => $row->days

            ];
        }

        return $data;
    }

    public function getDays()
    {
        $data = [];

        foreach(Cart::where('cart_no',$_GET['cart_no'])->get() as $cart)
        {
            foreach(explode(",",$cart->days) as $d)
            {
               if($d)
               {
                $data[] = ['day' => $d,'id' => $cart->id];
               }
            }
        }

        return $data;
    }

    public function getType($type)
    {
        if($type == 2)
        {
            $return = "Breakfast";
        }
        elseif($type == 3)
        {
            $return = "Lunch";
        }
        else
        {
            $return = "Dinner";
        }

        return $return;
    }

    public function getAmount($data)
    {
        $store      = Store::find($data['store_id']);
        $plan       = Plan::find($data['plan']);
        $start_date = explode(" ",$data['start_date'])[0];
        $end_date   = $this->getEndDate($plan,$start_date);
        $totalDays  = $this->getDayDiff($start_date,$end_date);

        //Delivery Dates
        $dates           = [];
		$sdate           = date("Y-m-d",strtotime($start_date));
		$start_date      = date("Y-m-d",strtotime($start_date));
        $store_days      = explode(",",$store->working_day);
        $cart            = $this->getCart($data['cart_no']);
        $summery         = [];
        $total           = [];
        
        foreach($cart as $c)
        {
            $cartArray = explode(",",$c['days']);
            $dates     = [];

            if(count($dates) == 0)
            {
                $d    = date('l',strtotime($start_date));

                if(in_array($d,$store_days) && in_array($d,$cartArray))
                {
                    array_push($dates,$start_date);
                }
            }

            for ($i = 1; $i < $totalDays; $i++) 
            {
                $start_date = date('Y-m-d', strtotime($start_date." +1 day"));
                $dayName    = date('l',strtotime($start_date));

                if(in_array($dayName,$store_days) && in_array($dayName,$cartArray))
                {
                    array_push($dates,$start_date);
                }
            }

            $start_date = $sdate;

            $total[]   = count($dates) * $c['price'];

            $summery[] = [
            
            'dates'         => $dates,
            'cart_id'       => $c['id'],
            'item'          => $c['name'],
            'item_id'       => $c['item_id'],
            'type'          => $c['type'],
            'price'         => $c['price'],
            'total_price'   => count($dates) * $c['price'],
            'start'         => date('d-M-Y',strtotime($sdate)),
            'end'           => date('d-M-Y',strtotime($end_date)),
            'dayCount'      => count($dates),
            'currency'      => $c['currency'],
            'days'          => $cartArray

            ];

            $dates = [];
        }

        $admin = User::find(1);

        return [
        
            'summery'       => $summery,
            'total'         => array_sum($total),
            'currency'      => $admin->currency,
            'c_code'        => $admin->currency_code,
            'start'         => $sdate,
            'end'           => $end_date,
            
        ];
    }

    public function getDayDiff($start_date,$end_date)
    {
        $start_timestamp = strtotime(date("Y-m-d",strtotime($start_date)));
        $end_timestamp   = strtotime($end_date);

        $diff_in_seconds = $end_timestamp - $start_timestamp;
        $diff_in_days    = floor($diff_in_seconds / (60 * 60 * 24));

        return $diff_in_days;
    }

    public function getEndDate($plan,$start_date)
    {
        if($plan->type == 1)
        {
            $end_date = date("Y-m-d",strtotime($start_date.' + '.$plan->value.' month'));
        }
        elseif($plan->type == 2)
        {
            $value    = $plan->value * 7; 
            $end_date = date("Y-m-d",strtotime($start_date.' + '.$value.' days'));
        }
        else
        {
            $end_date = date("Y-m-d",strtotime($start_date.' + '.$plan->value.' day'));
        }

        return $end_date;
    }

    public function getManualAmount($data)
    {
        $store      = Store::find(Auth::guard('store')->user()->id);
        $start_date = $data['start_date'];
        $end_date   = $data['valid_till'];
        $totalDays  = $this->getDayDiff($start_date,$end_date);

        //Delivery Dates
        $dates           = [];
		$sdate           = date("Y-m-d",strtotime($start_date));
        $store_days      = explode(",",$store->working_day);
        $summery         = [];
        $total           = [];
        
        for ($i = 1; $i < $totalDays; $i++) 
        {
            $start_date = date('Y-m-d', strtotime($start_date." +1 day"));
            $dayName    = date('l',strtotime($start_date));

            if(in_array($dayName,$store_days))
            {
                array_push($dates,$start_date);
            }
        }

        $item   = Tifin::find($data['item_id']);

        return [
            
            'dates'         => $dates,
            'item_id'       => $data['item_id'],
            'type'          => $data['type'],
            'price'         => $item->price,
            'total_price'   => count($dates) * $item->price,
            'dayCount'      => count($dates),
            'days'          => "Monday,Tuesday,Wednesday,Thursday,Friday"

            ];
    }
}
