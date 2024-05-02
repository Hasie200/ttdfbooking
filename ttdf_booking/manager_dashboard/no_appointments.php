<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <title>No Appointments</title>
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

      if(!isset($_SESSION['manager_id']) ){
          header('Location: http://miceducation.42web.io/ttdf_booking/manager_dashboard/logout.php');
       
        
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
     header('Location: http://miceducation.42web.io/ttdf_booking/manager_dashboard/logout.php');
  
   
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
                  <li><a href="appointments.php" class="waves-effect white-text">Appointments<i class="material-icons white-text">schedule</i></a></li>
                </ul>
              </div>
            </li>

            

            <!-- THIS IS THE END OF SIDEBAR CONTENT  -->
            
    </header>
    <main>

    
      
<?php
  
      

  echo ' <div class="container center-align">
    <h1>No Appointments</h1>
      <p class="flow-text">Currently you have no appointments.</p>
  
   <a href="manager_dashboard.php" class="btn btn-large waves-effect waves-light teal darken-1"> Back to Dashboard</a>

  </div>';



      ?>


  
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