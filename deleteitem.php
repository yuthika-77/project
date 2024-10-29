<?php
require_once("conn.php");

         if(isset($_GET['Delete']))
         {
             $ItemID = $_GET['Delete'];
             $query = "delete from clothes where Item_ID = '".$ItemID."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location:admin.php?redirect=1");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
              echo"Not successfull";
         }
?>