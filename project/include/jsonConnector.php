<?php

require_once "config.php";
class JsonConnector {
    private $json_file = PATH;
    private function get_json_data() {
        $json_data = file_get_contents($this->json_file);
        $data = json_decode($json_data, true);
        $data = !empty($data) ? array_filter($data) : $data;

        return $data;
    }
    public function check_login($user) {
        $data = $this->get_json_data();

        if(!empty($data)) {
            foreach($data as $value) {
                if($value['login'] == $user->login) {
                    return true;
                }
            }
        }

        return false;
    }
    public function check_email($user) {
        $data = $this->get_json_data();

        if(!empty($data)) {
            foreach($data as $value) {
                if($value['email'] == $user->email) {
                    return true;
                }
            }
        }

        return false;
    }
    public function check_password($user){
        $data = $this->get_json_data();

        if(!empty($data)) {
            foreach($data as $value) {
                if($value['login'] == $user->login && $value['password'] == md5($user->password) . $value['salt']) {
                    return $value['name'];
                }
            }
        }

        return false;
    }
    public function create_user($user) {
        $data = $this->get_json_data();

        if(!empty($data)) {
            array_push($data, ['login' => $user->login, 'email' => $user->email, 'name' => $user->name, 'password' => md5($user->password) . time(), 'salt' => time()]);
        } else {
            $data[] = ['login' => $user->login, 'email' => $user->email, 'name' => $user->name, 'password' => md5($user->password) . time(), 'salt' => time()];
        }

        $insert = file_put_contents($this->json_file, json_encode($data));
        return $insert ? true : false;
    }
}