<?php  
 $connect = mysqli_connect("localhost", "root", "", "bus route");  
 $output = '';  
 $sql = "SELECT * FROM users_info ORDER BY user_id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">User id</th>  
                     <th width="40%">First Name</th>  
                     <th width="40%">Last Name</th>  
                     <th width="40%">Email</th>  
                     <th width="40%">User</th>  
                     <th width="10%">Delete/Add</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM users_info LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["user_id"].'</td>  
                     <td class="first_name" data-id1="'.$row["user_id"].'" contenteditable>'.$row["first_name"].'</td>  
                     <td class="last_name" data-id2="'.$row["user_id"].'" contenteditable>'.$row["last_name"].'</td>  
                     <td class="last_name" data-id2="'.$row["user_id"].'" contenteditable>'.$row["email"].'</td>  
                     <td class="last_name" data-id2="'.$row["user_id"].'" contenteditable>'.$row["dob"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["user_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>  
                <td id="last_name" contenteditable></td>  
                <td id="eamil" contenteditable></td>  
                <td id="dob" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td id="first_name" contenteditable></td>  
					<td id="last_name" contenteditable></td>  
					<td id="email" contenteditable></td>  
					<td id="dob" contenteditable></td>  
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>