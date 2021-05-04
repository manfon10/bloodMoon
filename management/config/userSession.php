<?php

    class userSession {

        public function setCurrentUser($user){
            $_SESSION['user'] = $user;
        }

        public function getCurrentUser(){
            return $_SESSION['user'];
        }

        public function closeSession(){
            session_destroy();
            session_unset();
        }
    }



?>