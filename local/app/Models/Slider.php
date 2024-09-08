<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Slider extends Authenticatable
{
    protected $table = 'slider';	
	
	 /*
    |--------------------------------------
    |Add/Update Data
    |--------------------------------------
    */
    public function addNew($data,$type)
    {
        $add                = $type === 'add' ? new Slider : Slider::find($type);
        $add->sort_no       = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->text          = isset($data['text']) ? $data['text'] : null;

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/slider/", $filename);   
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
        return Slider::orderBy('sort_no','ASC')->get();
    }

    public function getAppData()
    {
        $data = [];

        foreach($this->getAll(0) as $row)
        {
            $data[] = [

            'img'       => Asset('upload/slider/'.$row->img),
            'text'      => $row->text,

            ];
        }

        return $data;
    }
}
