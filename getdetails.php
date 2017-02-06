<?php
include('connection.php');
$q = $_GET['keyword'];
$name = explode(" ", $q);
if($q!=""){

    $sql = "SELECT * FROM patients WHERE firstname='$name[0]' AND
                    lastname='$name[1]' ORDER BY firstname ";

    $result = $connect->query($sql);


    if($row = mysqli_fetch_assoc($result)){
        
?>
        <center><p style="font-family: 'Palatino Linotype';font-size: 35px;text-shadow: 2px 2px #F0F0F0">Patient Details</p></center>
        <center>
        <table >
            <tr>
                <td width="30%"><b>First Name</b></td>
                <td width="2%"><b>:</b></td>
                <td><?php echo $row['firstname']; ?></td>
            </tr>
            <tr>
                <td><b>Last Name</b></td><td width="2"><b>:</b></td>
                <td><?php echo $row['lastname']; ?></td>
            </tr>
            <tr>
                <td><b>Age</b></td><td width="2"><b>:</b></td>
                <td><?php echo $row['age']; ?></td>
            </tr>
            <tr>
                <td><b>Date of Birth</b></td><td width="2"><b>:</b></td>
                <td><?php echo $row['dob']; ?></td>
            </tr>
            <tr>
                <td><b>Gender</b></td><td width="2"><b>:</b></td>
                <td><?php echo $row['gender']; ?></td>
            </tr>
            <tr>
                <td><b>Contact No.</b></td><td width="2"><b>:</b></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
            <tr>
                <td><b>Description</b></td><td width="2"><b>:</b></td>
                <td><?php echo $row['desp']; ?></td>
            </tr>
            </table>
        </center>
 <?php       
    }
}

?>