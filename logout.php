<?php 
session_start();

function __autoload($class_name) {
    require_once('classes/class.' . $class_name . '.php');
  }

Logout::destroySession();