<?php
	require_once "conn.php";
	function query_way_check($query_way){

	}

	function getFields($query_way){
		/*获取表字段名称*/
		$sql="select * from ".$query_way.";";
		$result = mysql_unbuffered_query($sql);
		$Fields = array();
		for ($i=0;$i<mysql_num_fields($result);$i++){
		    $Fields[$i] = mysql_field_name($result,$i);
		}
		return $Fields;
	}

/*	function CheckStringType($Fields,$search_text){
		预判断用户输入类型
		$type = '';
        if(preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i',$search_text)){
            $type = "email";//邮箱
            foreach($Fields as $value){ 
            	if($value == $type){
            		echo "ok!";
            	}
			}
        }else if(preg_match('/^\d*$/',$search_text)){
        	if(strlen($search_text) > )
        	$type_arr = ("phone","qq","idcard");//可能是QQ、电话、身份证
        	foreach($Fields as $value){ 
            	if($value == $type){
            		echo "ok!";
            	}
			}
        }else{
        	$type = "1";
        }
        return $type;
	}*/

	function QuerySql($match_way,$query_way,$search_text,$Fields){
		$result = NULL;
		$row = NULL;
		switch ($match_way){
			case '1':
				$match_way_sql = "= '".$search_text."';";
				break;
			case '2':
				$match_way_sql = " LIKE '%".$search_text."%';";
				break;
		}
		$getID = array();
		$flag = 0;
		foreach($Fields as $value){ 
			$q = "SELECT id FROM"." `".$query_way."` "."WHERE"." `".$Fields[$flag]."`".$match_way_sql;
			//echo $q."<br/>";
        	$result = mysql_unbuffered_query($q);
        	while($row = mysql_fetch_row($result)){
				$str .= $row[0].",";
			}
			//echo $str."<br/>";
			//echo "---".$flag."---";
			$flag++;
		}
		$str=substr($str,0,strlen($str)-1); 
		$sql = "SELECT * from ".$query_way." where id in (".($str).");";
		return $sql;
	}
?>