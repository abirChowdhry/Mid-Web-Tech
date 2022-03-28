<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>wishlist Update Action</title>
</head>
<body>

	<h1>Product Update</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$id = test($_POST['id']);
			$type = test($_POST['type']);
			$color = test($_POST['color']);
			$size = test($_POST['size']);
			$price = test($_POST['price']);

			if (empty($id) or empty($type) or empty($color) or empty($size) or empty($price)) {
				echo "Please fill up the form properly";
			}
			else {
				$handle = fopen("wishlist.json", "r");
				$fr = fread($handle, filesize("wishlist.json"));
				$arr1 = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen("wishlist.json", "w");

				for ($i = 0; $i < count($arr1); $i++) {
					if ($id == $arr1[$i]->id) {
						$arr1[$i]->type = $type;
						$arr1[$i]->color = $color;
						$arr1[$i]->size = $size;
						$arr1[$i]->price = $price;
					}
				}

				$data = json_encode($arr1);
				$fw = fwrite($handle, $data);
				$fc = fclose($handle);

				if ($fw) {
					echo "Product Updated Successfully";
				}
			}
		}
	?>

	<hr><hr>

	<a href="wishlist.php">Product List</a>

</body>
</html>