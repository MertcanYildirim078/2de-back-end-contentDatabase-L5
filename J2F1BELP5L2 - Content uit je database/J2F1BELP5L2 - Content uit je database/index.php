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
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}

		return $conn;
	}
		
		function getStuffAndConnect($id) {
			$connection = connect();
			$query = "SELECT * FROM onderwerpen where id = $id";

			$statement = $connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();

			return $result;
			
		}
		
		// <!-- Laat hier de content die je op hebt gehaald uit de database zien op de pagina. -->
		if (array_key_exists('name', $_GET) && $_GET['name'] == 're4') {
			$contentConnect = getStuffAndConnect(1);
			Foreach($contentConnect as $onderwerpen) {
				echo "<h1>";
				echo $onderwerpen["name"];
				echo "</h1>";
				echo "<div class = 'contentContainerDatabase'>";
				echo "<img src= ./images/re4.jpeg>";
				echo $onderwerpen["description"];
				echo "</div>";
				}
	}	
			else if (array_key_exists('name', $_GET) && $_GET['name'] == 'apex') {

				$contentConnect = getStuffAndConnect(2);
				Foreach($contentConnect as $onderwerpen) {
					echo "<h1>";
					echo $onderwerpen["name"];
					echo "</h1>";
					echo "<div class = 'contentContainerDatabase'>";
					echo "<img src= ./images/apex.jpeg>";
					echo $onderwerpen["description"];
					echo "</div>";
					}
		}

				else if (array_key_exists('name', $_GET) && $_GET['name'] == 'for-honor') {

				$contentConnect = getStuffAndConnect(3);
				Foreach($contentConnect as $onderwerpen) {
					echo "<h1>";
					echo $onderwerpen["name"];
					echo "</h1>";
					echo "<div class = 'contentContainerDatabase'>";
					echo "<img src= ./images/for-honor.jpeg>";
					echo $onderwerpen["description"];
					echo "</div>";
					}
			}

					else if (array_key_exists('name', $_GET) && $_GET['name'] == 'r6') {
						
						$contentConnect = getStuffAndConnect(4);
						Foreach($contentConnect as $onderwerpen) {
							echo "<h1>";
							echo $onderwerpen["name"];
							echo "</h1>";
							echo "<div class = 'contentContainerDatabase'>";
							echo "<img src= ./images/r6.jpeg>";
							echo $onderwerpen["description"];
							echo "</div>";
							}
				}

					else { ?>

						<h1>Welkom! kies één van de games hierboven.</h1>

					<?php } ?>

	<!-- laad hier via php je footer in (vanuit je includes map)-->
		<?php include('./includes/footer.php');?>

	
	</main>

		



	
</body>
</html>