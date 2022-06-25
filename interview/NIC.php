<?php

    // NIC Validation

	if (isset($_POST['submit'])){
		$cnic = $_POST['cnic'];
		$phone = $_POST['phone'];	
	}
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Validation Example</title>
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
  <hr width="100%">

<form action="NIC.php" method="POST">
    
     <input type="text"  data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  name="cnic" required="" >

    <input type="text"  data-inputmask="'mask': '0399-99999999'" required=""  type = "number" name="phone" maxlength = "12" required>

    <button type="submit" name="submit">Validate</button>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
   
   <script>
    $(":input").inputmask();

   </script>

</body>
</html>