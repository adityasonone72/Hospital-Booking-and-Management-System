<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Login Form</title>
</head>


<style>
    .containerregister {
        background-color: white;
        width: fit-content;
        display: block;
        margin: auto;
        margin-top: 30px;
        padding: 1rem 3rem;
        padding-bottom: 2rem;
        border-radius: 0.5rem;
        border-top: rgb(80, 98, 255) 0.5rem solid;
        background-image: url('../css/vi.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        border: 3px solid black;
    }

    .regih2 {
        margin: 1rem 0;
    }

    .regiform {
        display: flex;
        flex-direction: column;
        gap: 1.4rem;
    }

    .regiform div {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }

    input {
        padding: 0.5rem;
        border-radius: 0.3rem;
        border: 1px solid gray;
        font-size: 1.1rem;
    }

    button {
        background-color: rgb(80, 98, 255);
        color: white;
        border: none;
        padding: 0.5rem;
        font-size: 1rem;
        text-transform: uppercase;
        cursor: pointer;
        border-radius: 0.3rem;
    }

    span a {
        text-decoration: none;
        color: rgb(80, 98, 255);
    }

    .private {
        height: 100vh;
        width: 100vw;
        background-color: rgb(80, 98, 255);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
        font-size: 3rem;
        flex-direction: column;
        gap: 1rem;
    }

    .private button {
        background-color: black;
        padding: 2rem 10rem;
        font-size: 4rem;
        border-radius: 2rem;
    }
</style>



<body>
    <div class='containerregister'>

        <h2 class='regih2'>Book bed</h2>

        <?php

        include("../connection.php");

        if (isset($_POST['submit'])) { // Fetching variables of the form which travels in URL
            $hosid = $_POST['hosid'];
            $PatientName = $_POST['PatientName'];
            $BloodGroup = $_POST['Blood_Grp'];
            $Weight = $_POST['Weight'];
            $Phone_no = $_POST['Phone_no'];
            $DOB = $_POST['DOB'];
            $Age = $_POST['Age'];
            $Email = $_POST['Email'];
            $Requested_Bed = $_POST['Reqbed'];
            $Address = $_POST['Address'];
            $OxygenLevel = $_POST['OxygenLevel'];
            $Gender = $_POST['Gender'];
            $Disease_History = $_POST['Disease_Hist'];

            $sql2 = "insert into enquiry (hosid, PatientName, Blood_Grp, Weight, Phone_no, DOB, Disease_Hist, Age, pemail, Reqbed, Address, Oxygenlevel, gender) VALUES('$hosid','$PatientName','$BloodGroup','$Weight','$Phone_no','$DOB','$Disease_History','$Age','$Email','$Requested_Bed','$Address','$OxygenLevel','$Gender');";

            $database->query($sql2);

            echo "<script>alert('Request Submiited Successfully')</script>";

            echo "<script>window.open('main-hos.php','_self')</script>";

        }

        ?>

        <form class='regiform' method="POST">

            <div>
                <label for='email'>Hospital ID</label>

                <tr>
                    <td class="label-td" colspan="2">
                        <label for="Blood_Grp" class="form-label">Choose Hospital Id:</label>

                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <select name="hosid" id="" class="box" required>';


                            <?php

                            $list11 = $database->query("select * from hospitals;");

                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $hosid = $row00["hosid"];
                                $id00 = $row00["hosid"];
                                echo "<option value=" . $id00 . ">$hosid</option><br/>";
                            }
                            ;
                            ?>

                            echo '
                        </select><br>
                    </td>
                </tr>


            </div>



            <div>
                <label for='email'>PatientName</label>
                <input type='text' name='PatientName' placeholder='Patient Name' required />
            </div>

            <div>
                <label for='email'>BloodGroup</label>
                <input type='text' name='Blood_Grp' placeholder='Blood Group' required />
            </div>

            <div>
                <label for='email'>Weight</label>
                <input type='number' name='Weight' placeholder='Weight' required />
            </div>

            <div>
                <label for='email'>Phone_no</label>
                <input type='number' name='Phone_no' placeholder='Phone Number' required />
            </div>


            <div>
                <label for='email'>DOB</label>
                <input type='date' name='DOB' placeholder='Date Of Birth' required />
            </div>


            <div>
                <label for='email'>Age</label>
                <input type='number' name='Age' placeholder='Age' required />
            </div>

            <div>
                <label for='email'>Email</label>
                <input type='email' name='Email' placeholder='Email' required />
            </div>

            <div>
                <label for='email'>RequestBedType</label>
                <input type='text' name='Reqbed' placeholder='Requested Bed' required />
            </div>

            <div>
                <label for='email'>Address</label>
                <input type='text' name='Address' placeholder='Address' required />
            </div>

            <div>
                <label for='email'>OxygenLevel</label>
                <input type='number' name='OxygenLevel' placeholder='Oxygen Level' required />
            </div>

            <div>
                <label for='email'>Gender</label>
                <input type='text' name='Gender' placeholder='Gender' required />
            </div>

            <div>
                <label for='password'>Disease_History</label>
                <input type='text' name='Disease_Hist' placeholder='Disease History' required />
            </div>

            <button name="submit" type='submit'>Book Bed</button>

        </form>

    </div>
</body>

</html>