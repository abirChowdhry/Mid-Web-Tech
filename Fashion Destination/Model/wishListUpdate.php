<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>wishlist Update</title>
</head>
<body>

	<?php 
		
		$id = "";
		$type = "";
		$color = "";
		$price = "";
		$size = "";
		
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$handle = fopen("wishlist.json", "r");
			$fr = fread($handle, filesize("wishlist.json"));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			for ($i = 0; $i < count($arr1); $i++) {
				if ($id == $arr1[$i]->id) {
					$type = $arr1[$i]->type;
					$color = $arr1[$i]->color;
					$size = $arr1[$i]->size;
					$price = $arr1[$i]->price;
				}
			}
		}
		else {
			die("Invalid Request");
		}
	?>

    <div style="text-align:center">  
	<h2>wishlist Update</h2>
    </div>

	<form action="WishlistUpdateAction.php" method="post">

		<label>Id*:</label>
		<input type="text" name="id" value="<?php echo $id; ?>" readonly>
		<br><br>

		<label>Type*:</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
		<br><br>

		<label>Color*:</label>
		<input type="text" name="color" value="<?php echo $color; ?>">
		<br><br>

		<label>Size*:</label>
		<input type="text" name="size" value="<?php echo $size; ?>">
		<br><br>

		<label>Price*:</label>
		<input type="text" name="price" value="<?php echo $price; ?>">
		<br><br>

		<input type="submit" value="Update">
		
	</form>

	<br><br>

</body>
</html>