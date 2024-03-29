<?php 
namespace model; 
class students { 
    public static function create(array $data) 
    {
        $new = \ORM::for_table("students")->create();
        $new->delete_flag = 0;
        
            $new->name = $data["name"];
            
            $new->user = $data["user"];
            
            $new->password = $data["password"];
            
            $new->phone = $data["phone"];
            
            $new->groups_id = $data["groups_id"];
            
            $new->levels_id = $data["levels_id"];
            
        if ($new->save()) {
            return true;
        }else{
            return false;
        }
    }

    public static function update(array $data) 
    {
        $update = \ORM::for_table("students")->find_one([$data["id"]]);
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
        return \ORM::for_table("students")->findArray();
    }

    public static function find(array $data) 
    {
        return \ORM::for_table("students")->where('id', $data["id"])->find_array();
    }
    
    public static function disactive(int $id)
    {
        $delete = \ORM::for_table("students")->find_one([$id]);
        if (is_bool($delete)) {
            return false ;
        }
        $delete->set("delete_flag", 1);
        if ($delete->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function active(int $id)
    {
        $delete = \ORM::for_table("students")->find_one([$id]);
        if (is_bool($delete)) {
            return false ;
        }
        $delete->set("delete_flag", 0);
        if ($delete->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete(int $id)
    {
        $student = \ORM::for_table("students")->find_one([$id]);
        $student->delete();
        if ($student->save()) {
            return true;
        } else {
            return false;
        }
    }
                
    public static function check(array $data)
    {
        $dash = \ORM::for_table('students')->where_any_is(
            array(
                array('user' => $data['user'], 'password' => $data['password']),
                array('phone' => $data['user'], 'password' => $data['password'])
                
            )
        )->find_one();
        return $dash;
    }

                
}
