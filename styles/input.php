<?php
header("Content-Type: text/css");
include("../constants.php")
    ?>
a {
text-decoration: none;
margin: 2px
}

input[type="text"] {
padding: 10px 15px;
font-size: 1em;
border: 2px solid #ddd;
border-radius: 5px;
outline: none;
}

input[type="text"]:focus {
border-color: #007BFF;
box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Force buttons to display side by side */
.button-container {
display: flex;
justify-content: flex-start;
/* Align buttons to the left */
gap: 10px;
/* Space between buttons */
}

.action-btn {
display: inline-block;
/* Ensure buttons don’t expand */
padding: 10px 20px;
font-size: 1em;
color: white;
border: none;
border-radius: 5px;
cursor: pointer;
text-transform: capitalize;
transition: background-color 0.3s, transform 0.2s;
text-align: center;
width: auto;
/* Remove any inherited full-width styling */
}

.insert,
.log-in {
background-color:
<?php echo INSERT_LOGIN_COLOR ?>
;
/* Blue */
}

.update {
background-color:
<?php echo UPDATE_COLOR ?>
;
/* Green */
}

.delete,
.sign-up {
background-color:
<?php echo DELETE_SIGNUP_COLOR ?>
;
/* Red */
}

.action-btn:hover {
opacity: 0.9;
transform: translateY(-2px);
}

.action-btn:active {
transform: translateY(0);
}