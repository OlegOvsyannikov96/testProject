<?php

require_once "config.php";
class Validator {
    private $response = [];
    public function is_validate($server_type, $data) {
        if($server_type === 0) {
            $this->check_login($server_type, $data->login);
            $this->check_password($server_type, $data->password);
        }
        if($server_type === 1) {
            $this->check_login($server_type, $data->login);
            $this->check_email($data->email);
            $this->check_name($data->name);
            $this->check_password($server_type, $data->password);
            $this->check_password_confirm($data->password, $data->password_confirm);
        }

        return $this->response;
    }
    private function check_login($server_type, $login) {
        if($login == null) {
            $this->response[] = ['login-error-' . $server_type, LE1];
        } elseif($server_type === 1 && mb_strlen($login) >= 6) {
            foreach(str_split($login) as $char) {
                if($char == ' ') {
                    $this->response[] = ['login-error-' . $server_type, LE2];
                    break;
                }
            }
        } elseif($server_type === 1 && mb_strlen($login) < 6) {
            $this->response[] = ['login-error-' . $server_type, LE3];  
        }
    }
    private function check_email($email) {
        if($email == null) {
            $this->response[] = ['email-error', EE1];
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->response[] = ['email-error', EE2];
        }
    }
    private function check_name($name) {
        if($name == null) {
            $this->response[] = ['name-error', NE1];
        } else {
            foreach(str_split($name) as $char) {
                if(!strrpos(CHECK_ALPHABET, $char)) {
                    $this->response[] = ['name-error', NE2];
                    break;
                }
            }
            if(mb_strlen($name) < 2) {
                $this->response[] = ['name-error', NE3];
            }
        }
    }
    private function check_password($server_type, $password) {
        if($password == null) {
            $this->response[] = ['password-error-' . $server_type, PE1];
        } elseif($server_type === 1) {
            if(!$this->check_letters_and_numbers($password)) {
                $this->response[] = ['password-error-' . $server_type, PE2];
            } else {
                if(mb_strlen($password) < 6) {
                    $this->response[] = ['password-error-' . $server_type, PE3];
                }
            }           
        }
    }
    public function check_letters_and_numbers($password) {
        $chk_letter = false;
        $chk_number = false;
        foreach(str_split($password) as $char) {
            if(!strrpos(CHECK_ALPHABET_AND_NUMBERS, $char)) {
                return false;
            }
            if(strrpos(CHECK_ALPHABET, $char)) {
                $chk_letter = true;
                continue;
            }
            if(strrpos(CHECK_NUMBERS, $char)) {
                $chk_number = true;
                continue;
            }
        }

        return ($chk_letter && $chk_number);
    }
    private function check_password_confirm($password, $password_confirm) {
        if($password_confirm == null) {
            $this->response[] = ['password-confirm-error', PCE1];
        } elseif($password_confirm != $password) {
            $this->response[] = ['password-confirm-error', PCE2];
        }
    }
}