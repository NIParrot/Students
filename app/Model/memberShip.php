<?php 
namespace model; 
class memberShip { 
    public static function create(array $data) 
    {
        $new = \ORM::for_table("memberShip")->create();
        $new->delete_flag = 0;
        
            $new->month1 = $data["month1"];
            
            $new->month2 = $data["month2"];
            
            $new->month3 = $data["month3"];
            
            $new->month4 = $data["month4"];
            
            $new->month5 = $data["month5"];
            
            $new->month6 = $data["month6"];
            
            $new->month7 = $data["month7"];
            
            $new->month8 = $data["month8"];
            
            $new->month9 = $data["month9"];
            
            $new->month10 = $data["month10"];
            
            $new->month11 = $data["month11"];
            
            $new->month12 = $data["month12"];
            
            $new->students_id = $data["students_id"];
            
        if ($new->save()) {
            return true;
        }else{
            return false;
        }
    }

    public static function update(array $data) 
    {
        $update = \ORM::for_table("memberShip")->find_one([$data["id"]]);
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
        return \ORM::for_table("memberShip")->findArray();
    }

    public static function find(array $data) 
    {
        return \ORM::for_table("memberShip")->where('id', $data["id"])->find_array();
    }
    
    public static function delete(int $id) 
    {
        $delete = \ORM::for_table("memberShip")->find_one([$id]);
        if(is_bool($delete)) return false ;
        $delete->set("delete_flag",1);
        if ($delete->save()) {
            return true;
        }else{
            return false;
        }
    }
                
}
