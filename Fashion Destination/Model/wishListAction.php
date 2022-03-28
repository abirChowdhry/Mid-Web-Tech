<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>wishlist List Action</title>
</head>
<body>
	
    <?php
    
    session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") 
		{

			function test($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$type = test($_POST['type']);
			$color = test($_POST['color']);
			$size = test($_POST['size']);
			$price = test($_POST['price']);


		$typeerr = $colorerr = $sizeerr = $priceerr = "";


        if (empty($_POST["type"])) {
        $typeerr = "Product Type Required!";
        echo $typeerr;
        }

		else if (empty($_POST["color"])) {
		$colorerr = "Product Color Required!";
		echo $colorerr;
		}

	    else if(empty($_POST["size"])){
	    $sizeerr = "Product Size Required!";
	    echo $sizeerr;
		}

	    else if(empty($_POST["price"])){
	    $priceerr = "Product Price Required!";
	    echo $priceerr;
		}

			else {
				$handle = fopen("wishList.json", "r");
				$fr = fread($handle, filesize("wishList.json"));
				$arr1 = json_decode($fr);
				$lastIndex = count($arr1);
				$fc = fclose($handle);
				$data = array('id' => $lastIndex + 1, 'type' => $type, 'color' => $color, 'size' => $size, 'price' => $price);

				$handle = fopen("wishList.json", "w");

				if ($arr1 === NULL) {
					$data = array($data);
					$data = json_encode($data);
				}
				else {
					$arr1[] = $data;
					$data = json_encode($arr1);
				}

				$fw = fwrite($handle, $data);
				$fc = fclose($handle);

				if ($fw) {
					echo "Successfully Listed";
				}
			}

		}
		
	    else 
	    {
		echo "No valid request";
	    }
    ?>

    <br><br>
	<a href="../Views/wishlist.html">Go Back</a>
	<br><br>

</body>
</html>