<?php
class UserSystem{
    
    protected $id;
    
    protected $name;
    
    protected $email;
    
    public function __construct($email,$password) {
        $query ="SELECT id, email, password, nome
                FROM Usuarios
                WHERE email = '$email'
                AND password = '$password'"; 
        
        $con = DB::getStatement($query);
        $con->execute();
        $result = $con->fetch(PDO::FETCH_OBJ);
        if($result){			
            if($result->email == $email){
                if($result->password == $pass){
                    $this->email = $result->email;
                    $this->$name = $result->nome;
                    $this->id = $result->id;

                }
            }
        }else{
            $this->id =false;
        }
    
    
    }
}

?>