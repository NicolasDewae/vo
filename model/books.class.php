<?php
    class Book{
        private $_id;
        private $_title;
        private $_nbPages;
        private $_image;

        public function __construct($id, $title, $nbPages, $image){
            $this->_id = $id;
            $this->_title = $title;
            $this->_nbPages = $nbPages;
            $this->_image = $image;
        }

        public function getId(){
            return $this->_id;
        }

        public function setId(){
            return $this->_id;
        }

        public function getTitle(){
            return $this->_title;
        }

        public function setTitle(){
            return $this->_title;
        }

        public function getNbPages(){
            return $this->_nbPages;
        }

        public function setNbPages(){
            return $this->_nbPages;
        }

        public function getImage(){
            return $this->_image;
        }

        public function setImage(){
            return $this->_image;
        }
    }

?>