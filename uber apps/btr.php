<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <form action="btr.html" method="post">


<select  required value=1 name="b">
<?php 
                global $connection;

        $result= $connection->query("SELECT Name ,Bus_id FROM buses");
                 
                if(is_bool($result)){
                  echo "No buses available";
                }else{
                  while($row = $result->f
                  {
                    echo "<option value='" . $row['bus_id'] . "'>". $row['Name'] . "</option>";
                  }
                  echo '&emsp;';

                }

?>
<select  required value=1 name="r">
  <?php
             $result = getListOfroute();

                if(is_bool($result)){
                  echo "No route available";
                }else{
                  while($row = $result->fetch_array())
                  {
                    echo "<option value='" . $row['route_id'] . "'>" . $row['Description'] . "</option>";
                  }
                  echo '&emsp;';

                }?>


</form> 
</body>
</html>
