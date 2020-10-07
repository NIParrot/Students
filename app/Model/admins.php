<?php 
namespace model; 
class admins { 
    public static function create(array $data) 
    {
        $new = \ORM::for_table("admins")->create();
        $new->delete_flag = 0;
        
            $new->user = $data["user"];
            
            $new->password = $data["password"];
            
            $new->role = $data["role"];
            
        if ($new->save()) {
            return true;
        }else{
            return false;
        }
    }

    public static function update(array $data) 
    {
        $update = \ORM::for_table("admins")->find_one([$data["id"]]);
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
        return \ORM::for_table("admins")->findArray();
    }

    public static function find(array $data) 
    {
        return \ORM::for_table("admins")->where('id', $data["id"])->find_array();
    }
    
    public static function delete(int $id) 
    {
        $delete = \ORM::for_table("admins")->find_one([$id]);
        if(is_bool($delete)) return false ;
        $delete->set("delete_flag",1);
        if ($delete->save()) {
            return true;
        }else{
            return false;
        }
    }

    public static function check(array $data)
    {
        $dash = \ORM::for_table('admins')->where(
            array('user' => $data['user'], 'password' => $data['password'])
        )->find_one();
        return $dash;
    }
                
}
