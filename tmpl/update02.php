

	
<?php
    include_once '../tmpl/safemysql01.class.php';
	$db     = new SafeMysql();
	session_start();
	$userid=$_SESSION['key'];
	$table  = "answer"; 
	$fields = ['ansid', 'qsn', 'ball', 'userid'];
	$data = array();
	$array1 = array();
	$array3 = array();
	$i=0;			
	$ins = array();
    //quiz start
    $page=@$_GET['page'];
//	$date=now();
	$eid = $_POST['eid'];
//	$rad = ( $_POST ); //
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
	$array2 = array(
    0 => array ( "ansid", "qsn", "ball", "userid"),
    1 => array ( "Ian", "24", "male", "4"),
    2 => array ( "Janice", "21", "female", "5"),
	3 => array ( "Febral", "10", "male", "11")
	);
	$i=0;	

		
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
	echo '<pre>'.print_r($_POST,true).'</pre>';
//	echo '<pre>'.print_r($_REQUEST).'</pre>';	
	echo '<pre> $eid:'.print_r($eid).'</pre>';	
	echo '<pre> - </pre>';
		
		foreach( $_POST as $key=>$value )
		{	

			if (!is_array($value)) {
//					echo '<br> размер нашего массива: '. count($value, COUNT_RECURSIVE). '<br/>'; // узнаем размер нашего массива
//					foreach ($data  as $k=>$v) {

//					echo "\n $k: $v <br/>\n";
// В переменную $flag попадает индекс массива в котором содержится слово 'ball'
				$flag = stristr ($key, 'ball');
			// Если такие индексы нашлись, то 
				if($flag){

					
					$qsn = substr($key , 4);    // обрезаем ball первые 4 символа оставляя только "цифры"
					$array1[] = array( $eid[$i], $key, $value, $_SESSION['key']);
//					$array1[] = array( $qsn, $key, $value, $_SESSION['key']);
//					array_push($array3, $eid);
//					array_push ($array1[$i], $key, $value, $_SESSION['key']);
					$i++;
		}
	
//		echo "\n flag: $flag; Значение key: $key<br />\n";	

//					$data['qsn']=$qsn;
//					$data['ball']=$value; //собираем баллы
//					$data[$flag]=$value;
			
				}
//					unset( $value );	// для удаления переменной
//			else {

//				$array1 += array( $key => array( $eid ));
//				foreach($value as $key=>$eid)
//				{	
//					echo "\n Вложенный массив Ключ: $key; Значение eid: $eid<br />\n";
//					foreach ($eid  as $k=>$v) echo "\n еще массив: $k: $v <br/>\n";
//					$data = $value;
//					$data = array('eid'=>$eid);
//					$data['userid']=$_SESSION['key'];
//					$data[$key]=$eid;
//				}
			unset( $value );	// для удаления переменной
//		}
			
//	$fields = implode(',', array_shift($array1)); // взять имена полей в начале массива
//	foreach($array1 as $row) {
//    $ansid = $row[0];
//    $qsn = (int) $row[1];
//    $ball = $row[2];
//	$userid = $row[3];
//	$data[] = "('$ansid', $qsn, '$ball', '$userid')";
}

//$values = implode(',', $data);

//$sql = "INSERT INTO yourtable ($fields) VALUES $values";
	
//$my_array = array('a'=>'1', 'b'=>'2', 'c'=>'3');
//$my_array +=	array('d'=>'4', 'e'=>'5', 'f'=>'6');
//echo "\n\n----".implode(',',array_keys($my_array));
//echo "\n\n----".implode(',',$my_array)."\n\n";	
//		$i=0;
//		$new=array();
//		foreach ($eid as $eval) 
//		{
//			foreach($array1 as $ar1value) {
//				if(is_array($ar1value)){
//				foreach($ar1value as &$arvalue)		{
//					$arvalue = $eval;							
//					 echo "\n <br> Вложенный массив eid Ключ: $eval; Значение ar1value: $arvalue<br />\n";
//			}
//				}
//				$array3[] = [ $ar1key => $ar1value ];
//			$new[ $ar1value[$ar1key] ] = $eval;
//	
//			++$i;
//		}
//		$array1[$ar1key] = $new;
//		unset($arvalue);
			

//		$data = $array1[$ekey] + array($ekey => $eval);
//		$array1[$ekey] = $eval;
//		$result = array_merge((array)$eval, (array)$array1);
		//	$result = $eid + $array3;
		// 
//		
//		}
//		$result = array_merge($eid, $array1);
//-------------------------------------------------------------------------------------
$fields = implode(', ', array_shift($array2));
$values = array();
foreach ($array1 as $rowValues) {
//	$data = array_merge($rowValues, $eid);
    $values[] = "(" . implode(', ', $rowValues) . ")";
}

	$valeid[] = "(" . implode(', ', $eid) . ")";
$query = "INSERT INTO table_name ($fields) VALUES (" . implode (', ', $values) . ")";

//------------------------------------------------------------------------------------		
	
	echo '<pre><p>array1:'.print_r($array1).'</p></pre>';
	echo '<pre>PHP_EOL:'.$query.PHP_EOL.'</pre>';
//	echo '<pre>eid:'.print_r($eid).'</pre>';
//	echo '<pre>data:'.print_r($data).'</pre>';
//	echo '<pre>array3:'.print_r($array3).'</pre>';
//	echo '<pre>result:'.print_r($result).'</pre>';
//	echo '<pre>array2:'.print_r($array2).'</pre>';
//	echo '<pre>data:'.var_dump($values).'</pre>';
//	echo '<pre>data:'.var_dump($valeid).'</pre>';	
		
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
		  		  
// print '<pre>';
// echo 'массив '.$_SESSION['key'].' ключ => значение.';
//echo "\n Значение POST: $_POST<br />\n";
//print '</pre>';
// print '<pre>';
// echo session_name().' = '.session_id();
// print '</pre>';		  
	  header("location:../result.php")or die('Error5');
	  }
    } 
	

?> 


