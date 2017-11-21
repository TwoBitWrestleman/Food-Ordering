 <?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'Online_Food_Ordering');
	
 	function insert_dessert($pname, $descrip, $price, $fpath, $stock, $cal, $fats){
		try{
			$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
		
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			print "Connected to database. <br><br>";
		
		} catch(PDOException $error){
			die("ERROR: Could not connect. " . $error->getMessage());
		}
		
		$pdo->beginTransaction();
		print "Transaction has begun.<br>";
		
		print "Locking.<br>";
		$pdo->exec('LOCK TABLES `Product` WRITE');
		print "Customer table is locked<br>";
		
		
		try{
			$stmt = $pdo->prepare("INSERT INTO `Product` (`Product_Name`, `Description`, `Price`, `Product_Image`, `Num_In_Stock`, `Calories`, `Fats`)  VALUES (:name, :desc, :price, :image, : stock, :calories, :fats);");
			
			$stmt->bindParam(':name', $name, PDO::PARAM_STR, 12);
			$stmt->bindParam(':desc', $descrip, PDO::PARAM_STR, 256);
			$stmt->bindParam(':price', $name);
			$stmt->bindParam(':image', $name, PDO::PARAM_STR, 12);
			$stmt->bindParam(':name', $name, PDO::PARAM_STR, 12);
			$stmt->bindParam(':name', $name, PDO::PARAM_STR, 12);
			$stmt->bindParam(':name', $name, PDO::PARAM_STR, 12);
			$stmt->bindParam(':name', $name, PDO::PARAM_STR, 12);
			$stmt->execute();
			$pdo->commit();
			
			$pdo->exec('UNLOCK TABLES');
			print "Customer entry has commited.<br>Unlock table. <br>";
			
			print "Successful transaction<br>";
			$pdo->close();
		}
		catch(PDOException $error) {
			$pdo->rollback();
			print("Rollingback <br>");
			die("ERROR: Could not complete. " . $error->getMessage());
		}
	}
	?> 