<?php
	require_once "conn.php";

?>
<html>
	<head>
		<title>ASWQL</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script language='javascript' src="js/jquery.min.js"></script>
		<script language='javascript' src="js/func.js"></script>
	</head>
	<body>
		<div id="main">
			<div id="logo">
				<span id="logo_cn">社工查询库</span>
				<span id="logo_en">A Social Worker Query Library</span>
			</div>
			<div id="search">
				<div> 
						<select class="btn-search" id="match_way" name="match_way">
					    	<option value="1" selected="selected">精确查询</option>
					    	<option value="2">模糊查询</option>
					  	</select>
					  	<select class="btn-dbname" id="query_way" name="query_way">				    	
					    	<?php
					    		$mun = 0;
								$result=mysql_unbuffered_query("show tables");
								while($row = mysql_fetch_array($result)) { 
									echo "<option value=".$row[0]." selected=''>".$row[0]."</option>";
								}
					    	?>
					    	<!-- <option value="999" selected = "selected">全表搜索</option> -->
					  	</select>
				  		<input id="search_text" name="search_text" type="text" placeholder="输入 邮箱地址 或者 用户名 或其他有用信息"></input>
					  	<button id="search_button">搜&nbsp;&nbsp;索</button>
					  	<script type="text/javascript">
					  		$('#search_button').click(
					  			function(){
					  				var match_way = $('#match_way').val();
					  				var query_way = $('#query_way').val();
					  				var search_text = $('#search_text').val();
									$.post("query.php", { match_way: match_way, query_way: query_way ,search_text: search_text},
									    function(data){
									    	document.getElementById("show").innerHTML = data;
										}
									);
					  				}
					  		);
					  	</script>
				</div>
			</div>
			<div id="show"></div>
		</div>
	</body>
</html>