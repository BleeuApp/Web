<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Banner extends Authenticatable
{
    protected $table = 'banner';	
	
	 /*
    |--------------------------------------
    |Add/Update Data
    |--------------------------------------
    */
    public function addNew($data,$type)
    {
        $add                = $type === 'add' ? new Banner : Banner::find($type);
        $add->sort_no       = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->link_to       = isset($data['link_to']) ? $data['link_to'] : 0;
        $add->status        = isset($data['status']) ? $data['status'] : 0;
        $add->link          = isset($data['link']) ? $data['link'] : null;

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/banner/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll($type = "all")
    {
        return Banner::where(function($query) use($type){

        if($type != "all")
        {
            $query->where('status',$type);
        }

        })->orderBy('sort_no','ASC')->get();
    }

    public function getAppData()
    {
        $data = [];

        foreach($this->getAll(0) as $row)
        {
            $data[] = [

            'img'       => Asset('upload/banner/'.$row->img),
            'link_to'   => $row->link_to,
            'link'      => $row->link,

            ];
        }

        return $data;
    }
}
