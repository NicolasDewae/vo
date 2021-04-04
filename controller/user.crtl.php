<?php
require_once "model/userManager.class.php";

class UserController {
    private $userManager;

    public function __construct(){
        $this->userManager = new userManager;
    }

    public function SignUp(){
        try {
            $validation = true;
            if (isset($_POST)) {
                if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
                    $firstname = htmlspecialchars($_POST['firstname']);
                    $lastname = htmlspecialchars($_POST['lastname']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = sha1($_POST['password']);
                    $passwordConfirm = sha1($_POST['password_confirm']);
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        var_dump($email);
                        $userEmail = $this->userManager->getEmailUser($email);
                        if ($userEmail == false ) {
                            if ($password == $passwordConfirm) {
                                if ($validation == true) {
                                    $this->userManager->addUserDB($firstname, $lastname, $email, $password);
                                    // Redirection
                                    header('Location: '. URL . "accueil");
                                }
                                $success = "Votre compte à bien été créé.";
                                echo "$success";
                            }else {
                                $validation = false;
                                $error = 'Les mots de passe ne sont pas identiques.';
                                echo "$error";
                            }
                        }else {
                            $validation = false;
                            $error = 'Cet adresse email est déjà utilisé.';
                            echo "$error";
                        }
                    }else {
                        $validation = false;
                        $error = "Veuillez entrer une adresse email valide.";
                        echo "$error";
                    }
                }else {
                    $validation = false;
                    $error = "Tous les champs doivent êtres remplis";
                    echo "$error";
                    var_dump($_POST);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
