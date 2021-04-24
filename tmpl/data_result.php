
<?php
include_once '../tmpl/safemysql01.class.php';
$db = new safeMysql();
	session_start();
	$userid=$_SESSION['key'];

	//result display
	$eid=@$_GET['eid'];
	
	if ($userid)
    {
        $LIST = $db->getAll("SELECT tag, sum as value, sahi  FROM history WHERE userid=?s", $userid);
    } else { 
        header("location:../tmpl/quest.php?page=1")or die('Error11');
    } 

// Loop through the result and populate an array
//	$row = Array();

//array_pop($LIST);

		
 	


// Return the result and close MySQL connection
//    $mysqli->close();
    header('Content-type: application/json');
	echo json_encode($LIST);

?>
