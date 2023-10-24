
<style>
* {box-sizing: border-box;}

/* Style the header with a grey background and some padding */

header {
  overflow: hidden;
  background-color: #1a1a1a;
  width: 100%;
  padding: 20px;
}

/* Style the header links */
header a {
  color: #ffffff;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
  margin: auto;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
header a:hover {
  color: #d9d9d9;
  background-color: orange;
}

body {
	background-image: url('wallpaper.jpg');
	background-size: cover;
}
  

  
</style>

<?php
echo '<header>
  <a href="Homepage4.php" target="_blank" class="logo" title="Mei Yu Chan">CMY</a>
</header>';
?>



