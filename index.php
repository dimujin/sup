<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-"UTF8"" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Лаборатория Роста || Тестирование персонала </title>
		<link rel="stylesheet" href="./css/main.css">
		<link  rel="stylesheet" href="./css/font.css">
	    
		<link href="./js/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="./js/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/anychart-ui.min.css" />
    <link rel="stylesheet" href="./css/anychart-ui.css"/>
	<link rel="stylesheet" href="./css/roboto.css" type='text/css'>

<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("college must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
</script>


</head>

<body>
<!-- NAVBAR
	      ================================================== -->
        <nav class="navbar navbar-default" role="navigation">
	  	  <div class="container">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			      <span class="sr-only">Навигация</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <!--<a class="navbar-brand" href="#"><b>Лаборатория Роста</b></a>-->
		<a class="navbar-brand" href="/"><img src="image/Gl-goriz.png" alt="Лаборатория Роста" class="desktop"></a>
			    
			  </div>
			  <div class="collapse navbar-collapse navbar-ex1-collapse">
			    <ul class="nav navbar-nav">
			      <li><a onclick="$('.detail').animatescroll({padding:71});">О системе</a></li>
			      <li><a onclick="$('.features').animatescroll({padding:71});">Регистрация</a></li>
			      <li><a onclick="$('.social').animatescroll({padding:71});">О компании</a></li>
			    </ul>
			  </div>
		  </div>
	  </nav>

	   <!-- HEADER
	   ================================================== -->	  
     <header>
		 <div class="container">
			 <div class="row">
				 <div class="col-md-12">
					  <h1>ДИАГНОСТИКА СИСТЕМЫ УПРАВЛЕНИЯ ПЕРСОНАЛОМ</h1>
					  <p class="lead">Что такое система управления персоналом?</p>
					  

					</div>
				</div>	  
			</div>    
		</div>
	 </header>


					

<div class="bg1">
<div class="row">

<div class="col-md-7"></div>
<div class="col-md-4 panel">
<!-- sign in form begins -->  
  <form class="form-horizontal" name="form" action="quest.php?page=1" onSubmit="return validateForm()" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Введите имя" class="form-control input-md" type="text" value = "Введите Имя">
    
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Введите Email" class="form-control input-md" type="email" value = "test@mail.ru">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Придумайте пароль" class="form-control input-md" type="password" value = "test@mail.ru">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Подтвердите пароль" class="form-control input-md" type="password" value = "test@mail.ru">
    
  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub" value="Пройти Тест!" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 end-->
</div></div>
</div><!--container end-->

<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="http://mycloud.kz" target="_blank">Разработчик</a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login">Администратор</a></div>
  <div class="col-md-3 box">
    <a href="feedback.php" target="_blank">Обратная связь</a></div>
  
  <div class="col-md-3 box">
    <a href="#" data-toggle="modal" data-target="#myModal">Вход</a></div>
  </div>
 


<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Вход</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Введите Email" class="form-control input-md" type="email">
    
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Вход</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
        </div>
        <div class="modal-body title1">
          <div class="row">
            <div class="col-md-3"></div>
              <div class="col-md-6">
                <form role="form" method="post" action="admin.php?q=index.php">
                  <div class="form-group">
                  <input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
                  </div>
                  <div class="form-group">
                  <input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
                  </div>
                  <div class="form-group" align="center">
                  <input type="submit" name="login" value="Login" class="btn btn-primary" />
                  </div>
                </form>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>

	 <!-- JAVASCRIPT
	     ================================================== -->

    <script src="js/animatescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/retina.min.js"></script>
		<script src="./js/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="./js/jquery/dist/jquery.min.js"></script>
		<script src="./js/jquery/jquery.js" type="text/javascript"></script>
</html>
