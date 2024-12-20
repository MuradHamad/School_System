<?php
header("Content-Type: text/css");  // Set the content type to CSS

include("../constants.php")
    ?>

body {
background-color: <?php echo BACKGROUND_COLOR; ?>;
color: <?php echo PRIMARY_COLOR; ?>;
}

h1 {
color: <?php echo SECONDARY_COLOR; ?>;
}

.button {
background-color: <?php echo PRIMARY_COLOR; ?>;
color: white;
padding: 10px 20px;
border: none;
border-radius: 5px;
cursor: pointer;
}