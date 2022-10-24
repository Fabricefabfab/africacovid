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
               <a href="index.php" ><i class="fa fa-home" aria-hidden="true"></i></a>
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
                              <li><a href="admin_index.php">Home</a></li>
                              <li><a href="workers.php">Workers</a></li>
                              <li><a href="citizens.php">Citizens</a></li>
                              <li><a href="centers.php" >Centers</a></li>
                              <li><a href="data.php">Data</a></li>
                              <li><a href="empdata.php">Employee Data</a></li>
                              <li><a class="active" href="vaccines.php">Vaccines</a></li>
                              
                               
                              
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
      <script type="text/javascript">
    $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>
          <div class="container">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">Vaccines
                        </div>
                        <div class="card-body">
                        	<?php 
                        	$sql = "SELECT * FROM vaccines";
                        	$result = mysqli_query($conn, $sql);
                        	if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Vaccine ID</th>';
                                            echo '<th>Vaccine Name</th>'; 
                                            echo '<th>Supplier ID</th>'; 
                                            echo '<th>Expiry Date</th>';  
                                            
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                    	echo '<tr>';
                                            echo "<td>" .$row['vaccineID']. "</td>"; 
                                            echo "<td>" .$row['vaccinename']. "</td>";
                                            echo "<td>" .$row['supplierID']. "</td>";
                                            echo "<td>" .$row['expdate']. "</td>";
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
                        <div class="card-header py-2">Vaccinations
                        </div>
                        <div class="card-body">
                          <?php 
                          $sql = "SELECT * FROM vaccination";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Mediacl Officer ID</th>';
                                            echo '<th>Citizen ID</th>'; 
                                            echo '<th>Date of Vaccination</th>'; 
                                            echo '<th>Center</th>';  
                                            
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                      echo '<tr>';
                                            echo "<td>" .$row['MedicalOfficerID']. "</td>"; 
                                            echo "<td>" .$row['CitizenID']. "</td>";
                                            echo "<td>" .$row['dateOfVaccination']. "</td>";
                                            echo "<td>" .$row['centerID']. "</td>";
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
                        <div class="card-header py-2">Distribution
                        </div>
                        <div class="card-body">
                          <?php 
                          $sql = "SELECT * FROM distribution";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Branch ID</th>';
                                            echo '<th>Center ID</th>'; 
                                            echo '<th>Quantity</th>'; 
                                            echo '<th>Date Supplied</th>';  
                                            
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                      echo '<tr>';
                                            echo "<td>" .$row['branchID']. "</td>"; 
                                            echo "<td>" .$row['centerID']. "</td>";
                                            echo "<td>" .$row['quantity']. "</td>";
                                            echo "<td>" .$row['supplydate']. "</td>";
                                    }
                                
                                    
                               echo '</table>';
                                }
                                    ?>
                                
                            </div>
                        </div>
                    </div>
                    <button style="display: none; position: fixed; bottom: 10px; right: 20px; z-index: 99; border: none; outline: none; background-color: red; color: white; cursor: pointer; padding: 10px; border-radius: 10px; font-size: 10px;" onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>

                      


<script type="text/javascript">
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
     
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
