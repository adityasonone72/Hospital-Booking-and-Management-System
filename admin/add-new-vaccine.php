<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Doctor</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");

    $email = $_SESSION["user"];
    //echo($email);
    $hosid1 = $database->query("select hosid from hospitals where email = '$email';");
    for ($y=0;$y<$hosid1->num_rows;$y++){
        $row00 = $hosid1->fetch_assoc();
        $hosid = $row00["hosid"];
    }
    ;

    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from vaccines");
        $vid=$_POST['vid'];
        $vname=$_POST['vname'];
        $quantity=$_POST['quantity'];
        $expiry_date=$_POST['expiry_date'];
        
        // $result= $database->query("select * from vaccines where vid='$vid';");
        //     if($result->num_rows==1){
        //         $error='1';
            // }else
            // {

                $sql1="insert into vaccines(vname,hosid,quantity,expiry_date) values('$vname','$hosid','$quantity','$expiry_date');";
                //$sql2="insert into webuser values('$email','d')";
                $database->query($sql1);
                //$database->query($sql2);

                //echo $sql1;
                //echo $sql2;
                $error= '4';
                
            // }


        // if ($password==$cpassword){
        //     $error='3';
        //     $result= $database->query("select * from doctors where docEmail='$docEmail';");
        //     if($result->num_rows==1){
        //         $error='1';
        //     }else{

        //         $sql1="insert into doctor(docEmail,doctorName,contactno,specilization) values('$docEmail','$name','$tele',$spec);";
        //         //$sql2="insert into webuser values('$email','d')";
        //         $database->query($sql1);
        //         //$database->query($sql2);

        //         //echo $sql1;
        //         //echo $sql2;
        //         $error= '4';
                
        //     }
            
        // }else{
        //     $error='2';
        // }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: doctors.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>