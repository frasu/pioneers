<?php
    session_start();

    if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
        header("Location: index.php");
        exit();
    }

    $_SESSION['login'] = $_POST['login'];

    require_once "connect.php";

    $login['login'] = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");

    try {
        $dbh = new PDO($dsn, $username, $passwd);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE users = :login";
        $stmt = $dbh->prepare($sql);

    } catch (PDOException $e) {
        $_SESSION['error'] = "Connection failed:" . $e->getMessage();
        header("Location: index.php");
        exit();
    }

    function error($error) {
        $_SESSION['error'] = '<span style="color:red"> ' . $error . '</span>';
        header("Location: index.php");
    }

    if ($stmt->execute($login)) {

        $userCount = $stmt->rowCount();

        if ($userCount>0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($_POST['password'], $result['pass'])) {
                $_SESSION['logged'] = true;

                $_SESSION += $result;

                unset($_SESSION['error']);

                $stmt->closeCursor();

                $dbh = null;

                header("Location: game.php");
            } else {
                error("Nieprawidłowe hasło");
            }


        } else {
            error("Nieprawidłowy login");
        }


    } else {
        error("Niepoprawne zapytanie bazodanowe");
    }

