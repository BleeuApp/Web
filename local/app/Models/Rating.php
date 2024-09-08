<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Rating extends Authenticatable
{
    protected $table = 'rating';
    
    public function canRate($user_id,$item_id,$store_id)
    {
        $item  = Rating::where('user_id',$user_id)->where('item_id',$item_id)->count();
        $store = Rating::where('user_id',$user_id)->where('store_id',$store_id)->count();

        return ['item' => $item == 0 ? true : false,'store' => $store == 0 ? $store_id : 0];
    }

    public function addNew($data)
    {
        $add                = new Rating;
        $add->user_id       = $data['user_id']; 
        $add->item_id       = $data['item_id']; 
        $add->star          = $data['star']; 
        $add->comment       = $data['comment']; 
        $add->save();

        if($data['store_id'] > 0)
        {
            $sadd                = new Rating;
            $sadd->user_id       = $data['user_id']; 
            $sadd->store_id      = $data['store_id']; 
            $sadd->star          = $data['srating']; 
            $sadd->comment       = $data['scomment']; 
            $sadd->save();
        }
    }

    public function getItemRating($id)
    {
        return Rating::join('app_user','rating.user_id','=','app_user.id')
                     ->select('app_user.name','rating.*')
                     ->where('rating.item_id',$id)
                     ->orderBy('rating.id','DESC')
                     ->get();
    }

    public function getStoreRating($id)
    {
        return Rating::join('app_user','rating.user_id','=','app_user.id')
                     ->select('app_user.name','rating.*')
                     ->where('rating.store_id',$id)
                     ->orderBy('rating.id','DESC')
                     ->get();
    }
}
