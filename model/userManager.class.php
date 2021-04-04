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
        public function addUserDB($firstname,$lastname,$email, $password){
            $req = "INSERT INTO user (firstname, lastname, email, password)
            values (:firstname, :lastname, :email, :password)";
            $stmt = $this->getInstance()->prepare($req);
            $stmt->bindValue(":firstname",$firstname,PDO::PARAM_STR);
            $stmt->bindValue(":lastname",$lastname,PDO::PARAM_STR);
            $stmt->bindValue(":email",$email,PDO::PARAM_STR);
            $stmt->bindValue(":password",$password,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();                
        }

        /**
         * Verify if email exist in database
         */
        public function getEmailUser($email){
            $req = $this->getInstance()->prepare("SELECT email FROM user WHERE email = '$email'");
            $req->execute();
            // avoid having duplicates
            $userEmail = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            
            if ($userEmail == true) {
                return true;
            }else {
                return false;
            }
        }
    }
?>