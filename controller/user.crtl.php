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
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $passwordConfirm = password_hash($_POST['password_confirm'], PASSWORD_BCRYPT);
                    $Role = "User";
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $userEmail = $this->userManager->getEmailUser($email);
                        if ($userEmail == false ) {
                            if ($password == $passwordConfirm) {
                                if ($validation == true) {
                                    $this->userManager->addUserDB($firstname, $lastname, $email, $password, $Role);
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
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function SignIn(){
        try {
            if (isset($_POST)) {
                $emailConnect = htmlspecialchars($_POST['emailConnect']);
                $passwordConnect = sha1($_POST['passwordConnect']);
                if (!empty($emailConnect) && !empty($passwordConnect)) {
                    $login = $this->userManager->getLogin($emailConnect,$passwordConnect);
                    if ($login == true) {
                        // get user info with email
                        $userinfo = $this->userManager->getUserByEmail($emailConnect);
                        // put info in session
                        session_start();
                        $_SESSION['id'] = $userinfo['id'];
                        $_SESSION['firstname'] = $userinfo['firstname'];
                        $_SESSION['lastname'] = $userinfo['lastname'];
                        $_SESSION['email'] = $userinfo['email'];
                        $_SESSION['role'] = $userinfo['role'];
                        // Redirection
                        header('Location: '. URL . "accueil");
                    } else {
                        $error = "Mauvais identifiant ou mot de passe.";
                        echo "$error";
                    }
                } else {
                    $error = "Veuillez remplir tous les champs.";
                    echo "$error";
                }
            }   
        } catch (Exception $e) {
            echo $e->getMessage();
        }
             
    }
    
}
