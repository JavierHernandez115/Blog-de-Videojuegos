<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['Usuario'])){
    header('Location: index.php');
}
