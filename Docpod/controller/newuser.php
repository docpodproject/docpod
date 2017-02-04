<?php

require_once "model/class.php";
//include_once "../controller/login.php";
$message = "";
if (!empty($_POST)) {

    if (isset($_POST["username"]) && isset($_POST["password_first"]) && isset($_POST["password_second"])&& isset($_POST["email"])) {
        $checklogin = "SELECT Username_canonical FROM users";
        $pdo = connect_db::connexion();
        $stmt = $pdo->prepare($checklogin);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp ($row["Username_canonical"], strtolower($_POST["username"])) == 0) {
                $message= "Ce nom d'utilisateur est déjà utilisé";
                exit;
            }
        }

        if (strcmp($_POST["password_first"], $_POST["password_second"]) == 0) {

            $Username = htmlspecialchars($_POST["username"]);

            $Password = md5($_POST["password_first"]);

            $Email = htmlspecialchars($_POST["email"]);

            $user = new user("", $Username, "", $Password, $Email);

            unset($_POST["password_first"]);

            unset($_POST["password_second"]);

            unset($_POST["email"]);


            try {


                $user->insert_user();

            } catch (Exception $e) {

                var_dump($e);

                exit;

            }

            $message = $user->message_Succes_Insert();
            ;

        }
        
    }

}

?>