<?php
class UserSystem{
    
    protected $id;
    
    protected $name;
    
    protected $email;
    
    public function __construct($email,$password) {
        $query ="SELECT id, email, senha, nome
                FROM Usuarios
                WHERE email = '$email'
                AND senha = '$password'"; 
        //die($query);
        $con = DB::getStatement($query);
        $con->execute();
        $result = $con->fetch(PDO::FETCH_OBJ);
        if($result){	

            if($result->email == $email){

                if($result->senha == $password){
                    $this->email = $result->email;
                    $this->name = $result->nome;
                    $this->id = $result->id;

                }
            }
        }else{
            $this->id =false;
        }
    
    
    }
    
    function getId(){
        return $this->id;
    }
    
    static function user(){
        return Login::getUserSession();
    }
    
    public static function getPathThumbImageUser(){
        ///uploads/imgteste.jpg
        $image =  SD::getUrlUpload(). '/thumbs/' . $this->getNameImgApp();
        if(file_exists($image)){
            return $image; 
        }
        return  SD::getUrlUpload()."/imgteste.jpg" ;
    }
}

?>