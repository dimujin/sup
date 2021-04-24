<?php
//include_once '../tmpl/safemysql01.class.php';
//include_once '../tmpl/data_result.php';
	
//	if ($userid)
//    {
//        $LIST1 = $db->getAll("SELECT * FROM history WHERE userid=?s", $userid);
//    } else { 
//        header("location:../tmpl/quest.php?page=1")or die('Error10');
//    } 

//генерим цвета	
		function random_html_color()
	{
		return sprintf( '#%02X%02X%02X', rand(0, 150), rand(0, 150), rand(0, 150) );
	}
	$i=0;	
		
?>


<script>
    anychart.data.loadJsonFile("../tmpl/data_result.php", function (data) {  
		
		var infoHTML='<table class="table table-striped title1" ><tr style="color:red"><td><b>Сфера управления персоналом</b></td><td><b>Баллов</b></td><td><b>&nbsp;Из&nbsp;</b></td><td><b>&nbsp;%&nbsp;</b></td></tr>';
		$.each(data, function(quest, questInfo){
		var procent = questInfo.value / questInfo.sahi * 100;
		
		infoHTML+='<tr><td><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;' + questInfo.tag + '&nbsp;</td>';
		infoHTML+='<td>' + questInfo.value + '</td>';
		infoHTML+='<td>'+ questInfo.sahi + '</td>';
		infoHTML+='<td>'+ procent.toFixed() +'%</td></tr>';
			
		});
		
		$('#questinfo').html(infoHTML);
		
		   
	// create column chart
    var chart = anychart.column(data);

    // turn on chart animation
    chart.animation(true);
	// set the padding between columns
	chart.barsPadding(-0.5);	

        chart.title("Диагностика Системы Управления Персоналом");
        chart.container("container_diagram");
        chart.draw();

        // update chart from server every 5 seconds
        setInterval(function(){
            // make request to server
            // to use loadJsonFile function you must include data-adapter.min.js to your page
            anychart.data.loadJsonFile("../tmpl/data_result.php", function (data) {
                chart.data(data);
            })
        }, 5000);
    });
</script>

<?php
//	foreach ($LIST as $row): 
// 	$color=random_html_color();
//	$procent=$row['value']/$row['sahi']*100;
//	Выводим результат на php
//	echo '<tr style="color:'.$color.'"><td>'.$row['title'].'<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$row['value'].'</td><td>'.$row['sahi'].'</td><td>'.$procent.'%</td></tr> ';
 
//	$arr_intro[$i] = array ('into'=>$row['intro']);
//	$arr_sum[$i]   = array ($row['sum']);
//	$arr_sahi[$i]  = array ($row['sahi']);
//	$arr_color[$i] = array ($color);
//	$i++;
//	endforeach

	
