<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // This if statement checks to determine whether the add device form has been submitted 
    // If it has, then the add device code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
        // Ensure that the user has entered a non-empty devicername 
        if(empty($_POST['devicename'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors 
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a devicename."); 
        } 

        // We will use this SQL query to see whether the devicename entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :devicename is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = " 
            SELECT 
                1 
            FROM devices 
            WHERE 
                devicename = :devicename 
        "; 
         
        // This contains the definitions for any special tokens that we place in 
        // our SQL query.  In this case, we are defining a value for the token 
        // :devicename.  It is possible to insert $_POST['devicename'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
        // For more information on SQL injections, see Wikipedia: 
        // http://en.wikipedia.org/wiki/SQL_Injection 
        $query_params = array( 
            ':devicename' => $_POST['devicename'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching devicename was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This devicename is already in use"); 
        } 
		
        // Ensure that the user has entered a non-empty macaddress 
        if(empty($_POST['macaddress'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors 
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a macaddress."); 
        } 

        // We will use this SQL query to see whether the macaddress entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :macaddress is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = " 
            SELECT 
                1 
            FROM devices 
            WHERE 
                macaddress = :macaddress 
        "; 
         
        // This contains the definitions for any special tokens that we place in 
        // our SQL query.  In this case, we are defining a value for the token 
        // :macaddress.  It is possible to insert $_POST['macaddress'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
        // For more information on SQL injections, see Wikipedia: 
        // http://en.wikipedia.org/wiki/SQL_Injection 
        $query_params = array( 
            ':macaddress' => $_POST['macaddress'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching macaddress was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This macaddress is already in use"); 
        }
        // Ensure that the user has entered a non-empty ipcaddress 
        if(empty($_POST['ipaddress'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors 
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a ipaddress."); 
        } 

        // We will use this SQL query to see whether the ipaddress entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :ipaddress is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = " 
            SELECT 
                1 
            FROM devices 
            WHERE 
                ipaddress = :ipaddress 
        "; 
         
        // This contains the definitions for any special tokens that we place in 
        // our SQL query.  In this case, we are defining a value for the token 
        // :ipaddress.  It is possible to insert $_POST['ipaddress'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
        // For more information on SQL injections, see Wikipedia: 
        // http://en.wikipedia.org/wiki/SQL_Injection 
        $query_params = array( 
            ':ipaddress' => $_POST['ipaddress'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching ipaddress was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This ipaddress is already in use"); 
        }         
		
        // An INSERT query is used to add new rows to a database table. 
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = " 
            INSERT INTO devices ( 
                devicename, 
                macaddress, 
                ipaddress
            ) VALUES ( 
                :devicename, 
                :macaddress, 
                :ipaddress
            ) 
        "; 
          
        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.  We do store 
        // the salt (in its plaintext form; this is not a security risk). 
        $query_params = array( 
            ':devicename' => $_POST['devicename'], 
            ':macaddress' => $_POST['macaddress'], 
            ':ipaddress' => $_POST['ipaddress']
        ); 
         
        try 
        { 
            // Execute the query to create the device 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This redirects the user back to the login page after they register 
        header("Location: wol.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to wol.php"); 
    } 
     
?>
<html lang="en" >
  <head>
    <title>Remote Wake/Sleep-On-LAN</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A utility for remotely waking/sleeping a Windows computer via a Raspberry Pi">
    <meta name="author" content="Jeremy Blum">

    <!-- Le styles -->
    <link href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px !important;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 600px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/favicon.png">
  </head> 
<h1>Add New Device</h1> 
<form action="add_devices.php" method="post"> 
    Device Name:<br /> 
    <input type="text" name="devicename" value="" /> 
    <br /><br /> 
    MAC Address:<br /> 
    <input type="text" name="macaddress" value="" /> 
    <p>Format MAC address like a1:b2:c3:d4:e5:f6 including colons.</p>
    <br /><br /> 
    IP Address:<br /> 
    <input type="text" name="ipaddress" value="" /> 
	<p>Format IP Address like 192.168.1.x including periods.</p>
    <br /><br /> 
    <input type="submit" value="Submit" /> 
</form>
<a href="devicelist.php">View Existing Devices in List</a><br />
<a href="wol.php">Main Page</a><br />
