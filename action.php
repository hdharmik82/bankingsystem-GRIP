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
    $user=$_POST['username'];
    $sql = "SELECT balance FROM customer where username='".$user."'";
    $sql1 = "SELECT balance FROM customer where username='sam69@sparks.bank'";
    $result = $mysqli->query($sql);
    $result1 = $mysqli->query($sql1);
    // print_r($result);
    $credit=$_POST['amount'];
    // echo $credit;
    $row = mysqli_fetch_array($result);
    $bal = $row['balance'];

    $row1 = mysqli_fetch_array($result1);
    $debit = $row1['balance'];
    echo $debit;
    // print_r($bal);

    $new_bal=$bal+$credit;
    echo $new_bal;

    $debit_bal=$debit-$credit;
    echo "<br>";
    echo $debit_bal;

    // print_r($_POST);

    if(isset($_POST['username'], $_POST['amount'])){
        $sql2 = "UPDATE customer SET balance = $new_bal WHERE username='".$user."'";
        $sql3 = "UPDATE customer SET balance = $debit_bal WHERE username='sam69@sparks.bank'";
        $mysqli->query($sql2);
        $mysqli->query($sql3);
        echo "<br> Transaction Successful......";
    }
    else{
        echo "error..................";
    }
    $mysqli->close(); 
    // print_r($result);
?>