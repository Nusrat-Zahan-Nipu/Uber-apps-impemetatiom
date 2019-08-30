<?php
    if (!isset($_SESSION)) {
        session_start();
    
    }
?>
    <?php
 
  include 'library.php';
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/style.css">
            <title>home page</title>
        </head>

        <body>
            <div class="hero">
                <div class="highway"></div>
                <div class="city"></div>
                <div class="car">
                    <img src="img/car.png" alt="a car">
                </div>
                <div class="wheel">
                    <img src="img/wheel.png" class="back-wheel">
                    <img src="img/wheel.png" class="front-wheel">


                </div>
                <div class="user_info">
                    <div class="u_dp"><img src="img/user-512.png" alt=""></div>
                    <h1 class="u_text">
                      
                            <?php
                 $emailu= $_SESSION['username'];
  $query ="SELECT fullname FROM `user` WHERE email='$emailu' ";
   $query_run=mysqli_query($connection,$query);
    $row=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
   @$fullname=$row[fullname];
   echo "$fullname";
                    
        $query ="SELECT ui.first_name,ui.last_name
FROM friend_list f JOIN users_info ui on f.Friend_id=ui.email
WHERE f.User_id ='$emailu' ";
                    $query_run=$connection->query($query);

                    ?>


                    </h1>



                    <div class="u_his">



                        <a href="#" class="mega_button" style="display: block;
    background: red;
    text-color: red;
    color: white;
    text-decoration: none;
    padding: 5px;
    border-radius: 14px;
    font-family: -webkit-pictograph;
    border: 2px solid #8b8b8b;">Buy Ticket</a>
                    </div>
                     <div class="u_his">



                        <a href="#" class="mega_button" style="display: block;
    background: red;
    text-color: red;
    color: white;
    text-decoration: none;
    padding: 5px;
    border-radius: 14px;
    font-family: -webkit-pictograph;
    border: 2px solid #8b8b8b;">
                   
                   
                   
                   Log Out</a>
                    </div>
 <div class="u_his">



                        <a href="#" class="mega_button" style="display: block;
    background: red;
    text-color: red;
    color: white;
    text-decoration: none;
    padding: 5px;
    border-radius: 14px;
    font-family: -webkit-pictograph;
    border: 2px solid #8b8b8b;">Balance $50</a>
                    </div>




                </div>
                <?php
                
                 
                 if(isset($_POST['Your_location'])){
                    $location = $_POST['Your_location'];
                     $destination = $_POST['Your_destination'];
                    
                   $sql="SELECT r.Map,r.duration,r.Description FROM route r WHERE r.Ld_id=( SELECT Ld_id FROM location_destination l WHERE l.Location='$location' AND l.Destination='$destination')" ;
                  
                     
                    
                    $query_run=$connection->query($sql);
//                    
//    
//                $sql2="SELECT DISTINCT bs.name
//FROM location_destination ld JOIN route r on r.Ld_id=ld.Ld_id
//JOIN bus_route b on r.route_id=b.route_id 
//JOIN buses bs on bs.bus_id=b.bus_id
//WHERE ld.Location='$location' and ld.Destination= '$destination' ";
//
//$query_run2=$connection->query($sql2);
                 }
                 ?>


                    <div class="search_form" style="left:10%">
                        <h1>Search Your Trip</h1>
                        <form action="home.php" method="post">
                            <div class="location">
                                <input type="text" name="Your_location" placeholder="location " style="font-family: Poppins-Medium;
    font-size: 15px;
    line-height: 1.5;
    color: #666666;
    display: block;
    width: 34%;
    background: #e6e6e6;
    height: 50px;
    border-radius: 25px;
    padding: 0 23px 0 81px;">
                            </div>
                            <div class="destination">
                                <input type="text" name="Your_destination" placeholder="Destination"  style="font-family: Poppins-Medium;
    font-size: 15px;
    line-height: 1.5;
    color: #666666;
    display: block;
    width: 34%;
    background: #e6e6e6;
    height: 50px;
    border-radius: 25px;
    padding: 0 23px 0 81px;">
                            </div>
                            <!--
                <div class="date">
            <input type="date" name="Your_tirp_date" placeholder="Date">
               
                </div>
-->
                            <div class="submit" name="search"  >

                                <input type="submit" value="search" style="border: none;
    background: white;
    border-radius: 10px;
    padding: 20px;">
                            </div>

                        </form>
                        <?php
                        
              $count=mysqli_num_rows($query_run);
                     if($count == 0) {
                        echo "<h1>NO RESULT</h1>";
                    }
                    else { 
                     
                    
    
                    while ($row = $query_run->fetch_array())
    {
        echo'<table style ="border-collapse: collapse;">';
         echo '<tr style=":nth-child(even) {
  background-color: #dddddd;
}"><th style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">description</th><th style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">avg duration(mins)</th></tr>';
          
                        
                        
                        
                   echo' <tr>
                        <td      style="border: 1px solid #dddddd;
 text-align: left;
 padding: 8px;">' .$row['Description'].'</td>';
                        echo' <td     style="border: 1px solid #dddddd;
 text-align: left;
 padding: 8px;">' .$row['duration'].'</td>';
                        
                        
                        
                       
//                        echo'<td>';
//                        while ($row2=$query_run2->fetch_array())
//                        {
//                           echo' 
//                        <td     style="border: 1px solid #dddddd;
// text-align: left;
// padding: 8px;">' .$row2['name'].'</td>';
//                       
//                        }
//                        echo'</td>';
                    echo'</tr>';
                        
                            
                         
//                        <td>
//                        
//                         .$row['duration'].';
//                        </td>
//                        </tr>';
//                        
//                        echo '<td  style="border: 1px solid #dddddd;
//  text-align: left;
//  padding: 8px;">'.$row['Description'].'</td>';
//            echo '<td style="border: 1px solid #dddddd;
//  text-align: left;
//  padding: 8px;">'.$row['duration'].'</td>'; </tr>
//                  <td>      while ($row2=$query_run2->fetch_array())
//  { 
//                             echo '<td style="border: 1px solid #dddddd;
//  text-align: left;
//  padding: 8px;">'.$row['name'].'</td>';
//      
//  }
//                        </td>    </tr>
           
        
          echo '<br><tr  style=":nth-child(even) {
  background-color: #dddddd;
}"><th style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Map</th><td >'.$row['Map'].'</td></tr>';
          
       
         echo'</table>';
            
            
        
        
    } }?>

                    </div>

            </div>
<!--
            <nav>
                <ul>
                    <li>
                        <div class="home-icon">
                            <div class="roof">
                                <div class="roo2f-edge"></div>
                            </div>
                            <div class="front"></div>
                        </div>
                    </li>
                    <li>
                        <div class="about-icon">
                            <div class="head">
                                <div class="eyes"></div>
                                <div class="beard"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="work-icon">
                            <div class="paper"></div>
                            <div class="lines"></div>
                            <div class="lines"></div>
                            <div class="lines"></div>
                        </div>
                    </li>
                    <li>
                        <div class="mail-icon">
                            <div class="mail-base">
                                <div class="mail-top"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
-->

        </body>

        </html>
