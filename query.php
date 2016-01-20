<?php
	require_once "conn.php";
	require_once "func.php";
	$match_way = $_POST['match_way'];
	$query_way = $_POST['query_way'];  
	$search_text = $_POST['search_text'];
	$Fields = getFields($query_way);
	//CheckStringType($Fields,$search_text);
	if($search_text == ''){
		echo "请输入字符";
	}else{
		$sql = QuerySql($match_way,$query_way,$search_text,$Fields);
		//echo $sql."<br/>";
		$res = mysql_unbuffered_query($sql);

		echo "<table border='1'><tr>";
		foreach($Fields as $value){ 
			echo "<th>".$value."</th>";
		} 
		echo "</tr>";
		while($row = mysql_fetch_array($res)){
			echo "<tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
			for($m = 0;$m < count($Fields);$m++){
				echo "<td>".$row[$m]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		mysql_close($conn);
	}
	
?>