<html>
    <head>
      <title>Payment Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
         #accountno{
         	align-self: center;
         }
      </style> 
    </head>
    <body>
        <form action="/dataCollectT.php" method = "post" id="usrform">
			Account No:<br> <input type="number" name="accountno" min = "100000" max="999999" id="accountno"><br>
			Beneficiary Account No:<br> <input type="number" name="baccountno" min = "100000" max = "999999" id="baccountno"><br>
			Amount:<br> <input type="text" name="amount" id="amount" min="100" max="25000"><br>
			<input type="submit">
		</form>
		<br>
    </body>
    
</html>