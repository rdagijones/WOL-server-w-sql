<?php     // First we execute our common code to connection to the database and start the session     require("common.php");          // At the top of the page we check to see whether the user is logged in or not     if(empty($_SESSION['user']))     {         // If they are not, we redirect them to the login page.         header("Location: index.php");                  // Remember that this die statement is absolutely critical.  Without it,         // people can view your members-only content without logging in.         die("Redirecting to index.php");     } ?><html lang="en" >  <head>    <title>Remote Wake/Sleep-On-LAN</title>    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta name="description" content="A utility for remotely waking/sleeping a Windows computer via a Raspberry Pi">    <meta name="author" content="Jeremy Blum">    <!-- Le styles -->    <link href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/css/bootstrap.css" rel="stylesheet">    <style type="text/css">      body {        padding-top: 40px !important;        padding-bottom: 40px;        background-color: #f5f5f5;      }      .form-signin {        max-width: 600px;        padding: 19px 29px 29px;        margin: 0 auto 20px;        background-color: #fff;        border: 1px solid #e5e5e5;        -webkit-border-radius: 5px;           -moz-border-radius: 5px;                border-radius: 5px;        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);                box-shadow: 0 1px 2px rgba(0,0,0,.05);      }      .form-signin .form-signin-heading,      .form-signin .checkbox {        margin-bottom: 10px;      }      .form-signin input[type="text"],      .form-signin input[type="password"] {        font-size: 16px;        height: auto;        margin-bottom: 15px;        padding: 7px 9px;      }    </style>    <link href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->    <!--[if lt IE 9]>      <script src="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/js/html5shiv.js"></script>    <![endif]-->    <!-- Fav and touch icons -->    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-144-precomposed.png">    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-114-precomposed.png">    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-72-precomposed.png">    <link rel="apple-touch-icon-precomposed" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/apple-touch-icon-57-precomposed.png">    <link rel="shortcut icon" href="<?php echo $BOOTSTRAP_LOCATION_PREFIX; ?>bootstrap/ico/favicon.png">  </head><h2>Delete Users</h2></div><div class="divB"><div class="divD"><p>Click On User Name to Choose to Delete</p><?php$connection = mysql_connect($host, $username, $password); // Eastablishing Connection With Server.$db = mysql_select_db($dbname, $connection); // Selecting Database From Server.if (isset($_GET['del'])) {$del = $_GET['del'];//SQL query for deletion.$query1 = mysql_query("delete from users where id=$del", $connection);}$query = mysql_query("select * from users", $connection); // SQL query to fetch data to display in menu.while ($row = mysql_fetch_array($query)) {echo "<b><a href=\"delete.php?id={$row['id']}\">{$row['username']}</a></b>";echo "<br />";}?></div><?phpif (isset($_GET['id'])) {$id = $_GET['id'];// SQL query to Display Details.$query1 = mysql_query("select * from users where id=$id", $connection);while ($row1 = mysql_fetch_array($query1)) {?><form class="form"><h2>---Details---</h2><span>Username:</span> <?php echo $row1['username']; ?><span>E-mail:</span> <?php echo $row1['email']; ?><<?php echo "<b><a href=\"delete.php?del={$row1['id']}\"><input type=\"button\" class=\"submit\" value=\"Delete\"/></a></b>"; ?></form><?php}}// Closing Connection with Server.mysql_close($connection);?><div class="clear"></div></div><div class="clear"></div></div><br><a href="memberlist.php">View Existing Users</a><br /><a href="wol.php">Main Page</a><br /></body></html