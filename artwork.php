<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Art Gallery</title>
	
		
		
			
			
</head>
<body>
	
<!-- Heading Name -->
<div class="heading">
	<h1>Art Gallery</h1>
	
	<header>
		
		<nav>

		 <button> <a href="index.html">Home</a></button>
		 
		 <button> <a href="login.html">upload</a></button>
			<button> <a href="contact.html">Contact</a></button>
		</nav>
	  </header>
</div>
	<!-- Image Gallery section all image in one div -->
	
		<div id="image-gallery">
			
		
<img src="images\images (2).jpg"alt="Image 2" class="gallery-img" onclick="showImage(src)">
<br>
<p class="disc" >Portrait of a lonely girl. Mixed media painting with coarse brushstrokes and broken chipped paint layers on a fine canvas texture in white,brown,beige and yellow tones</p>
<!-- <img src="images\images (1).jpg"alt="Image 3" class="gallery-img" onclick="showImage(src)">
<br>
<p class="disc" >“Fluorite” - oil painting. Conceptual abstract picture of the eye. Oil painting in colorful colors. Conceptual abstract closeup of an oil painting and palette knife on canvas</p> -->
<img src="images\guitar-1800250126.jpg" alt="Image 4" class="gallery-img" onclick="showImage(src)">
<br>
<p class="disc" >It is a Paintings artwork. The style of this artwork is best described as Fine Art, Impressionism. The genre portrayed in this piece of art is Inspirational, Music, Spiritual. </p>
<img src="images\360_F_273227473_N0WRQuX3uZCJJxlHKYZF44uaJAkh2xLG.jpg"alt="Image 5" class="gallery-img" onclick="showImage(src)">
<br>
<p class="disc" > Oil painting has the outstanding facility with which fusion of tones or colour is achieved makes it unique among fluid painting mediums</p>
<img src="images\1200x620_innerpage_banners_13.jpg"
alt="Image 6" class="gallery-img" onclick="showImage(src)">
<br>
<p class="disc" >Impressionist arts include small, visible brushstrokes that offer the bare impression of form, unblended color and an emphasis on the accurate depiction of natural light.</p>
<img src="images\71M2C6c4acL._AC_UF1000,1000_QL80_.jpg"
alt="Image 7" class="gallery-img" onclick="showImage(src)">
<br>
<p class="disc" >  Rangoli New Modern Art Beautiful Krishna ji & Radha ji Painting Set of 5 to Décor your Living Spaces/Home Decoration Size 155cm*92cm</p>
<?php
			$host = "localhost";
			$username = "root";
			$db_password = "";
			$database = "gallery";
			$conn = new mysqli($host, $username, $db_password, $database);
		
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT id, title, filename FROM images";
			$result = $conn->query($sql);
		
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<div class='image'>";
					echo "<img src='uploads/" . $row['filename'] . "' alt='" . $row['title'] . "' width='350' height='270'class='gallery-img' onclick='showImage(src)'>";
					echo "<br>";
					echo "<p class='disc'>" . $row['title'] . "</p>";
					echo "</div>";
				}
			} else {
				echo "No images found.";
			}
		
			$conn->close();
			?>
		</div>
</div>

<!-- Image containter where image will show in big size -->
	<div class="image-popup-container" id="imagePopup">
		<span class="close-button" onclick="closeImage()">×</span>
		<img src="" alt="Popup Image" id="popupImage">
	</div>
	<script src="script.js"></script>
	<div id="page-container">
		<div  id="content-wrap">

		</div>
	<footer>
		<p>&copy; 2023 Virtual Art Gallery. All rights reserved.</p>
	</footer>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
		<script>
			var a2a_config = a2a_config || {};
			a2a_config.overlays = a2a_config.overlays || [];
			a2a_config.overlays.push({
				services: ['pinterest', 'facebook', 'houzz', 'tumblr'],
				size: '50',
				style: 'horizontal',
				position: 'top center',
			});
			</script>
			
			<script async src="https://static.addtoany.com/menu/page.js"></script>
</body>
</html>
