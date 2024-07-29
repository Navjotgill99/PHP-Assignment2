<?php

include '../reusable/config.php';

session_destroy();

header('Location: ../index.php');