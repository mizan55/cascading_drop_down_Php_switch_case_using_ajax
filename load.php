<?php
$conn= mysqli_connect('localhost','root','','cascading_dropdown') or die('failed to connect to database');

$div_id=$_POST['div_id'];
$dis_id=$_POST['dis_id'];
$up_id=$_POST['up_id'];


$command =$_POST['get'];
switch ($command) {
    case "division":
        $q="select * from divisions";
        $r= mysqli_query($conn,$q)or die('sql query failed');
        foreach($r as $rows){
                    $output="<option value='{$rows['id']}'>{$rows['name']}</option>";
                    echo $output;
                }
        break;

    case "district":
       
        $q = "SELECT * FROM districts WHERE division_id={$div_id}";
        $r= mysqli_query($conn,$q);
        foreach($r as $rows){
            $output="<option value='{$rows['id']}'>{$rows['name']}</option>";
            echo $output;
        }
        break;

    case "upazila":
      
        $q = "SELECT * FROM upazilas WHERE district_id={$dis_id}";
        $r= mysqli_query($conn,$q);
        foreach($r as $rows){
            $output="<option value='{$rows['id']}'>{$rows['name']}</option>";
            echo $output;
        }
        break;

    case "union":
      
            $q = "SELECT * FROM unions WHERE upazilla_id={$up_id}";
            $r= mysqli_query($conn,$q);
            foreach($r as $rows){
                $output="<option value='{$rows['id']}'>{$rows['name']}</option>";
                echo $output;
            }
            break;
}

exit();









// $q="select * from divisions";
// $r= mysqli_query($conn,$q)or die('sql query failed');
// $output="";
// if(mysqli_num_rows($r)>0){
//     foreach($r as $rows){
//         $output="<option value='{$rows['id']}'>{$rows['name']}</option>";
//         echo $output;
//     }
    
// };

//
// $countryId = isset($_POST['countryId']) ? $_POST['countryId'] : 0;
// $stateId = isset($_POST['stateId']) ? $_POST['stateId'] : 0;
// $command = isset($_POST['get']) ? $_POST['get'] : "";
?>


