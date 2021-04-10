<?php
    class User{
        private $_id;
        private $_firstname;
        private $_lastname;
        private $_email;
        private $_password;
        private $_role;
        private $_inscriptionDate;

        public function __construct($id, $firstname, $lastname, $email, $password, $role, $inscriptionDate){
            $this->_id = $id;
            $this->_firstname = $firstname;
            $this->_lastname = $lastname;
            $this->_email = $email;
            $this->_password = $password;
            $this->_role = $role;
            $this->_inscriptionDate = $inscriptionDate;
        }

        public function getId(){
            return $this->_id;
        }

        public function setId(){
            return $this->_id;
        }

        public function getFirstname(){
            return $this->_firstname;
        }

        public function setFirstname(){
            return $this->_firstname;
        }

        public function getLastname(){
            return $this->_lastname;
        }

        public function setLastname(){
            return $this->_lastname;
        }

        public function getEmail(){
            return $this->_email;
        }

        public function setEmail(){
            return $this->_email;
        }

        public function getPassword(){
            return $this->_password;
        }

        public function setPassword(){
            return $this->_password;
        }
        
        public function getRole(){
            return $this->_role;
        }

        public function setRole(){
            return $this->_role;
        }

        public function getInscriptionDate(){
            return $this->_inscriptionDate;
        }

        public function setInscriptionDate(){
            return $this->_inscriptionDate;
        }
    }

?>