<?php
return $tables = [
    'levels'=>'
        name VARCHAR(255) NOT NULL,
    ',
    'groups'=>'
        name VARCHAR(255) NOT NULL,
        levels_id INT( 11 ) NOT NULL,
    ',
    'examsBank'=>'
        question TEXT(255) NOT NULL,
        c1 VARCHAR(255) NOT NULL,
        c2 VARCHAR(255) NOT NULL,
        c3 VARCHAR(255) NOT NULL,
        c4 VARCHAR(255) NOT NULL,
        levels_id INT( 11 ) NOT NULL,
        units_id INT( 11 ) NOT NULL,
        lessons_id INT( 11 ) NOT NULL,
    ',
    'memberShip'=>'
        month1 VARCHAR(255) NOT NULL, 
        month2 VARCHAR(255) NOT NULL,
        month3 VARCHAR(255) NOT NULL, 
        month4 VARCHAR(255) NOT NULL,
        month5 VARCHAR(255) NOT NULL,
        month6 VARCHAR(255) NOT NULL,
        month7 VARCHAR(255) NOT NULL,
        month8 VARCHAR(255) NOT NULL,
        month9 VARCHAR(255) NOT NULL,
        month10 VARCHAR(255) NOT NULL,
        month11 VARCHAR(255) NOT NULL,
        month12 VARCHAR(255) NOT NULL,
        students_id INT( 11 ) NOT NULL,
    ',
    'absent'=>'
        forupdate INT( 11 ) NOT NULL,
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
        levels_id INT( 11 ) NOT NULL,
    ',
    'exam'=>'
        name VARCHAR(255) NOT NULL,
        exam_date DATE,
        TimePerMin INT( 11 ) NULL,
        numberOfQuestion INT( 11 ) NULL,
    ',
    'examQuestions'=>'
        exam_id INT( 11 ) NOT NULL,
        examsBank_id INT( 11 ) NOT NULL,
        TimePerMin INT( 11 ) NULL,
        mark INT( 11 ) NOT NULL,
    ',
    'studentExamAnswer'=>'
        answer VARCHAR(255) NOT NULL,
        examsBank_id INT( 11 ) NOT NULL,
        students_id INT( 11 ) NOT NULL,
    ',
    'units' => '
        name VARCHAR(255) NOT NULL,
        levels_id INT( 11 ) NOT NULL,
    ',
    'lessons' => '
        name VARCHAR(255) NOT NULL,
        levels_id INT( 11 ) NOT NULL,
        units_id INT( 11 ) NOT NULL,
    ',
    'results'=>'
        exam_id INT( 11 ) NOT NULL,
        students_id INT( 11 ) NOT NULL,
        mark INT( 11 ) NOT NULL,
        fullMark INT( 11 ) NOT NULL,
    '

];