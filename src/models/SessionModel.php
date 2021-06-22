<?php

class SessionModel extends Model{
    public function seConnecter(){
        session_start();
        $_SESSION['is_connected'] = true;

        return $_SESSION['is_connected'];
    }
}