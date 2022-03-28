<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wish List</title>
</head>
<body>

    <div style="text-align:center">  
    <h2>Wish list</h2>
    </div>

	<?php 
		$handle = fopen("wishlist.json", "r");
		$fr = fread($handle, filesize("wishlist.json"));
		$arr1 = json_decode($fr);
		$fc = fclose($handle);
	?>

	<?php 
		if ($arr1 === NULL) {
			echo "<p>No records found.</p>";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>Type</th>";
			echo "<th>Color</th>";
			echo "<th>Size</th>";
			echo "<th>Price</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			for ($i = 0; $i < count($arr1); $i++) {
				echo "<tr>";
				echo "<td>" . $arr1[$i]->id . "</td>";
				echo "<td>" . $arr1[$i]->type . "</td>";
				echo "<td>" . $arr1[$i]->color . "</td>";
				echo "<td>" . $arr1[$i]->size . "</td>";
				echo "<td>" . $arr1[$i]->price . "</td>";
				echo "<td>" . "<a href='WishlistUpdate.php?id=" . $arr1[$i]->id . "'>Update</a>"  . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	?>

	<br><br>

</body>
</html>