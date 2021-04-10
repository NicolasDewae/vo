<?php
    class JsController {
        private $JsController;

        public function successAlert(){
            echo    
                "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                <script>
                    $('successAdmin').fadeIn(400);
                </script>";
        }

        public function failAlert(){
            echo    
                "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                <script>
                    $('successAdmin').fadeIn(400);
                </script>";
        }

        public function redirection($route){
            echo    
                "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                <script>
                    document.location.href='". URL ."$route';
                </script>";
        }

    }
?>