<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$outp = '{
    "records" : [
    {
        "name" : "Calculus",
        "semester" : "Fall",
        "year" : 2018,
        "credits" : 3,
        "grade" : 3.0
    },

    {
        "name" : "Programming",    
        "semester" : "Spring",
        "year" : 2018,
        "credits" : 5,
        "grade" : 3.3
    },

    {
        "name" : "English",
        "semester" : "Summer",
        "year" : 2018,
        "credits" : 3,
        "grade" : 3.7
    },
    {
        "name" : "History",
        "semester" : "Interim",
        "year" : 2017,
        "credits" : 3,
        "grade" : 2.7
    }
]
}';

echo($outp);
?>
