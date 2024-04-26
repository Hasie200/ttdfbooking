<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <title>Appointments</title>
    <link href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" rel="stylesheet">
    <link href="//themes.materializecss.com/cdn/shop/t/1/assets/jqvmap.css?v=162757563705857184351528499283" rel="stylesheet">
    <link href="//themes.materializecss.com/cdn/shop/t/1/assets/flag-icon.min.css?v=107574258948483483761528499307" rel="stylesheet">
    <!-- Fullcalendar-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css" rel="stylesheet">
    <!-- Materialize-->
    <link href="//themes.materializecss.com/cdn/shop/t/1/assets/admin-materialize.min.css?v=88505356707424191531528497992" rel="stylesheet">
    <!-- Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

  <?php

     session_start();

     
      if(!isset($_SESSION[ $_SESSION['username'] ]) ){
         
         header('http://localhost/ttdf_booking/login.php');
        
      }


    

      include($_SERVER['DOCUMENT_ROOT']. '/ttdf_booking/db_connect.php');


  $manager_id = $_SESSION['manager_id'];

  $sql = "SELECT first_name, role FROM users WHERE  user_id = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('i',$manager_id);

  $stmt->execute();

  $result = $stmt->get_result(); 

  // Check if a row was is present (user exists with the provided username)
  if ($result->num_rows > 0) {
      
    
      $row = $result->fetch_assoc();

      $name = 'Welcome '.$row['first_name'];
      $role = $row['role'];
    

   } 

 else{
header('Location: http://localhost/ttdf_booking/manager_dashboard/logout.php');
   
 }


  ?>


  <body class="has-fixed-sidenav">

    <header>
      <div class="navbar-fixed">
        <nav class="navbar teal darken-1">
          <div class="nav-wrapper">

            <a href="#!" class="brand-logo text-darken-4 white-text"><?php echo $name; ?></a>
            <ul id="nav-mobile" class="right ">
              <li><a href= 'logout.php' class="white-text">Log Out</a></li>
              
             
            </ul>

            <a href="#!" data-target="sidenav-left" class="sidenav-trigger left white-text"><i class="material-icons white-text">menu</i></a>
          </div>
        </nav>
      </div>



      <ul id="sidenav-left" class="sidenav sidenav-fixed teal darken-1" style="transform: translateX(-105%);">


        <li><a href="manager_dashboard.php" class="logo-container white-text "><?php echo $role; ?><i class="material-icons left white-text">spa</i></a></li>



        <li class="no-padding">

          <ul class="collapsible collapsible-accordion">

            <li class="bold waves-effect active">

              <a class="collapsible-header white-text" tabindex="0">Dashboard<i class="material-icons chevron white-text">chevron_left</i></a>

              <div class="collapsible-body" style="display: block;">
                <ul>
                  <li><a href="manager_dashboard.php" class="waves-effect active white-text">Dashboard<i class="material-icons white-text">web</i></a></li>
                  
                </ul>
              </div>




            </li>


            <li class="bold waves-effect"><a class="collapsible-header white-text" tabindex="0">Appointments<i class="material-icons chevron white-text">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="http://localhost/ttdf_booking/manager_dashboard/appointments.php" class="waves-effect white-text">Appointments<i class="material-icons white-text">schedule</i></a></li>
                </ul>
              </div>
            </li>

            

            <!-- THIS IS THE END OF SIDEBAR CONTENT  -->
            
    </header>
    <main>

    <div class="container center-align">

    <h4>Appointments</h4><br><br><br>
  <div class="row">
    <div class="col s12">
      <table class="centered ">
    <thead>
      <tr>
        <th>Name</th>
        <th>Appointment Date</th>
        <th>Appointment Details</th>
        <th >Status</th>
      </tr>
    </thead>

    <tbody>
      
<?php
     // Encryption function

function encrypt($data) {

     $key = 't5axHwNKOKqAbqIfyRA0ORGFspblLEd9';
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
    return base64_encode($encrypted);
}

// Decryption function
function decrypt($data) {

    $key = 't5axHwNKOKqAbqIfyRA0ORGFspblLEd9';
    $decrypted = openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, 0, substr($key, 0, 16));
    return $decrypted;
}

     
  $manager_id = $_SESSION['manager_id'];

  $sql = "SELECT * FROM appointments WHERE  manager_id = ? ORDER BY appointment_date ASC";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param('i',$manager_id);

  $stmt->execute();

  $result = $stmt->get_result(); 
   

  


  

  // Check if  there are any appointments available
  if ($result->num_rows > 0) {
      
      $counter = 0;

      while($row = $result->fetch_assoc()){
      

         
  $sql2 = "SELECT first_name, last_name FROM users WHERE  user_id = ?";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->bind_param('i',$row['user_id']);

  $stmt2->execute();

  $result2 = $stmt2->get_result(); 
  $row2 = $result2->fetch_assoc();
  $full_name = $row2['first_name'] . " " . $row2['last_name'];

  $status_accept = encrypt('accept');
  $status_reject = encrypt('reject');
  $id = encrypt($row['user_id']); 
  $current_date = encrypt($row['appointment_date']);
  

   echo '<tr>
  <td>' . $full_name . '</td>  
  <td>' . date("l jS F, Y g:i A", strtotime($row['appointment_date'])) . '</td>  
  <td>' . $row['appointment_details']. '</td>  
  <td>
    <a href="appointments.php?status=' . urlencode($status_accept) . '&id=' . urlencode($id) . '&row=' . urlencode($current_date)  .'">
      <i class="material-icons small green-text text-darken-1">check_circle</i> 
    </a>

            <a href="appointments.php?status=' . urlencode($status_reject) . '&id=' . urlencode($id) . '&row=' . urlencode($current_date)  .'">


      <i class="material-icons small red-text text-darken-1">cancel</i> 
    </a>
  
  </td>
</tr>';


 
$counter++;

      }

    

   }


 else{

  header('Location: no_appointments.php');


    
 }


