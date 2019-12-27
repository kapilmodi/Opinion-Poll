<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Favourite author - Results</title>
    </head>
    
<body style="font-family: Arial;border: 0 none;">
    <div id="visualization" style="width: 600px; height: 400px;"></div>
 
    <?php

    include 'db_connect.php';
if (count($_POST) == 1) {
    echo "<script>alert('You did not vote!');</script>";
}

if (count($_POST) > 1) {
	$option = $_POST['vote']; 
	$sql = "UPDATE poll SET $option=$option + 1";

	if ($conn->query($sql) === TRUE) {
	    echo "You Voted for $option";
		}
	}
$sql = "SELECT * FROM poll";
$result = $conn->query($sql);
if ($result->num_rows == 0){
$sql = "INSERT INTO poll VALUES (0,0,0,0)";

if ($conn->query($sql) === TRUE) {
}
}
if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    ?>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php	
			$a=$row["Miquel"];
                        echo "['Miquel de Cervantes', {$a}],";
			$b=$row["Charles"];
                        echo "['Charles Dickens', {$b}],";
			$c=$row["Tolkien"];
                        echo "['J.R.R. Tolkien', {$c}],";
			$d=$row["Antoine"];
                        echo "['Antoine de Saint-Exuper', {$d}],";
                    
                    ?>
                ]);
 
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Stats of polling"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }
echo "<br>";
echo "The maximum vote count is: " .(max($a,$b,$c,$d));
    ?>
    
</body>
</html>
