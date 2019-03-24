 <?php
      session_start();
      include("loginT.php");
      include("connectT.php");
      $accountno = $_SESSION['accountno'];
      $baccountno = $_SESSION['baccountno'];
      $amount = $_SESSION['amount'];
    
      $conn = mysqli_connect('localhost', 'root', '', 'mysql'); //connect to the database.
      mysqli_autocommit($conn, false);
      $flag = true;
      
      $m_d = "SELECT balance from merchant WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $m_d) or die('error');
      echo 1;
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new - $amount;
      $m_d_update = "INSERT into merchant values (now(), $accountno, $amount, 'debit', $balance_new_insert, $baccountno)";
      
      $mm_c = "SELECT balance from merchant_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $mm_c) or die('error');
      echo 2;
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new + $amount;
      $mm_c_update = "INSERT into merchant_master values (now(), $accountno, $amount, 'credit', $balance_new_insert, $baccountno)";
    
      $mm_d = "SELECT balance from merchant_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $mm_d) or die('error');
      echo 3;
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new - $amount;
      $mm_d_update = "INSERT into merchant_master values (now(), $accountno, $amount, 'debit', $balance_new_insert, $baccountno)";

      $cm_c = "SELECT balance from customer_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $cm_c) or die('error');
      echo 4;
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new + $amount;
      $cm_c_update = "INSERT into customer_master values (now(), $accountno, $amount, 'credit', $balance_new_insert, $baccountno)";
      
      $cm_d = "SELECT balance from customer_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $cm_d) or die('error');
      echo 5;
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new - $amount;
      $cm_d_update = "INSERT into customer_master values (now(), $accountno, $amount, 'debit', $balance_new_insert, $baccountno)";
      
      $c_c = "SELECT balance from customer WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $c_c) or die('error');
      echo 6;
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new + $amount;
      $c_c_update = "INSERT into customer values (now(), $accountno, $amount, 'credit', $balance_new_insert, $baccountno)";

      
      $result = mysqli_query($conn, $m_d_update);

      if (!$result) {
        $flag = false;
        echo "Error details: " . mysqli_error($conn) . ".";

      }

      $result = mysqli_query($conn, $mm_c_update);

      if (!$result) {
      $flag = false;
      echo "Error details: " . mysqli_error($conn) . ".";
    }
      $result = mysqli_query($conn, $mm_d_update);

      if (!$result) {
        $flag = false;
        echo "Error details: " . mysqli_error($conn) . ".";
      }

      $result = mysqli_query($conn, $cm_c_update);

      if (!$result) {
      $flag = false;
      echo "Error details: " . mysqli_error($conn) . ".";
    }
      $result = mysqli_query($conn, $cm_d_update);

      if (!$result) {
        $flag = false;
        echo "Error details: " . mysqli_error($conn) . ".";
      }

      $result = mysqli_query($conn, $c_c_update);

      if (!$result) {
      $flag = false;
      echo "Error details: " . mysqli_error($conn) . ".";
    }

    if ($flag) {
      mysqli_commit($conn);
      echo "All queries were executed successfully";
      header("refresh:3;url=rollbackcompleteT.php");
    } else {
      mysqli_rollback($conn);
      echo "All queries were rolled back";
    }    
?>