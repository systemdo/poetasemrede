<?php

class UserSystem {

    protected $id;
    protected $name;
    protected $email;
    protected $urlThumImg;

    public function __construct($email, $password) {
        $query = "SELECT id, email, senha, nome
                FROM Usuarios
                WHERE email = '$email'
                AND senha = '$password'";
        //die($query);
        $con = DB::getStatement($query);
        $con->execute();
        $result = $con->fetch(PDO::FETCH_OBJ);
        if ($result) {
            if ($result->email == $email) {
                if ($result->senha == $password) {
                    $this->email = $result->email;
                    $this->name = $result->nome;
                    $this->id = $result->id;
                }
            }
        } else {
            $this->id = false;
        }
    }

    function getId() {
        return $this->id;
    }

    static function user() {
        return Login::getUserSession();
    }
}

?>