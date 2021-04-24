<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8"" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MYCLOUD | ДИАГНОСТИКА СИСТЕМЫ УПРАВЛЕНИЯ ПЕРСОНАЛОМ </title>
<link  rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../css/main.css">
 <link  rel="stylesheet" href="../css/font.css">
 <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>

<body>

	
<?php
    include_once '../tmpl/safemysql01.class.php';
	$db     = new SafeMysql();
	session_start();
	$userid=$_SESSION['key'];
	$table  = "answer"; 
//	$fields = ['ansid', 'qsn', 'ball', 'userid'];
	$data = array();
    //quiz start
    $page=@$_GET['page'];
//	$date=now();
	$eid=0;
//	$rad = ( $_POST ); // Принимаем массив данных со всех radio и заносим в переменную
 	$qsn = '';
	$core = '';
	$tstat=0;
	$total=@$_GET['t'];

      		  
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR']; } 
		else { $ip_address = $_SERVER['REMOTE_ADDR']; }
		$ip=$ip_address;
		// Начало проверки заполнения	
		if($_SERVER['REQUEST_METHOD']=='POST')

	if (isset($_POST['delete'])) {
		$table="history";
		$data = $db->filterArray($_POST, $fields);
		{
		$db->query("DELETE FROM ?n WHERE userid=?s", $table, $_POST['delete']);
		header("location:../quest.php?page=1")or die('Error17');
		}
    } elseif ($_POST==NULL) { 
        $data = $db -> query("SELECT * FROM ?n WHERE userid=?s ORDER BY ansid DESC LIMIT 3", $table, $_POST['back']);
		//То что выбрали ранее
	foreach ($data as $key=>$value ){
	--$page;
//	$eid=$row['eid'];
	echo "\n Ключ: $key; Значение value: $value<br />\n";
//	echo $db->lastQuery();
		header("location:../quest.php?page=$page&")or die('Error3');
		}
    } 
	
	else { 
	$array = array(
    0 => array ( "ansid", "qsn", "ball", "userid"),
    1 => array ( "Ian", "24", "male", "4"),
    2 => array ( "Janice", "21", "female", "5"),
	3 => array ( "Febral", "10", "male", "11")
	);
		
$fields = implode(',', array_shift($array)); // взять имена полей в начале массива
foreach($array as $row) {
    $ansid = $row[0];
    $qsn = (int) $row[1];
    $ball = $row[2];
	$userid = $row[3];
	$data[] = "('$ansid', $qsn, '$ball', '$userid')";
}

$values = implode(',', $data);

$sql = "INSERT INTO yourtable ($fields) VALUES $values";
echo $sql.PHP_EOL;
//-------------------------------------------------------------------------------------
//$fields = implode(', ', array_shift($array));

//$values = array();
//foreach ($array as $rowValues) {
//    foreach ($rowValues as $key => $rowValue) {
//         $rowValues[$key] = $rowValues[$key];
//    }
//    $values[] = "(" . implode(', ', $rowValues) . ")";
//}
//$query = "INSERT INTO table_name ($fields) VALUES (" . implode (', ', $values) . ")";
//		echo $query.PHP_EOL;
		
//---------------------------------------------------------------------------------------
//$count = count($array);
//$keys = $array[0];
//for($i = 1; $i < $count; $i++)
//{
//   $query = "INSERT INTO tablename (" . implode(",", $keys) . ") VALUES ('" . implode ("','", $array[$i]) . "');";
//   $query = str_replace(',)', ')', $query);
//   mysql_query($query);
//	echo $query.PHP_EOL;
//}
//-------------------------------------------------------------------------------------- multi insert
//$i=0;			
$ins = array();
//foreach ($array as $key=>$row) {
//echo '<pre>'.print_r ($row).'</pre>';
//$newdata = implode(",", array_keys($array)); //ключи массива array_keys($array)
//    echo "<pre> --- " .$newdata."</pre>";	 
//    $ins[] = $db->parse("(NULL,?s,?s, NOW())",$key,$row);
//++$i;
//}
//$instr = implode(",",$ins);
//$query=	query("INSERT INTO table VALUES ?p",$instr);
//$db->query("INSERT INTO table VALUES ?p",$instr);
//		echo $query.PHP_EOL;
//-----------------------------------------		
		
//  print '<pre>';
//	if (isset($_POST['eid'])) echo $_POST['eid'];
//	print '</pre>';
//POST-переменные
//	echo '<pre>'.print_r($_POST,true).'</pre>';
//	echo '<pre>'.print_r($_REQUEST).'</pre>';	
//	echo '<pre>';
		foreach( $_POST as $key=>$value )
		{							
			if (!is_array($value)) {
// В переменную $flag попадает индекс массива в котором содержится слово 'ball'
				$flag = stristr ($key, 'ball');
			// Если такие индексы нашлись, то 
				if($flag){
//		echo "\n flag: $flag; Значение key: $key<br />\n";	
					$qsn = substr($key , 4);    // обрезаем ball первые 4 символа оставляя только "цифры"
//	не вставляется 	$data = array ('qsn'=>$qsn,'ball'=>$value, 'eid'=>$eid, 'userid'=>$_SESSION['key']);
//					$data['qsn']=$qsn;
//					$data['ball']=$value; //собираем баллы
									
//					foreach ($data  as $k=>$v) echo "\n $k: $v <br/>\n";
					$data[$flag]=$value;
//					
				}

//					foreach ($data  as $k=>$v) echo "\n в итоге: $k: $v <br/>\n";
					unset( $value );	// для удаления переменной
			}

			else {
				foreach($value as $key=>$eid)
				{
//					echo "\n Вложенный массив Ключ: $key; Значение eid: $eid<br />\n";
//					$data = $value;
//					$data = array('eid'=>$eid);
//					$data['userid']=$_SESSION['key'];
					$data[$key]=$eid;
//	если здесь вставляю			$sql = 'INSERT INTO '.$table.' SET date=unix_timestamp(), ip=inet_aton(?s),?u';
//	не вставляются  qsn и ball	$db->query($sql, $ip, $data);
				}
//	foreach ($data  as $k=>$v) echo "\n разбираем массив data: $k: $v <br/>\n";	

			unset( $value );	// для удаления переменной
		}

	echo '<pre>'.print_r($data).'</pre>';	

	
//$my_array = array('a'=>'1', 'b'=>'2', 'c'=>'3');
//$my_array +=	array('d'=>'4', 'e'=>'5', 'f'=>'6');
//echo "\n\n----".implode(',',array_keys($my_array));
//echo "\n\n----".implode(',',$my_array)."\n\n";		
		}

		
		  if($page != ($total+1))
		  {
//			header("location:../quest.php?page=$page")or die('Error3');
			}     
		  else if( $_SESSION['key']=$_SESSION['key']){
	
//		$select="SELECT q.eid, q.title, q.sahi, q.total, q.time, q.intro, q.tag, @wrong:=SUM(ball), ?s, ?s, ?s FROM quiz q, answer a WHERE a.eid=q.eid AND a.userid=$userid GROUP BY q.eid" ;
//		$insert='INSERT INTO history (eid,title,sahi,total,time,intro,tag,sum,ip,userid,date,wrong)'; 
//		$db->query($insert, $select, $ip, $userid, time() ); 

		  $db->query("INSERT INTO history (eid,title,sahi,total,time,intro,tag,sum,wrong,ip,userid,date) SELECT q.eid, q.title, q.sahi, q.total, q.time, q.intro, q.tag, SUM(ball), SUM(ball)/q.sahi*100, ?s, ?s, ?s FROM quiz q, answer a WHERE a.eid=q.eid AND a.userid='$userid' GROUP BY q.eid", $ip, $userid, time() ); 
//		  $db->query("DELETE FROM answer WHERE userid='$userid'");
		  		  
 print '<pre>';
// echo 'массив '.$_SESSION['key'].' ключ => значение.';
//echo "\n Значение POST: $_POST<br />\n";
print '</pre>';
// print '<pre>';
// echo session_name().' = '.session_id();
// print '</pre>';

		  
	  
		 

		  
	  header("location:../result.php")or die('Error5');
	  }
    } 
	

?> 

</body>
</html>

