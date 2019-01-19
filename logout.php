<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 06.01.19
 * Time: 14:30
 */
    session_start();

    session_unset();

    header("Location: index.php");