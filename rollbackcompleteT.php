
<?php
	ob_start();
	include("loginT.php");
    include("connectT.php");
	$i = 1;
      $j = 1;
      while ($i <= 100 and $j <= 100){
        $sql="SELECT * FROM customer WHERE account = 100001 LIMIT $i, $j";
        $result=mysqli_query($conn,$sql);

      // Numeric array
        $row=mysqli_fetch_array($result,MYSQLI_NUM);
        printf ("%s %s %s %s %s %s<br/>",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        $i = $i + 1;
        $j = $j + 1;  
    }
    $i = 1;
      $j = 1;
      while ($i <= 100 and $j <= 100){
        $sql="SELECT * FROM customer_master WHERE account = 100001 LIMIT $i, $j";
        $result=mysqli_query($conn,$sql);

      // Numeric array
        $row=mysqli_fetch_array($result,MYSQLI_NUM);
        printf ("%s %s %s %s %s %s<br/>",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        $i = $i + 1;
        $j = $j + 1;  
    }
    $i = 1;
      $j = 1;
      while ($i <= 100 and $j <= 100){
        $sql="SELECT * FROM merchant_master WHERE account = 100001 LIMIT $i, $j";
        $result=mysqli_query($conn,$sql);

      // Numeric array
        $row=mysqli_fetch_array($result,MYSQLI_NUM);
        printf ("%s %s %s %s %s %s<br/>",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        $i = $i + 1;
        $j = $j + 1;  
    }
    $i = 1;
      $j = 1;
      while ($i <= 100 and $j <= 100){
        $sql="SELECT * FROM merchant WHERE account = 100001 LIMIT $i, $j";
        $result=mysqli_query($conn,$sql);

      // Numeric array
     	$row=mysqli_fetch_array($result,MYSQLI_NUM);
        printf ("%s %s %s %s %s %s<br/>",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        $i = $i + 1;
        $j = $j + 1;  
    }

    ob_end_flush();
?>

