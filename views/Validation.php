<?php

class Validation {

    private $data;
    private $errors = [];
    private $champslogin = ['mail', 'password', 'subbutton'];
    private $champssignup = ['username', 'mail', 'password', 'secondpassword', 'subbutton'];
    private $champstask = ['checkbox', 'categories', 'date', 'subbutton'];
    private static $champs;
    private $functionsToDo;


    public function __contruct($post_data){
        this->data = $post_data;
    }

    public function validateForm(){
        switch ($data['subbutton']) {



            //POSER DES QUESTIONS MATHIS !



            case 'Abandonner':  //case ($v == 1 || $v == 2) ===    case 1:case 2: /* This is called "falling through" the case block. The term exists in most languages implementing a switch statement. */
            case 'Sauvegarder':
                $champs = $champstask;
                $functionsToDo = 1;
                break;
            case 'S\'inscrire':
                $champs2 = $champssignup;
                $functionsToDo = 2;
                break;
            case 'Se connecter':
                $champs = $champslogin;
                $functionsToDo = 3;
                break;
        }

        foreach (self::$champs as $champ) {
            if(!array_key_exists($field, $this->data)){
                trigger_error("Le champs [$field] n'est pas présent dans les données envoyées");
                return;
            }
        }

        switch ($functionsToDo) {
            case 1: //task
                $this->validateTaskNamePassword();
                $this->validateTaskText();
                return $this->errors;
                break;

            case 2: //sign
                $this->validateName();
                $this->validateMail();
                $this->validatePassword();
                $this->validateConfirmPassword();
                return $this->errors;
                break;

            case 3: //login
                $this->validateMail();
                $this->validatePassword();
                return $this->errors;
                break; //le break est là pour la forme le return doit faire sortir
            }
        }

    }

    public function validateMail(){

    }

    public function validatePassword(){

    }

    public function validateName(){

    }

    public function validateConfirmPassword(){

    }

    public function validateTaskNamePassword(){

    }

    public function validateTaskText(){

    }

    public addError(){

    }


/*
Pour plus tard : Lire les results de checkboxs
    if (isset($_POST['froid'])) {
        foreach ($variable as $value) {

        }
    }
*/

}

?>
