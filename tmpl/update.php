<?php
    include_once '../tmpl/safemysql01.class.php';
	$db     = new SafeMysql();
	session_start();
	$userid=$_SESSION['key'];
	$table  = "answer"; 
	$fields = ['qsn', 'ball', 'eid', 'userid', 'page', 'date', 'ip'];
	$data = array();
	$array1 = array();
	$i=0;			
	$ins = array();
    //quiz start
    $page=@$_GET['page'];
//	$date=now();
	$eid = @$_POST['eid'];
	$optionid = @$_POST['optionid'];
//	$rad = ( $_POST ); //
 	$nr=@$_GET['n'];
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
    } 
	
	else {
		if (isset($_POST['update']))
          {
		
		$db->query("DELETE FROM ?n WHERE userid=?s AND page=?s", $table, $_POST['update'], $page-1);

		}

//	echo '<pre>'.print_r($_POST,true).'</pre>';
//	echo '<pre>'.print_r($_REQUEST).'</pre>';	
//	echo '<pre> $eid:'.print_r($eid).'</pre>';	
//	echo '<pre> - </pre>';

		
		foreach( $_POST as $key=>$value )  // Загоняем в общий массив eid _SESSION['key'] $optionid
		{	
			if (!is_array($value)) {
				$flag = stristr ($key, 'ball');
			// Если такие индексы нашлись, то 
				if($flag){
//					$qsn = substr($key , 4);    // обрезаем ball первые 4 символа оставляя только "цифры"
					$array1[] = array( $key, $value, $eid[$i], $_SESSION['key']);

	echo "\n Вложенный массив eid: $eid[$i]; Значение optionid[i]: $optionid[$i]<br />\n";
					$i++;
		}
					}
//		unset( $value );	// для удаления переменной
}
		echo '<pre>optionid:'.print_r($optionid).'</pre>';
//-----------------------------------multi insert--------------------------------------------------- 
 $fields1 = implode(', ', $fields);

			{
			foreach($array1 as $ar1value) {
				if(is_array($ar1value)){
					 $ins[] = $db->parse("(?s,?s,?s,?s,?s,?s,?s)",$ar1value[0], $ar1value[1], $ar1value[2], $ar1value[3], $page-1, time(), $ip);		
					  $instr = implode(",",$ins);
					  $query = "INSERT INTO $table ($fields1) VALUES ?p(" . $instr . ")";
			}
		}
$db->query("INSERT INTO $table ($fields1) VALUES ?p",$instr);
		

//------------------------------------Вывод информации------------------------------------------------	
	
	
	echo '<pre><p>array1:'.print_r($array1).'</p></pre>';
	echo '<pre>PHP_EOL:'.$query.PHP_EOL.'</pre>';
//	echo '<pre>eid:'.print_r($eid).'</pre>';
//	echo '<pre>data:'.print_r($data).'</pre>';
//	echo '<pre>array3:'.print_r($array3).'</pre>';
//	echo '<pre>result:'.print_r($result).'</pre>';
//	echo '<pre>array2:'.print_r($array2).'</pre>';
//	echo '<pre>data:'.var_dump($values).'</pre>';
//	echo '<pre>data:'.var_dump($valeid).'</pre>';	
			}	
		  if($page != ($total+1))
		  {
			header("location:../quest.php?page=$page")or die('Error3');
			}     
		  else if( $_SESSION['key']=$_SESSION['key']){
		  $db->query("INSERT INTO history (eid,title,sahi,total,time,intro,tag,sum,wrong,ip,userid,date) SELECT q.eid, q.title, q.sahi, q.total, q.time, q.intro, q.tag, SUM(ball), SUM(ball)/q.sahi*100, ?s, ?s, ?s FROM quiz q, answer a WHERE a.eid=q.eid AND a.userid='$userid' GROUP BY q.eid", $ip, $userid, time() ); 
		  $db->query("DELETE FROM answer WHERE userid='$userid'");
	  header("location:../result.php")or die('Error5');
	  }
    }
?> 


