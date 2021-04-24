<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8"" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MYCLOUD | ДИАГНОСТИКА СИСТЕМЫ УПРАВЛЕНИЯ ПЕРСОНАЛОМ </title>
		    
		<link rel="stylesheet" href="./css/main.css">
		<link  rel="stylesheet" href="./css/font.css">
	    
		<link href="./js/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="./js/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
		<script src="./js/bootstrap/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/anychart-ui.min.css" />
    <link rel="stylesheet" href="./css/anychart-ui.css"/>
	<link rel="stylesheet" href="./css/roboto.css" type='text/css'>
	
		<script src="./js/jquery/dist/jquery.min.js"></script>
		<script src="./js/jquery/jquery.js" type="text/javascript"></script>
	<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-vml.min.js"></script>


	

	
<!--

<link rel="stylesheet" href="../_css/style.css"/>
		<script src="../js/chartist/dist/chartist.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<link rel="stylesheet" href="../js/chartist/dist/chartist.min.css">	
		<link  rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
		<script src="../js/bootstrap.min.js"  type="text/javascript"></script>
-->
	

</head>

<body>
<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Навигация по сайту</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>MYCLOUD</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="quest.php?page=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Главная<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="quest.php?page=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;История</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="quest.php?page=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Графики</a></li>
		<li class="pull-right"> <a href="./index.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Выход</a></li>	  
		</ul>

		<?php 
		session_start();
		
		if ($_SESSION['key']): ?>
		<form method="POST"  action="./tmpl/update.php">
		<div class="text-right py-3">
        <ul class="list-unstyled list-inline mb-0">
            <li class="list-inline-item">
                <h5 class="mb-1">Сбросить результат</h5>
            </li>
            <li class="list-inline-item">
                <input class="btn btn-danger btn-rounded" type="submit" value="Начать заново!">
				<input type="hidden" name="delete" value="<?=$_SESSION["key"]?>">
            </li>
        </ul>
	    </div>
		</form>		
		<? endif ?>
		
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
  <div id="container_diagram"></div>

  <div class="panel title">
	<center><h1 class="title" style="color:#660033">Ваш результат:</h1><center><br />
	
	<table class="table table-striped title1" style="font-size:20px;font-weight:1000;">
	
	<div class="table-responsive" id="questinfo">
	<table class="table table-striped title1" >	<tr style="color:red"><td><b>Сфера управления персоналом</b></td><td><b>Баллов</b></td><td><b>&nbsp;Из&nbsp;</b></td><td><b>&nbsp;%&nbsp;</b></td></tr>

<?php	include_once  './tmpl/graph.php'; ?>
		</table>


</div>		
</div>
		
<!--Footer-->
<footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

    <!--Footer Links-->
    <div class="container text-center text-md-left">
        <div class="row">

            <!--First column-->
            <div class="col-md-4">
                <h5 class="text-uppercase font-weight-bold">Дата отчета: 2018.04.24</h5> <p>IP adress: 192.168.0.5</p>
            </div>
       

            <!--First column-->
            <div class="col-md-4">              
				<ul class="list-unstyled">
                    <li>
                        <a href="#!">Главная</a>
                    </li>
                    <li>
                        <a href="#!">История</a>
                    </li>
                    <li>
                        <a href="#!">Графики</a>
                    </li>
                    <li>
                        <a href="#!">Выход</a>
                    </li>
                </ul>
            </div>
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
<!--/.Footer-->
                      
			
					
		

		
		


	 </body>
</html>

 