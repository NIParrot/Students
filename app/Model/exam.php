<?php 
namespace model; 
class exam { 
    public static function create(array $data) 
    {
        $new = \ORM::for_table("exam")->create();
        $new->delete_flag = 0;
        
            $new->name = $data["name"];
            
            $new->exam_date = $data["exam_date"];
            
            $new->TimePerMin = $data["TimePerMin"];
            
            $new->numberOfQuestion = $data["numberOfQuestion"];
            
        if ($new->save()) {
            return true;
        }else{
            return false;
        }
    }

    public static function update(array $data) 
    {
        $update = \ORM::for_table("exam")->find_one([$data["id"]]);
        if(is_bool($update)) return false ;
        
        foreach ($data as $key => $value) {
            if ($key == "id") continue;
            $update->set($key,$value);
        }
        if($update->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function select() 
    {
        return \ORM::for_table("exam")->findArray();
    }

    public static function find(array $data) 
    {
        return \ORM::for_table("exam")->where('id', $data["id"])->find_array();
    }
    
    public static function delete(int $id) 
    {
        $delete = \ORM::for_table("exam")->find_one([$id]);
        if(is_bool($delete)) return false ;
        $delete->set("delete_flag",1);
        if ($delete->save()) {
            return true;
        }else{
            return false;
        }
    }
                
}
