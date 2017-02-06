<?php
include('connection.php');
$q = $_GET['keyword'];
if($q!=""){
    $sql = "SELECT firstname,lastname FROM patients WHERE firstname LIKE '$q%' OR
                    lastname LIKE '$q%' ORDER BY firstname ";

    $result = $connect->query($sql);


    if(!empty($result)){

        ?><ul id="patient_list"><?php

        foreach($result as $patient){?>
            <li onClick="selectPatient('<?php echo $patient['firstname'].' '.$patient['lastname']; ?>');">
                    <?php echo $patient["firstname"]." ".$patient["lastname"]; ?></li>
        <?php }

        echo "</ul>";
    }
}

?>