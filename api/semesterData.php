<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$outp = '{
    "records" : [
    {
        "semester" : "Fall",
        "year" : 2018,
        "grade" : 3.0
    },

    {
        "semester" : "Spring",
        "year" : 2018,
        "grade" : 3.3
    },

    {
        "semester" : "Summer",
        "year" : 2018,
        "grade" : 3.7
    }
]
}';

echo($outp);
?>
