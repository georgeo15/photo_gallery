<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAMPLE ART GALLERY WITH JQEURY, JS, PHP</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div id="wrapper">

<header> <h1>SAMPLE ART GALLERY WITH JQEURY JS PHP</h1> </header><br/>
<div id="search-form">

<form>
  
  <select id ="select" >
  <option value="selected" selected disabled>SELECT BY TYPE</option>
  <option value="disbaled" disabled></option>
  <option value="http://users.metropolia.fi/~georgeo/gallery">Classic Art</option>
  <option value="http://users.metropolia.fi/~georgeo/gallery/abstract.php">Abstract Art</option>
  <option value="http://users.metropolia.fi/~georgeo/gallery/surreal">Surrealism</option>
  <option value="http://users.metropolia.fi/~georgeo/gallery/conceptual">Conceptual Art</option>
  <option value="http://users.metropolia.fi/~georgeo/gallery/pop">Pop Art</option>
  <option value="http://users.metropolia.fi/~georgeo/gallery/minimal">Minimalism</option>
  <option value="http://users.metropolia.fi/~georgeo/gallery/futuris">Futurism</option>
  <input type="text" id="search" name="search" placeholder="Search..">
</select>
</form>

<script type="text/javascript">
 var selected_url = document.getElementById( 'select' );
 selected_url.onchange = function() {
  window.open( this.options[ this.selectedIndex ].value, '_self');
};
</script>
</div>
<div style="color:black;font-size:5em">
TYPE/ABSTRACT ART 
</div>
<br><br><br>
<div id="tiles_canvas">
<?php require_once('../config/cons.php.inc');?>
<?php include('get_data.php')?>

</div><br>

<div id="footer">
	<div class="pagination">
	  <a href="#">&laquo;</a>
	  <a href="#">1</a>
	  <a href="#" >2</a>
	  <a href="#">3</a>
	  <a href="#">4</a>
	  <a href="#" class="active">5</a>
	  <a href="#">6</a>
	  <a href="#">7</a>
	  <a href="#">8</a>
	  <a href="#">9</a>
	  <a href="#">10</a>
	  <a href="#">11</a>
	  <a href="#">12</a>
	  <a href="#">&raquo;</a>
	</div>
</div>

</div>

<script>
$(document).ready(function(){
   function fadeIt(){
        $(".overlay").fadeOut(1000);
    }
	//setInterval(fadeIt, 2000);
});
</script>
</body>
</html>
