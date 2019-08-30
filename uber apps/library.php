<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php

    $connection = new mysqli('localhost', 'root', '', 'bus route'); // Database Connection

    $error_flag = 0;
    $result;
    if ($connection->connect_error) {
        die('connection failed: '.$connection->connect_error);
    }
  function secure($unsafe_data)   //Making safe string
    {
        return htmlentities($unsafe_data);
    }


  function login($email_id_unsafe, $password_unsafe, $table = 'user') //Checking email and password
    {
        global $connection;

        $email_id = secure($email_id_unsafe);
        $password = secure($password_unsafe);

        $sql = "SELECT COUNT(*) FROM $table WHERE email = '$email_id' AND password = '$password';";

        $result = $connection->query($sql);

        $num_rows = (int) $result->fetch_array()['0'];

        if ($num_rows > 1) {
            //send email to sysadmin that my site has been hacked
              return 0;
        } elseif ($num_rows == 0) {
            echo status('no-match');

            return 0;
        } else {
            echo "<div class='alert alert-success'> <strong>Well done!</strong> Logged In</div>";
            $_SESSION['username'] = $email_id;

           
            return 1;
        }
    }

function register($first_name, $last_name, $email, $password,$user,$dob,$usertype,$table_name)
    {
        global $connection,$error_flag;


        $sql="INSERT INTO `users_info` (`first_name`, `last_name`, `email`, `password`, `dob`, `username`,`usertype`) VALUES ('$first_name', '$last_name', '$email', '$password', '$dob', '$user','$usertype');";
        


        

        if ($connection->query($sql) === true) {
            echo status('record-success');
            }
         else {
            echo status('record-fail');
        }
        
        $sql2=" INSERT INTO `user` (`email`, `fullname`, `password`) VALUES ('$email', '$first_name', '$password');";
         if ($connection->query($sql2) === true) {
            echo status('You can now logged in');
            }
         else {
            echo status('record-fail');
        }
        
    }

function status($type, $data = 0)
    {
        $success = "<div class='alert alert-success'> <strong>Done!</strong>";
        $fail = "<div class='alert alert-warning'><strong>Sorry!</strong>";
        $end = '</div>';

        switch ($type) {
            case 'record-success':
                return "$success New record created successfully! $end";
                break;
            case 'record-fail':
                return "$fail New record creation failed. $end";
                break;
            case 'record-dup':
                return "$fail Duplicate record exists. $end";
                break;
            case 'no-match':
                return "$fail Record did not match. $end";
                break;
            case 'con-failed':
                return "$fail connection Failed! $end";
                break;
            case 'appointment-success':
                return "$success Your appointment is booked successfully! Your appointment no is $data $end";
                break;
            case 'appointment-fail':
                return "$fail Failed to book your appointment Failed! $end";
                break;
            case 'update-success':
                return "$success New record updated successfully! $end";
                break;
            case 'update-fail':
                return "$fail Failed to update data! $end";
                break;
            default:
                // code...
                break;
        }
    }
 
    function getListOfBuses()
    {
        global $connection;

        return $connection->query("SELECT Name ,Bus_id FROM buses");
    }


  
    function getListOfroute()
    {
        global $connection;

        return $connection->query("SELECT route_id,Description
FROM route");
    }

    function noAccessForNormal()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'normal') {
                echo '<script type="text/javascript">window.location = "add_patient.php"</script>';
            }
        }
    }

