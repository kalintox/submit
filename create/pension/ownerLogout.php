<?php
session_start();
unset($_SESSION["loginstatus"]);
unset($_SESSION["loginerr"]);
header("location: ./ownerIndex.php");
