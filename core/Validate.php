<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Validate{
    function isEmpty($dado){
        if(!empty($dado)){
            return $dado;
        }
        return false;
    }
    
    function isEmail($email){
        if(!empty($email)){
            if(strpos($email, '@')){
                return $email;
            }
        }
        return false;
    }
}
?>
