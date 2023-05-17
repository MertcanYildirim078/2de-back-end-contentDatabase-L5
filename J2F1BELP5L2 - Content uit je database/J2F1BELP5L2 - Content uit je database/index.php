<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>J2F1BELP5L2 - Content uit je database</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<main id="mainContainer">
	<!-- laad hier via php je header in (vanuit je includes map) -->
	
		<?php include('./includes/header.php');?>

	<!-- Haal hier uit de URL welke pagina uit het menu is opgevraagd. Gebruik deze om de content uit de database te halen. -->
	<?php
	function connect() {
		$servername = "localhost";
		$dbname = "databank_php";
		$username = "root";
		$password = "";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}

		return $conn;
	}
		
		function getStuff() {
			$connection = connect();
			$query = "SELECT * FROM onderwerpen";

			$statement = $connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();

			return $result;
			
		}
		
		// <!-- Laat hier de content die je op hebt gehaald uit de database zien op de pagina. -->

		$content = getStuff();
		Foreach($content as $onderwerpen) {
			echo $onderwerpen["name"];
		}
	?>
	


	<!-- laad hier via php je footer in (vanuit je includes map)-->
		<?php include('./includes/footer.php');?>

	
	</main>

		



	
</body>
</html>