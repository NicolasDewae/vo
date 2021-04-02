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

        public function addUserDB($firstname,$lastname,$email, $password){
            $req = "INSERT INTO user (firstname, lastname, email, password)
                    values (:firstname, :lastname, :email, :password)";
            $stmt = $this->getInstance()->prepare($req);
            $stmt->bindValue(":firsname",$firstname,PDO::PARAM_STR);
            $stmt->bindValue(":lastname",$lastname,PDO::PARAM_STR);
            $stmt->bindValue(":email",$email,PDO::PARAM_STR);
            $stmt->bindValue(":password",$password,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if($resultat > 0){
                $book = new Book($this->getInstance()->lastInsertId(),$firstname,$lastname,$email, $password);
                $this->addBook($book);
            }        
        }
    }
?>