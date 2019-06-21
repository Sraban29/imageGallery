<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}




/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}

 
  }
   .mySlides{
  position: relative; 
  max-width: 800px; /* Maximum width */
  margin: 0 auto; /* Center it */
}

.mySlides img {vertical-align: middle;}

.mySlides .extern {
  position: absolute; /* Position the background text */
  bottom: 0; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1; /* Grey text */
  width: 100%; /* Full width */
  padding: 20px; /* Some padding */
}

.mySlides .btn {
  position: absolute;
  top: 50%;
  left: 20%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.mySlides .btn:hover {
  background-color: black;
}

.mySlides .btn {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.mySlides .btn span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.mySlides .btn span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.mySlides .btn:hover span {
  padding-right: 25px;
}

.mySlides .btn:hover span:after {
  opacity: 1;
  right: 0;}
  
  
  .btn:after {
  content: "";
  background: #90EE90;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px!important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.btn:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
   
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>


<div class="dropdown">
  <button class="dropbtn">TITLES</button>
  <div class="dropdown-content">
    <a href="#">TITLE 1</a>
    <a href="#">TITLE 2</a>
    <a href="#">TITLE 3</a>
  </div>
</div>

<div class="slideshow-container">

<div class="mySlides">
  <div class="numbertext">1 / 3</div>
  <img  src="img1.jpg" style=" height:100% ;width:100%">
  <button class="btn" onclick="alert('Hello World!')"><span>Veiw Gallery</span></button>
  <div class="extern">
  <h1>TITLE OF THE ALBUM</h1>
  <p>The Description is here</p>
  
  </div>
</div>

<div class="mySlides">
  <div class="numbertext">2 / 3</div>
  <img  src="img2.jpg" style="height:100% ;width:100%">
  <button class="btn" onclick="alert('Hello World!')"><span>Veiw Gallery</span></button>
  <div class="extern">
  <h1>TITLE OF THE ALBUM</h1>
  <p>The Description is here</p>
  
  </div>
</div>

<div class="mySlides">
  <div class="numbertext">3 / 3</div>
  <button class="btn" onclick="alert('Hello World!')"><span>Veiw Gallery</span></button>
  <img  src="img3.jpg"  style="height:100% ;width:100%">
  <div class="extern">
  <h1>TITLE OF THE ALBUM</h1>
  <p>The Description is here</p>
  
  </div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>



<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html> 
