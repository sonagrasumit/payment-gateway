 <?php
      session_start();
      include("loginT.php");
      include("connectT.php");
      $accountno = $_POST['accountno'];
      $baccountno = $_POST['baccountno'];
      $amount = $_POST['amount'];
      $_SESSION['accountno'] = $accountno;
      $_SESSION['baccountno'] = $baccountno;
      $_SESSION['amount'] = $amount;
     
      $conn = mysqli_connect('localhost', 'root', '', 'mysql'); //connect to the database.
      mysqli_autocommit($conn, false);
      $flag = true;
      
      $c_d = "SELECT balance from customer WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $c_d) or die('error');
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new - $amount;
      $c_d_update = "INSERT into customer values (now(), $accountno, $amount, 'debit', $balance_new_insert, $baccountno)";
      
      $cm_c = "SELECT balance from customer_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $cm_c) or die('error');
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new + $amount;
      $cm_c_update = "INSERT into customer_master values (now(), $accountno, $amount, 'credit', $balance_new_insert, $baccountno)";
    
      $cm_d = "SELECT balance from customer_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $cm_d) or die('error');
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      echo $balance_new;
      $balance_new_insert = $balance_new - $amount;
      echo $balance_new_insert;
      $cm_d_update = "INSERT into customer_master values (now(), $accountno, $amount, 'debit', $balance_new_insert, $baccountno)";

      $mm_c = "SELECT balance from merchant_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $mm_c) or die('error');
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new + $amount;
      $mm_c_update = "INSERT into merchant_master values (now(), $accountno, $amount, 'credit', $balance_new_insert, $baccountno)";
      
      $mm_d = "SELECT balance from merchant_master WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $mm_d) or die('error');
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new - $amount;
      $mm_d_update = "INSERT into merchant_master values (now(), $accountno, $amount, 'debit', $balance_new_insert, $baccountno)";
      
      $m_c = "SELECT balance from merchant WHERE account = 100001 ORDER BY date desc limit 1";
      $result = mysqli_query($conn, $m_c) or die('error');
      $value = mysqli_fetch_object($result);
      $balance_new = $value -> balance;
      $balance_new_insert = $balance_new + $amount;
      $m_c_update = "INSERT into merchant values (now(), $accountno, $amount, 'credit', $balance_new_insert, $baccountno)";

      
      $result = mysqli_query($conn, $c_d_update);

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

      $result = mysqli_query($conn, $m_c_update);

      if (!$result) {
      $flag = false;
      echo "Error details: " . mysqli_error($conn) . ".";
    }

    if ($flag) {
      mysqli_commit($conn);
      echo "All queries were executed successfully";
      header("refresh:3;url=completeT.php");
    } else {
      mysqli_rollback($conn);
      echo "All queries were rolled back";
    }    
?>