<?php

require 'lib/session.php';

//on arrete la session
session_destroy();
// on fait un reset
unset($_SESSION);

header('location: login.php');