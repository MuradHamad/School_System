<?php
header("Content-Type: text/css");
include("../constants.php")
    ?>
/* Basic Reset */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

/* Body Styling */
body {
font-family: 'Arial', sans-serif;
background-color: #f4f4f4;
}

/* Navbar Styling */
.navbar {
display: flex;
justify-content: center; /* Centers the navbar content horizontally */
align-items: center; /* Centers the navbar content vertically */
background-color: <?php echo PRIMARY_COLOR ?>;
padding: 15px 30px;
position: sticky;
top: 0;
z-index: 1000;
}

.navbar a {
color: #fff;
font-size: 24px;
text-decoration: none;
font-weight: bold;
}

.nav-links {
list-style-type: none;
display: flex;
gap: 20px;
justify-content: center; /* Centers the list items horizontally */
align-items: center; /* Centers the list items vertically */
}
.nav-links li {
display: inline-block;
}

.nav-links a {
color: #fff;
text-decoration: none;
font-size: 18px;
transition: color 0.3s;
}

.nav-links a:hover {
color: <?php echo SECONDARY_COLOR ?>; /* Green color on hover */
}

/* Hamburger Icon (for mobile) */
.hamburger {
display: none;
flex-direction: column;
gap: 5px;
cursor: pointer;
}

.hamburger .bar {
width: 25px;
height: 3px;
background-color: #fff;
}