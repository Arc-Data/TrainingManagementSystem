<link href='https://css.gg/check-o.css' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<?php
    if(isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="col">
            <strong>&#10003;</strong> <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    </div>

<?php 
    unset($_SESSION['message']);
    endif;
?>

<style>
.alert-dismissible {
    position:fixed;
	text-align:center;
	left: 90%;
	margin-top: 100px;
}

.alert-warning {
    color: white;
    background-color: #00c04b;
	border-color: #00c04b;
	border-radius: 5px;
	width: 10%;
    height: 7%;
	padding-right: 3.5%;
	padding-top: auto;
	font-size: 15px;
	text-align: center;
	box-sizing: border-box;
	border-left: 3px solid wheat;
}

.alert-dismissible .btn-close {
    position: absolute;
    top: 14%;
    right: 3.5%;
    z-index: 2;
    padding: 1.25rem 1rem;
    float: left;
}



</style>