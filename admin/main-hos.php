<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" href="../css/cards23.css">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- This is For Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- This is End For Bootstrap CSs -->
    <title>Hospital</title>
</head>

<body>
    <div id='hospitaldiv'>


        <!-- This is for the navbar only  -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CoviD Shelter Management</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-left:300px; font-weight:bolder ; font-size:18px ; ">
                            <a class="nav-link active" aria-current="page" href="#">All Hospitals
                            </a>
                        </li>
                    </ul>
                    <a href="../login.php"><button class="btn btn-outline-success"> Hospital Login</button></a>
                    <a href="form.php"><button class="btn btn-outline-success">Request Bed</button></a>
                </div>
            </div>
        </nav>

        <!-- This is end of the navbar -->


        <div style="display:grid;grid-template-columns:1fr 1fr 1fr; gap:20px ;margin-top:30px ">

            <?php

            include("../connection.php");


            $sqlmain = "SELECT  hospitals.hosid , hospitals.hos_name , hospitals.address , count(beds.bedid) as Totalbeds from hospitals INNER JOIN beds on beds.hosid=hospitals.hosid GROUP BY hosid ";

            $result = $database->query($sqlmain);

            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $Hospitalname = $row["hos_name"];
                $HospitalAdd = $row["address"];
                $Hospitalid = $row["hosid"];
                $Totalbeds = $row["Totalbeds"];

                echo '<div class="main" style="width:18rem">
                <ul class="cards">
                    <div class="card">
                        <div class="card_image"><img src="https://images.pexels.com/photos/668298/pexels-photo-668298.jpeg?auto=compress&cs=tinysrgb&w=600" /></div>
                        <div class="card_content" >
                            <h2 class="card_title">' . $Hospitalname . '</h2>
                            <br />
                            <h3 class="card_text" style="color:black ; font-weight:bold;">Address :  ' . $HospitalAdd . '</h3>
                            <br />
                            <a href="?action=edit&Hospitalname=' . $Hospitalname . '&HospitalAdd=' . $HospitalAdd . '&&Hospitalid=' . $Hospitalid . '&Totalbeds=' . $Totalbeds . '&error=0" class="non-style-link"><button class="btn"><font class="tn-in-text">Read More</font></button></a>
                        </div>
                    </div>
                </ul>
            </div>';
            }


            ?>

            <?php

            if ($_GET) {

                $Hospitalname = $_GET["Hospitalname"];
                $HospitalAdd = $_GET["HospitalAdd"];
                $Hospitalid = $_GET["Hospitalid"];
                $Totalbeds = $_GET["Totalbeds"];
                $action = $_GET["action"];

                if ($action == 'edit') {
                   
                    $sqloxy= "SELECT count(bedid) as Totalbeds,roomtype,hosid from beds WHERE hosid=$Hospitalid;";
                    $result2 = $database->query($sqloxy);

                    for ($x = 0; $x < $result2->num_rows; $x++) {
                        $row2 = $result2->fetch_assoc();
                        $Oxygenno2 = $row2["Totalbeds"];
                    
                    }
                    

                    $sqloxy = "SELECT count(bedid) as Totalbeds,roomtype,hosid from beds WHERE hosid=$Hospitalid and patientid=0;";
                    $result2 = $database->query($sqloxy);

                    for ($x = 0; $x < $result2->num_rows; $x++) {
                        $row2 = $result2->fetch_assoc();
                        $Oxygenno2 = $row2["Totalbeds"];
                    
                    }
                    echo($Oxygenno2);


                    echo '<div id="popup1" class="overlay">
                 <div class="popup">
                 <center>
                     <h2></h2>
                     <a class="close" href="main-hos.php">&times;</a>
                     <div style="display: flex;justify-content: center;">
                     <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                     
                         <tr>
                             <td>
                                 <p style=" text-align: left; font-size: 25px; font-weight: 300; display:block; margin:auto; width:fit-content; ">View Details</p><br><br>
                             </td>
                         </tr>
                         
                         <tr>
                             
                         <td class="label-td" colspan="2">
                             <label for="name" class="form-label" style="font-weight:bold;">Hospital Id:' . $Hospitalid . ' </label>
                         </td>
                        </tr>

                         <tr>
                             
                             <td class="label-td" colspan="2">
                                 <label for="name" class="form-label" style="font-weight:bold;">Hospital Name:' . $Hospitalname . ' </label>
                             </td>
                         </tr>
                         <tr>
                             <td class="label-td" colspan="2">
                                 <label for="Email" class="form-label" style="font-weight:bold;">Hospital Address:' . $HospitalAdd . ' </label>
                             </td>
                         </tr>
                         <tr>
                         <td class="label-td" colspan="2">
                             <label for="Email" class="form-label" style="font-weight:bold;"> Total Available beds: ' . $Oxygenno2 . ' </label>
                         </td>
                     </tr>
                     </table>
                     </div>
                 </center>
                 <br><br>
             </div>
         </div>';
                }
            }
            ?>

        </div>

    </div>
</body>

<!-- This is for  boot strap js  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

<!-- This is for the bootstrap css -->


</html>