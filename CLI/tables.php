<?php
return $tables = [
    'levels'=>'
        name VARCHAR(255) NOT NULL,
    ',
    'groups'=>'
        name VARCHAR(255) NOT NULL,
        group_data VARCHAR(255) NOT NULL,
        levels_id INT( 11 ) NOT NULL,
    ',
    'examsBank'=>'
        question TEXT(255) NOT NULL,
        c1 VARCHAR(255) NOT NULL,
        c2 VARCHAR(255) NOT NULL,
        c3 VARCHAR(255) NOT NULL,
        c4 VARCHAR(255) NOT NULL,
        mark VARCHAR(255) NOT NULL,
        levels_id INT( 11 ) NOT NULL,
    ',
    'memberShip'=>'
        month VARCHAR(255) NOT NULL, 
        groups_id INT( 11 ) NOT NULL,
        students_id INT( 11 ) NOT NULL,
    ',
    'absent'=>'
        absent_date DATE,
        groups_id INT( 11 ) NOT NULL,
        students_id INT( 11 ) NOT NULL,
    ',
    'admins'=>'
        user VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(255) NOT NULL,  
    ',
    'students'=>'
        name VARCHAR(255) NOT NULL,
        user VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL, 
        groups_id INT( 11 ) NOT NULL,
    ',
    'exam'=>'
        name VARCHAR(255) NOT NULL,
        exam_date DATE,
        TimePerMin INT( 11 ) NULL,
    ',
    'examQuestions'=>'
        exam_id INT( 11 ) NOT NULL,
        examsBank_id INT( 11 ) NOT NULL,
        TimePerMin INT( 11 ) NULL,
    ',
    'studentExamAnswer'=>'
        answer VARCHAR(255) NOT NULL,
        mark VARCHAR(255) NOT NULL,
        examsBank_id INT( 11 ) NOT NULL,
        students_id INT( 11 ) NOT NULL,
    '
];