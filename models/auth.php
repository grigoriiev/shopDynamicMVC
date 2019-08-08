<?php

class Auth
{
    public $db;
    public function __construct($db)
    {
        $this->db = $db;
    }




    public function register($table, $data, $login, $password, $password_hash)
    {

        $this->db->store($table, $data);
        $this->login($login, $password);
    }
    public function ban($id)
    {
        $qser = $this->db->getOne("users", $id);
        if ($qser) {
            $data = ["status" => "banned", "id" => $id];
            $this->db->update("users", $data);
        }
    }
    public function unban($id)
    {
        $user = $this->db->getOne("users", $id);
        if ($user) {
            $data = ["status" => "normal", "id" => $id];
            $this->db->update("users", $data);
        }
    }
    public function getStatusUser($table, $id)
    {
        $user = $this->db->getOne($table, $id);
        if ($user) {
            return $user["status"];
        }
        return false;
    }

    public function isBanned($table, $id)
    {

        $user = $this->db->getOne($table, $id);
        if ($user["status"] == "banned") {
            return true;
        }
    }
    public function isNormal($table, $id)
    {

        $user = $this->db->getOne($table, $id);
        if ($user["status"] == "normal") {
            return true;
        }
    }

    public function login($login, $password)
    {
        $user = $this->db->getUserLogin("users", $login);

        if ($login == $user["login"] && password_verify($password, $user["password"])) {
            $file = "./files/logs/logs.txt";
            $today = date("Y-m-d H:i:s");
            $person = PHP_EOL . $user["id"] . "/" . $user["name"] . "/" . $user["surname"] . "/" . $user["login"] . "/" . $user["email"] . "/" . $today;
            file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
            $_SESSION["user"] = $user;


            return true;
        }


        return false;
    }
    public function getLogs()
    {
        $file = "./files/logs/logs.txt";
        $logs = file($file);
        $logsArr = [];
        foreach ($logs as $key => $value) {
            $logsArr[] = explode("/", $value);
        }
        return $logsArr;
    }




    public   function logout()
    {
        unset($_SESSION["user"]);
    }
    public function check()
    {

        if (isset($_SESSION["user"])) {
            return true;
        }
        return false;
    }
    public function currentUser()
    {
        if ($this->check()) {
            return $_SESSION["user"];
        }
    }
    public function remove($id)
    {

        $user = $this->db->delete("users", $id);
        
    }

    public function  fullName()
    {
        $user = $this->currentUser();
        return $user["name"] . " " . $user["surname"];
    }
}
