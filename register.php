<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 06.01.19
 * Time: 14:14
 */

    session_start();

    function error($name) {
        if (isset($_SESSION[$name])) {
            echo '<div class="error">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            }
        }

    if (isset($_POST['email'])) {
        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        $pass = $_POST['pass'];
        $pass1 = $_POST['pass1'];

        $test = $email == $emailB;

        $verified = true;

        if (strlen($nick)<3 || strlen($nick)>20) {
            $verified = false;
            $_SESSION['e_nick'] = 'Masz za krótkiego albo za długiego!';
        }

        if (!filter_var($emailB, FILTER_VALIDATE_EMAIL) || !($email == $emailB)) {
            $verified = false;
            $_SESSION['e_email'] = 'Niepoprawny adres email!';
        }

        if (strlen($pass)<3) {
            $verified = false;
            $_SESSION['e_pass'] = 'Hasło za krótkie';
        }

        if (!$pass==$pass1) {
            $verified = false;
            $_SESSION['e_pass'] = 'Hasła nie są takie same';
        }

        if ($verified) {
            require_once "connect.php";

            try {

                $dbh = new PDO($dsn, $username, $passwd);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT id FROM users WHERE email = :email";

                $stmt = $dbh->prepare($sql);
                $stmt->execute($email);

                $emailCount = $stmt->rowCount();

                if ($emailCount>0) {
                    $verified = false;
                    $_SESSION['e_email'] = "Istnieje już konto z podanym adresem e-mail";
                }

                $sql = "SELECT id FROM users WHERE users.users = :nick";

                $stmt = $dbh->prepare($sql);
                $stmt->execute($nick);

                $loginCount = $stmt->rowCount();

                if ($loginCount>0) {
                    $verified = false;
                    $_SESSION['e_nick'] = "Podany nickname jest już zajęty";
                }

                if ($verified) {
                    $password = password_hash($pass, PASSWORD_DEFAULT);

                    $new_user = [
                        'users' => $nick,
                        'pass' => $password,
                        'email' => $email,
                        'wood' => 100,
                        'stone' => 100,
                        'food' => 100
                    ];
                    $sql = "INSERT INTO users (users, pass, email, wood, stone, food, premium) VALUES (:users, :pass, :email, :wood, :stone, :food, NOW() + INTERVAL '14 days');";

                    $stmt = $dbh->prepare($sql);

                    $value = $stmt->execute($new_user);

                    $_SESSION['registered'] = true;
                    header("Location: welcome.php");
                }



            } catch (PDOException $e) {
                $_SESSION['error'] = "Connection failed:" . $e->getMessage();
                header("Location: index.php");
                exit();
            }
        }
    }

    if (false) {






        //$sql = "INSERT INTO users (users, pass, email, wood, stone, food, premium) VALUES ('kamila', 'zxcvb', 'kamila@gmail.com', 100, 100, 100, 14);";

        $stmt = $dbh->prepare($sql);


        echo $value;







        $sql1 = "SELECT * FROM users";

        $stmt1 = $dbh->prepare($sql1);
        $value1 = $stmt1->execute();

        echo $value1;



        echo $ilu_userow."<br />";

        /*    $stmt->execute(array(':id' => NULL,
                ':users' => 'marek',
                ':pass' => 'asdfgh',
                ':email' => 'marek@gmail.com',
                ':wood' => 1200,
                ':stone' => 200,
                ':food' => 540,
                ':premiun' => 4));*/

        //$ilu_userow = $stmt1->rowCount();

        //echo $ilu_userow."<br />";

        //$row = $stmt->fetch();

        //print $row['users'] . "\t";
        //print $row['wood'] . "\t";
        //print $row['food'] . "\n";


        /*    foreach ($dbh->query($sql) as $row) {
                print $row['users'] . "\t";
                print $row['wood'] . "\t";
                print $row['food'] . "\n";
            }*/

    }


?>

<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Osadnicy - gra przeglądarkowa</title>
        <style>
            .error
            {
                color:red;
                margin-top: 10px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        Rejestracja nowego użytkownika<br /><br />

        <?php
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'] . "<br /><br />";
            unset($_SESSION['error']);
        }
        ?>

        <form method="post">

            Nickname: <br />
            <input type="text" name="nick" /> <br />

            <?php
            error("e_nick");
            ?>

            Adres e-mail: <br />
            <input type="text" name="email" /> <br />

            <?php
            error("e_email");
            ?>

            Hasło: <br />
            <input type="password" name="pass" /> <br />

            <?php
            error("e_pass");
            ?>

            Powtórz hasło: <br />
            <input type="password" name="pass1" /> <br /><br />

            <?php
            error("e_pass1");
            ?>

            <input type="submit" value="Rejestracja">

        </form>
    </body>
</html>
