<?php
require_once "DbConnection.class.php";
require_once "user.class.php";

    class UserManager extends dbConnection {
        private $_users; // User tab

        public function getUserById($id){
            for ($i=0; $i < count($this->_users); $i++) { 
                if ($this->_users[$i]->getId() === $id) {
                    return $this->_users[$i];
                }
            }
        }

        /**
         * Insert user in database 
         */
        public function addUserDB($firstname,$lastname,$email,$password,$role){
            try {
                $req = "INSERT INTO user (firstname, lastname, email, password, role)
                values (:firstname, :lastname, :email, :password, :role)";
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
         * Verify if email and password exist in database
         */
        public function getlogin($emailConnect, $passwordConnect){
            try {
                $req = $this->getInstance()->prepare("SELECT * FROM user WHERE email = '$emailConnect' AND password = '$passwordConnect'");
                $req->execute();
                $login = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                // if email ans password exist, return true
                if ($login == true) {
                    return true;
                }else {
                    return false;
                }
            } catch (\Exception $e) {
                echo 'Error : '.$e->getMessage();
            }
        }
    }
?>