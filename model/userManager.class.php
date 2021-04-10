<?php
require_once "DbConnection.class.php";
require_once "user.class.php";

    class UserManager extends dbConnection {
        private $_users; // User tab

        /**
         * Get user info from email
         */
        public function getUserByEmail($email){
            try {
                $req = $this->getInstance()->prepare("SELECT * FROM user WHERE email = '$email'");
                $req->execute();
                $user = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                // if email exist, return user. 
                // user tab architecture -> array[ key 0 => value array[ userInfo ] ]
                return $user[0];
            } catch (\Exception $e) {
                echo 'Error : '.$e->getMessage();
            }
        }

        /**
         * Insert user in database 
         */
        public function addUserDB($firstname,$lastname,$email,$password,$role){
            try {
                $req = "INSERT INTO user (firstname, lastname, email, password, role, inscriptionDate)
                values (:firstname, :lastname, :email, :password, :role, NOW())";
                $stmt = $this->getInstance()->prepare($req);
                $stmt->bindValue(":firstname",$firstname,PDO::PARAM_STR);
                $stmt->bindValue(":lastname",$lastname,PDO::PARAM_STR);
                $stmt->bindValue(":email",$email,PDO::PARAM_STR);
                $stmt->bindValue(":password",$password,PDO::PARAM_STR);
                $stmt->bindValue(":role",$role,PDO::PARAM_STR);
                $resultat = $stmt->execute();
                $stmt->closeCursor(); 
            } catch (\Exception $e) {
                echo 'Error : '.$e->getMessage();
            }                  
        }

        /**
         * Verify if email exist in database
         */
        public function getEmailUser($email){
            try {
                $req = $this->getInstance()->prepare("SELECT email FROM user WHERE email = '$email'");
                $req->execute();
                $userEmail = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                // if email exist, return true
                if ($userEmail == true) {
                    return true;
                }else {
                    return false;
                }
            } catch (\Exception $e) {
                echo 'Error : '.$e->getMessage();
            }
        }

        /**
         * Verify if email and password are ok
         */
        public function getlogin($emailConnect, $passwordConnect){
            try {
                $req = $this->getInstance()->prepare("SELECT * FROM user WHERE email = '$emailConnect'");
                $req->execute();
                $revoverdEmail = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                // if there is an email in $revoverdEmail, we check the password with password_verify function
                if (!empty($revoverdEmail)) {
                    if (password_verify($passwordConnect, $revoverdEmail[0]['password'])) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } catch (\Exception $e) {
                echo 'Error : '.$e->getMessage();
            }
        }

        /**
        * Create restriction access
        */
        public function user_only(){
            try {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['id'])) {
                    header('Location: '. URL . "accueil");
                    exit();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>