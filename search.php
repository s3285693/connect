<html>
<head>
<title>Search Wines</title>
</head>
<body>
<?php
	require_once('dbScripts/db.php');

	$connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
	mysql_select_db("winestore", $connection);
	
	//region
	$regionQuery = "select * from region";
	$regionResult = mysql_query($regionQuery , $connection);
	//grape variety
	$varietyQuery = "select * from grape_variety";
	$varietyResult = mysql_query($varietyQuery, $connection);
	//year
	$yearQuery = "select year from wine";
	$yearResult = mysql_query($yearQuery, $connection);
?>	

<form action="search_results.php" method="GET">

Wine Name: <input type="text" name="wineName" /><br />
Winery Name: <input type="text" name="winery" /><br />

Region: 
<select name="region">
	<?php 
		while ($row = mysql_fetch_row($regionResult)) 
		{
			for ($i = 0; $i < mysql_num_fields($regionResult ); $i++) 
			{
				$regionName= $row[++$i];
				echo '<option name="$regionName">' . $regionName. '</option>'; 
			}
		}	
	?>
</select><br />

Grape Variety: 
<select name="variety">
   <?php 
		while ($row = mysql_fetch_row($varietyResult )) 
		{
			for ($i = 0; $i < mysql_num_fields($varietyResult ); $i++) 
			{
				$varietyName= $row[++$i];
				echo '<option name="$regionName">' . $varietyName. '</option>'; 
			}
		}	
	?>
</select><br />

Year:
<select name="year">
   <?php 
		while ($row = mysql_fetch_row($varietyResult )) 
		{
			for ($i = 0; $i < mysql_num_fields($varietyResult ); $i++) 
			{
				$varietyName= $row[++$i];
				echo '<option name="$regionName">' . $varietyName. '</option>'; 
			}
		}	
	?>
</select><br />



</form>
</body>
</html>
