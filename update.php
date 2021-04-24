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
	$fields = ['ansid', 'qsn', 'ball', 'userid'];
	$data = array();
    //quiz start
    $page=@$_GET['page'];
//	$date=now();
	$eid=0;
	$rad = ( $_POST ); // Принимаем массив данных со всех radio и заносим в переменную
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
	echo $db->lastQuery();
		header("location:../quest.php?page=$page&")or die('Error3');
		}
    } 
	
	else { 
//  print '<pre>';
//	if (isset($_POST['eid'])) echo $_POST['eid'];
//	print '</pre>';
//POST-переменные
//	echo '<pre>'.print_r($_POST,true).'</pre>';
	echo '<pre>'.print_r($_REQUEST).'</pre>';	
	echo '<pre>';
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
					$data[$key]=$value;
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
	echo "\n";
	print_r($data);
			
$ins = array();
foreach ($data as $row) {
echo '<pre>'.print_r ($row).'</pre>';
	
 //   $ins[] = $db->parse("(NULL,?s,?s, NOW())",$row['.$i.'],$row['lastname']);
}
//$instr = implode(",",$ins);
//$db->query("INSERT INTO table VALUES ?p",$instr);
			
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

