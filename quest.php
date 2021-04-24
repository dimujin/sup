<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

<title>Лаборатория Роста | ДИАГНОСТИКА СИСТЕМЫ УПРАВЛЕНИЯ ПЕРСОНАЛОМ </title>
	 <link rel="stylesheet" href="./css/main.css"/>
<link  rel="stylesheet" href="./css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="./css/bootstrap-theme.min.css"/>    

 <link  rel="stylesheet" href="./css/font.css"/>
  <script src="./js/jquery/jquery.js" type="text/javascript"></script>
  <script src="./js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
	

</head>

<body>
<!--navigation menu-->
<nav class= "navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Навигация по сайту</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!--<a class="navbar-brand" href="#"><b>Лаборатория Роста</b></a>-->
		<a class="navbar-brand" href="/"><img src="image/Gl-goriz.png" alt="Лаборатория Роста" class="desktop"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Главная<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="quest.php?page=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;История</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="result.php"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Графики</a></li>
		<li class="pull-right"> <a href="../index.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Выход</a></li>
		</ul>

      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->

<?php
	include_once './tmpl/safemysql01.class.php';
	session_start();
	$_SESSION["key"]=session_id();
	$db = new safeMysql();
	$back_page = @$_GET[$back_page];
	$backarr = array();
	$i=0;
	$act = 'insert';

//сколько вопросов выводить на страницу
	$per_page = 3;

//получаем номер страницы и значение для лимита 
	$cur_page = 1;
	if (isset($_GET['page']) && $_GET['page'] > 0) 
	{
		$cur_page = $_GET['page'];
	}
	$start = ($cur_page - 1) * $per_page;

//выполняем запрос и получаем данные для вывода
	$sql  = "SELECT SQL_CALC_FOUND_ROWS * FROM questions WHERE qid='standart1' LIMIT ?i, ?i";
	$data = $db->getAll($sql, $start, $per_page);
	$rows = $db->getOne("SELECT FOUND_ROWS()");
//узнаем общее количество страниц и заполняем массив со ссылками
	$total = ceil($rows / $per_page);
// зададим переменную, которую будем использовать для вывода номеров страниц
	$page = 0;
	echo '<div class="container">';
//а дальше выводим в шаблоне данные и навигацию: echo '<a href=?id='.$row['eid'].'>'.$row['qns'].'</a><br>';
	echo'Всего <b>'.$rows.'</b> вопросов:&nbsp;&nbsp;&nbsp;';
	echo'Страницы: ';
	  while ($page++ < $total){
		  if ($page == $cur_page){ 
		echo'<b>&nbsp;'.$page.'&nbsp;</b>';
		  }
	  else echo'<a href=?page='.$page.'>&nbsp;'.$page.'&nbsp;</a>';
		}
	  $page = ++$cur_page;
	$back_page = $cur_page-2;
  echo '<form name="form" action="./tmpl/update.php?page='.$page.'&t='.$total.'" method="POST" class="form-horizontal">';

  echo '<div class="btn-toolbar">  <div class="btn-group btn-group-lg">';
if ($page > 2):
  echo '<a href="quest.php?q=back&page='.$back_page.'" class="btn btn-primary">&nbsp;Назад</a>';
endif;
  echo '  <button type="submit" class="btn btn-primary">&nbsp;Далее</button>  </div></div></div>';

		$back = $db -> getAll("SELECT ball FROM answer WHERE userid=?s AND page=?s", $_SESSION["key"], $_GET['page']);
		if (!empty( $back )) {
			foreach ($back as $key=>$value ){
				if (is_array($value)) {
					foreach ($value as $value1 ){
			//	$eid=$row['eid'];
				$backarr[] = $value1;
			$act = 'update';
			}
		}
		}
//		echo '<pre><p>back:'.print_r($backarr).'</p></pre>';
		}
	//POST-переменные
//	echo '<pre>'.print_r($back,true).'</pre>';
//Выводим вопросы
	foreach ($data as $row){

	++$start;
	$eid=$row['eid'];
	$qid=$row['qid'];
	$sn =$row['sn'];
	$qns =$row['qns'];	
	  echo '<div class="panel" style="margin:5%">';
	  echo '<p><b>'.$qns.'</b></p>';
//Рисуем радио-ответы
	  echo '<div class="btn-group">';

//	echo '<pre>'.print_r($_REQUEST).'</pre>';

		
//Выводим варианты ответов
  $q = $db->query("SELECT * FROM options WHERE qid='$qid'");
    while ($row = $db->fetch($q)){
        $option=$row['option'];
        $optionid=$row['optionid'];
        $ball=$row['ball'];
		$optionid .= $sn;
		$name = 'ball' . $sn;
		
	echo'<div class=" col-xs-12 col-sm-3"><label class="radio" for="'.$optionid.'"><input type="radio" required name="'.$name.'" id="'.$optionid.'" value="'.$ball.'"'; 
		if (!empty( $backarr )) {
		if ($backarr[$i] == $ball) echo 'checked';
		}
	echo '/><div class="radio__text">'.$option.'</div></label></div>';
	
	
	}

		
    echo'</div>';
	echo'</div>';

		++$i;
		echo '<input type="hidden" name="eid[]" value="'.$eid.'"/>';
	}
 

 //print '<br>';

?>

			<input type="hidden" name="<?=$act?>" value="<?=$_SESSION["key"]?>">
	
	<!--Footer-->
<footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

    <!--Footer Links-->
	
		<div class="container">
				  <div class="btn-toolbar">  <div class="btn-group btn-group-lg">
					<?php if ($page > 2){ echo '<a href="quest.php?q=back&page='.$back_page.'" class="btn btn-primary">&nbsp;Назад</a>'; } ?>
					 <button type="submit" class="btn btn-primary">&nbsp;Далее</button>  </div>
    </div>
	
    <hr>

    <!--Call to action-->
    <div class="text-center py-3">
        <ul class="list-unstyled list-inline mb-0">
            <li class="list-inline-item">
                <h5 class="mb-1">Зарегистрироваться и сохранить результат</h5>
            </li>
            <li class="list-inline-item">
                <a href="#!" class="btn btn-danger btn-rounded">Вперед!</a>
            </li>
        </ul>
    </div>
    <!--/.Call to action-->


    <hr>

    <!--Social buttons-->
    <div class="text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
                <a class="btn-floating btn-sm btn-fb mx-1">
                    <i class="fa fa-facebook"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-sm btn-tw mx-1">
                    <i class="fa fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-sm btn-gplus mx-1">
                    <i class="fa fa-google-plus"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-sm btn-li mx-1">
                    <i class="fa fa-linkedin"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-sm btn-dribbble mx-1">
                    <i class="fa fa-dribbble"> </i>
                </a>
            </li>
        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright:
        <a href="https://mdbootstrap.com/material-design-for-bootstrap/"> MDBootstrap.com </a>
    </div>
    <!--/.Copyright-->

</footer>
</form>
	
		</body>
	</html>