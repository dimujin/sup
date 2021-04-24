<?php
include_once './tmpl/safemysql01.class.php';
if(isset($_POST['action'])){
    $prods = count($_POST['prod']);

    for($i=0; $i < $prods; $i++){
        $prod = $_POST['prod'][$i];
        $default = (isset($_POST['is'][0]) && $_POST['is'][0] == $i) ? 1 : 0;
        $query = "INSERT INTO `items` (`prod`, `is_default`)VALUES('{$prod}', '{$default}')";
        if(mysqli_query($query)){
            echo' success';
        }else{
            echo' error';
        }
    }

}
?>
