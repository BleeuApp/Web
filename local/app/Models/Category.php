<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Config;

class Category extends Authenticatable
{
    protected $table = 'category';	
	
	public function addNew($data,$type)
    {
        $a              = isset($data['lid']) ? array_combine($data['lid'], $data['l_name']) : [];
        $add            = $type == "add" ? new Category : Category::find($type);
        $add->name      = isset($data['name']) ? $data['name'] : null;
        $add->sort_no   = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->status    = isset($data['status']) ? $data['status'] : 0;
        $add->s_data    = serialize($a);


        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/category/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    public function getAll($type = "all")
    {
        return Category::where(function($query) use($type){

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

            'id'    => $row->id,
            'name'  => $this->getLang($row->id)['name'],
            'img'   => Asset('upload/category/'.$row->img)

            ];
        }

        return $data;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Category::find($id);

        if($lid == 0)
        {
            return ['name' => $data->name];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['name' => isset($data[$lid]) ? $data[$lid] : null];
        }
    }
}
