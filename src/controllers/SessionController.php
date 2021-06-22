<?php

class SessionController{
    public function connexion(){
        $connexion=new SessionModel();
        session_start();
        rediriger('/molecules');
    }
}