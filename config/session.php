<?php
session_start(); 
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] != true) {

	header('location: http://localhost/t1k3t/');
}