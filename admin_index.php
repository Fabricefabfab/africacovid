<?php
$db_host = "us-cdbr-east-06.cleardb.net";
$db_user = "bf913bab427a13";
$db_password = "5c3796bb";
$db_name = "heroku_3f1b3994b709799";

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

//check connection
if(!$conn){
	die("connection failed");
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Information on available COVID vaccines</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
       <link rel="stylesheet" href="css/owl.carousel.min.css"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- top -->
                    <!-- header -->
         <header class="header-area">
            <div class="left">
               <a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <div class="right">
               <a href="index.html" ><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <div class="container">
               <div class="row d_flex">
                  <div class="col-sm-3 logo_sm">
                     <div class="logo">
                        <a href="index.html"></a>
                     </div>
                  </div>
                  <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-9">
                     <div class="navbar-area">
                        <nav class="site-navbar">
                           <ul>
                              <li><a class="active" href="admin_index.php">Home</a></li>
                              <li><a href="workers.php">Workers</a></li>
                              <li><a href="citizens.php">Citizens</a></li>
                              <li><a href="centers.php">Centers</a></li>
                              <li><a href="data.php">data</a></li>
                              <li><a href="empdata.php">Employee Data</a></li>
                              <li><a href="vaccines.php">Vaccines</a></li>


                           </ul>
                           <button class="nav-toggler">
                           <span></span>
                           </button>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </header>
      <!-- end header -->
<br>
<br>
                    <div class="container">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">Suppliers
                        </div>
                        <div class="card-body">
                          <?php 
                          $sql = "SELECT * FROM supplier";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Supplier ID</th>';
                                           echo '<th >Supplier Name</th>'; 
                                           echo '<th >Phone Number</th>';
                                           echo '<th >Email</th>';
                                           echo '<th >Vaccine Type</th>'; 
                                           echo '<th >Location</th>';    
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                      echo '<tr>';
                                            echo "<td>" .$row['supplierID']. "</td>"; 
                                            echo "<td>" .$row['suppliername']. "</td>";
                                            echo "<td>" .$row['telephone']. "</td>";
                                            echo "<td>" .$row['email']. "</td>";
                                            echo "<td>" .$row['vaccinetype']. "</td>";
                                            echo "<td>" .$row['location']. "</td>";
                                            
                                    }
                                
                                    
                               echo '</table>';
                                }
                                    ?>
                                
                            </div>
                        </div>
                      </div>

                      <div class="container">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">Transporters
                        </div>
                        <div class="card-body">
                          <?php 
                          $sql = "SELECT * FROM transporters";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Transporter ID</th>';
                                           echo '<th >Citizen ID</th>'; 
                                           echo '<th >Experience</th>'; 
                                           echo '<th >Education Level</th>';
                                               
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                      echo '<tr>';
                                            echo "<td>" .$row['TransporterID']. "</td>"; 
                                            echo "<td>" .$row['citizenID']. "</td>";
                                            echo "<td>" .$row['Experience']. "</td>";
                                            echo "<td>" .$row['educationLevel']. "</td>";
                                            
                                            
                                    }
                                
                                    
                               echo '</table>';
                                }
                                    ?>
                                
                            </div>
                        </div>
                      </div> 

      <!-- end cases -->
      <!--  footer -->
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>