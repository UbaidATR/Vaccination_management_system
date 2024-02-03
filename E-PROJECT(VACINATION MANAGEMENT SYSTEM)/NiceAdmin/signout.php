<?php
session_start();
session_destroy();
session_abort();
header('location:/E-PROJECT(VACINATION%20MANAGEMENT%20SYSTEM)/theme/index.html');
?>