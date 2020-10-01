<?php
namespace model;

class studentExamAnswer
{
    public static function create(array $data)
    {
        $new = \ORM::for_table("studentExamAnswer")->create();
        $new->delete_flag = 0;
        
        $new->answer = $data["answer"];
            
        $new->mark = $data["mark"];
            
        $new->examsBank_id = $data["examsBank_id"];
            
        $new->students_id = $data["students_id"];
            
        if ($new->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update(array $data)
    {
        $update = \ORM::for_table("studentExamAnswer")->find_one([$data["id"]]);
        if (is_bool($update)) {
            return false ;
        }
        
        foreach ($data as $key => $value) {
            if ($key == "id") {
                continue;
            }
            $update->set($key, $value);
        }
        if ($update->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function select()
    {
        return \ORM::for_table("studentExamAnswer")->findArray();
    }

    public static function find(array $data)
    {
        return \ORM::for_table("studentExamAnswer")->find_one([$data["id"]]);
    }
    
    public static function delete(int $id)
    {
        $delete = \ORM::for_table("studentExamAnswer")->find_one([$id]);
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
}
