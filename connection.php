<?php

    $database= new mysqli("localhost","root","","covid_shelter2");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>