if(isset($_GET['status']) && isset($_GET['id'])  && isset($_GET['row']) ){



 // Decrypt the data
$decrypted_status = decrypt(urldecode($_GET['status']));
$decrypted_id = decrypt(urldecode($_GET['id']));
$decrypted_date = decrypt(urldecode($_GET['row']));

  $valid_statuses = array("accept", "reject"); 


  // Validate that status is a valid option and ID is numeric
  if (in_array($decrypted_status , $valid_statuses) && is_numeric($decrypted_id)) {
       
     
      
 // Update appointment status based on GET parameter
    $sqlnew = "UPDATE appointments SET status= ? WHERE user_id= ? AND appointment_date = ?";

    
    $stmtnew = $conn->prepare($sqlnew);

    $stmtnew->bind_param('sis',$decrypted_status,$decrypted_id, $decrypted_date);

   
    
  // Execute the prepared statement
  if (!$stmtnew->execute()) {
    die("Error executing statement: " . $stmtnew->error);
  }
  
   


   // Select all rows with updates status

    $sqlnew = "SELECT * FROM appointments WHERE  status = ? ";

    
    $stmtnew = $conn->prepare($sqlnew);

    $stmtnew->bind_param('s',$decrypted_status);

    
    
  // Execute the prepared statement
  if (!$stmtnew->execute()) {
    die("Error executing statement: " . $stmtnew->error);
  }

  $result = $stmtnew->get_result();

  while($row = $result->fetch_assoc()){


     if( $row['status'] == 'accept'){

             
    $sql5 = "INSERT INTO dashboard (manager_id, user_id, appointment_date, appointment_details, status) VALUES (?, ?, ?, ?, ?)";

    
    $stmt5 = $conn->prepare($sql5);

    $stmt5->bind_param('iisss',$row['manager_id'], $row['user_id'], $row['appointment_date'], $row['appointment_details'], $row['status']  );

    
  // Execute the prepared statement
  if (!$stmt5->execute()) {
    die("Error executing statement: " . $stmt5->error);
  }
  else{

     $sql = " DELETE FROM appointments WHERE status = 'accept' ";

    
    $stmt = $conn->prepare($sql);

   


  // Execute the prepared statement
  if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
  }

  else{
     echo "<script>window.location.href = 'http://localhost/ttdf_booking/manager_dashboard/appointments.php'</script>";
  }



  }

  


  }

  else{
    
        // Update appointment status based on GET parameter
    $sql = " DELETE FROM appointments WHERE status = 'reject' ";

    
    $stmt = $conn->prepare($sql);

   


  // Execute the prepared statement
  if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
  }

  else{
     echo "<script>window.location.href = 'http://localhost/ttdf_booking/manager_dashboard/appointments.php'</script>";
  }

  }

  
   
  






  } 


}// End of the if that Validates that the status is a valid option and ID is numeric



  else {
    echo "<script>alert('Invalid status or ID provided!')</script>";
    echo "<script>window.location.href = 'http://localhost/ttdf_booking/manager_dashboard/appointments.php'</script>";
  }





} // main if to check if variables are set before executing any code


      ?>




     
    </tbody>
  </table>
    </div>
  </div>
</div>
    </main>

 



  

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize-css/1.0.0/js/materialize.min.js"></script>
 

<!-- External libraries -->

<!-- jqvmap -->
<script type="text/javascript" src="//themes.materializecss.com/cdn/shop/t/1/assets/jquery.vmap.min.js?v=163123838929084484541528498367"></script>
<script type="text/javascript" src="//themes.materializecss.com/cdn/shop/t/1/assets/jquery.vmap.world.js?v=72513650592694871481528498398" charset="utf-8"></script>
<script type="text/javascript" src="//themes.materializecss.com/cdn/shop/t/1/assets/jquery.vmap.sampledata.js?v=87023629870755566851528498384"></script>

<!-- ChartJS -->
<script type="text/javascript" src="//themes.materializecss.com/cdn/shop/t/1/assets/Chart.js?v=28848919051585277061528498087"></script>
<script type="text/javascript" src="//themes.materializecss.com/cdn/shop/t/1/assets/Chart.Financial.js?v=34644991646752552951528498109"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="//themes.materializecss.com/cdn/shop/t/1/assets/imagesloaded.pkgd.min.js?v=58819771796763510541528498326"></script>
<script src="//themes.materializecss.com/cdn/shop/t/1/assets/masonry.pkgd.min.js?v=180312904682597569011528498229"></script>


<!-- Initialization script -->
<script src="//themes.materializecss.com/cdn/shop/t/1/assets/dashboard.min.js?v=4816808830627109061528498722"></script>
  
</body></html>