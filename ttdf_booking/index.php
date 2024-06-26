<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <title>TTDF Booking</title>
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


 


<body>
    <header>
      
           
<nav>
    <div class="nav-wrapper green darken-1">
      <a class=" brand-logo center truncate "href="index.php">  BOOKING APP</a>
      
    </div>
  </nav>

      
      
    </header>
    <main>
  
       


<div class="container center-align">

  <div class="row">
     <br>
     <br>
     <br>
     <br>
    
       <div class="col m4 push-m4">
     <img class="circle responsive-img  grey-text text-darken-4" src="images/logo.jpg" alt="Materialize"> 
    </div>
 



  </div>

  <span>
      <a  href="login.php" class="waves-effect waves-light btn btn-large light-green lighten-2">Login</a>
      </span>
     

       <span>
      <a  href="register.php" class="waves-effect waves-light btn btn-large light-green lighten-2">Register</a>
      </span>


</div>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  <section class="container section grey lighten-5" id="about-us">
  <h5 class="center-align">Software Solutions Booking App</h5>
  <div class="row">
    <div class="col m6 push-m3">
      <p class="black-text">Welcome to software solutions booking app! This is our first project published online, and we're excited to share it with you.</p>
      <p class="black-text">Our app is designed to simplify appointment scheduling between users and managers. Users can easily book appointments with managers through our user-friendly interface.</p>
      <p class="black-text">Once a user submits a booking request, the manager will review it and confirm the appointment. Upon confirmation, the user can review their appointment details on their dashboard.</p>
      <p class="black-text">We understand that as a first project, there might be areas for improvement. We appreciate your feedback and suggestions as we continue to develop and enhance the app to better serve your needs.</p>
    </div>
    
   
  </div>
</section>


<section class="container section grey lighten-5" id="about-us">
  
  <div class="container center-align">
 
    <div class="row">

  <form id="Feedback" action="index.php" method="post" class="col s12 m6 offset-m3">
    
    
    
      <div class="input-field col s12 m10">
  <textarea class=" materialize-textarea validate  " id="appointment_details" name="feedback" class="validate" rows="4" required></textarea>
  <label for="appointment_details">Feedback</label>
 </div>

     <?php
      include('feedback.php');

     ?>
    
    <button class="btn waves-effect waves-light col s12 m5 push-m2 " type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
 
  </form>


  
    </div>
  
   
</section>




       

</main>


   <!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>


      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
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


  
<div class="jqvmap-label" style="display: none;"></div><div class="sidenav-overlay" style="display: none; opacity: 0;"></div><div class="drag-target"></div><div id="WebPixelsManagerSandboxContainer" aria-hidden="true" tabindex="-1" style="height: 0px !important; width: 0px !important; position: fixed !important; visibility: hidden !important; overflow: hidden !important; z-index: -100 !important; margin: 0px !important; padding: 0px !important; border: 0px !important;"><iframe src="https://themes.materializecss.com/wpm@cad39b03we51f70f0pbc988c4cmaac70d51/custom/web-pixel-shopify-custom-pixel@063/sandbox/modern/pages/admin-dashboard" id="web-pixel-sandbox-CUSTOM-shopify-custom-pixel-LAX-cad39b03we51f70f0pbc988c4cmaac70d51" name="web-pixel-sandbox-CUSTOM-shopify-custom-pixel-LAX-cad39b03we51f70f0pbc988c4cmaac70d51" sandbox="allow-scripts allow-forms" tabindex="-1" aria-hidden="true" style="height: 0px !important; width: 0px !important; visibility: hidden !important;"></iframe></div></body></html>