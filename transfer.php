<?php
$user = 'root';
$password = ''; 
$database = 'banking_system'; 
$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM customer ";
$result = $mysqli->query($sql);
$mysqli->close(); 
// print_r($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>Sparks Bank</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="styles.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  </head>
  <body>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="linkedin" viewBox="0 0 16 16">
          <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
      </symbol>
      <symbol id="github" viewBox="0 0 16 16">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
      </symbol> 
    </svg>
  <div class="loader"></div>

<div class="wrapper">
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3 id="nav-logo"><img src="images/nav-logo.PNG" /></h3>
    </div>
    <ul class="lisst-unstyled components">
      <li class="active">
        <a href="index.html"><i class="fas fa-home"></i> Home</a>
      </li>
      <li>
        <a href="customer.php"><i class="fas fa-users"></i> Customers </a>
      </li>
      <li>
        <a href="transfer.php"><i class="bi bi-arrow-left-right"></i>
          Transfer Money
        </a>
      </li>
    </ul>
  </nav>

  <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i>
          <span></span>
        </button>
        <span id="nav-logo"><img src="images/nav-logo.PNG" /></span>
      </div>
    </nav>
    <hr />
  
    <h2><i class="bi bi-arrow-left-right"></i> Transfer Money</h2>
    <br>
    <div class="balance">
        <h5><u> Good Morning! Sam. </u><br><br>
            Your Available Balance : <span>&#8377; 
            <?php
            while($rows=$result->fetch_assoc())
            {
                 if($rows['username'] == "sam69@sparks.bank"){
                     echo number_format($rows['balance'], 2,'.',',');;
    }else{
        // echo 'Unable to get balance.';
    }
}
    ?></span>
        </h5>
    </div>
    <div class="registration-form">
        <form method="POST" action="action.php">
            <!-- <div class="form-icon">
                <span><i class="bi bi-person"></i></span>
            </div> -->
            <div class="form-group">
            <i class="bi bi-person"> Username</i>
            <?php
               if(isset($_GET['username'])){
                $username = $_GET['username'];
                // echo $username;
               }
               else{
                 $username = "";
               }
            ?>
            <input type="text" class="form-control item" id="username" name="username" placeholder="Username" value="<?php echo $username?>" required>
            </div>
            <div class="form-group">
            <i class="bi bi-cash-coin"> Amount</i>
                <input type="text" class="form-control item" id="amount" name="amount" placeholder="Amount" required>
            </div>
            <div class="form-group">
            <i class="bi bi-pencil-square"> Remark</i>
                <input type="text" class="form-control item" id="remark" name="remark" placeholder="Remarks">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Send Money</button>
            </div>
        </form>
        </div>
    
     <!-- Footer Starts Here -->
     <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-1 border-top">
            <div class="col-md-4 d-flex align-items-center">
              <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <!-- <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg> -->
              </a>
              <span class="text-muted">&copy; Hemanshu Dharmik @ GRIP 2022</span>
            </div>
        
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
              <!-- <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li> -->
              <li class="ms-3"><a class="text-muted" href="https://linkedin.com/in/hemanshudharmik/" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#linkedin"/></svg></a></li>
              <li class="ms-3"><a class="text-muted" href="https://github.com/hdharmik82" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#github"/></svg></a></li>
            </ul>
          </footer>
        <!-- Footer Ends Here -->
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(window).load(function () {
        $(".loader").fadeOut("50000");
      });
    </script>

    <script>
      $(document).ready(function () {
        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").toggleClass("active");
        });
      });
    </script>
  </body>
</html>