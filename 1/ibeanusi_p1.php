<table>
<?php
	date_default_timezone_set('UTC');
	//trying to see how this function works
	//$startdate= '12-Jun-04';
	//echo strtotime ($startdate), "\n";
	
	$lines=file("data.txt");
	//make an associative array
	$associative_array=array();
	$evaluation_array=array();
	$salary_array=array();
	
	foreach ($lines as $line)
	{	
		$line=trim($line);	
		$fields=explode(",", $line);
		$employee_id=$fields[0];
		$name=$fields[1];
		$date=strtotime($fields[2]);
		$the_date=strtotime('21-Jan-98');
		//echo $the_date;
		$level=$fields[3];
		$base_pay=$fields[4];
		$evaluation_rating=$fields[5];
		$associative_array[$name]=$date;
		$evaluation_array[$name]=$evaluation_rating;
		$salary_array[$name]=$base_pay;
		//if ($associative_array[$name]>='21-Jan-98');
			
	}		
		//there are 6 fields in the input
		//for ($i=0; $i<count($fields); $i++)
	ksort($associative_array);
		foreach ($associative_array as $name=>$date)
		//foreach ($fields as $field)
			if ($associative_array[$name]>=$the_date && ($evaluation_array[$name]=='excellent'||$evaluation_array[$name]=='good') && $salary_array[$name]>60000)
			{
				echo "<tr>";
				
				echo "<td>";
				echo $name;
				echo"<td>";
				
				echo "<td>";
				//echo date("F d Y",$associative_array[$name])
				echo date("F d",$associative_array[$name]). (", "). date ("Y", $associative_array[$name]);
				echo"</td>";
				
				/*if ($i==1)
				{
					echo "<td>";
					echo $fields[1];
					echo "</td>";
								
				}
					
				else if ($i==2)
				{
					echo "<td>";
					echo $fields[2];
					echo "</td>";
				}*/
				echo "</tr>";
			}	
		
	
?>
</table>

