<?php


    class DbOperations{

        private $con;

        function __construct(){
            require_once dirname(__FILE__) . '/DbConnect.php';

            $db = new DbConnect;

            $this->con = $db->connect();
        }

        public function createUser($email, $password, $name, $school){
            if(!$this->isEmailExist($email)){
                $stmt =  $this->con->prepare("INSERT INTO users (email, password, name, school) VALUES(?, ?, ?, ?)");
                $stmt->bind_param("ssss", $email, $password, $name, $school);
                if($stmt->execute()){
                    return USER_CREATED;
                } else{
                    return USER_FAILURE;
                }
        }
            return USER_EXISTS;
        }

        public function userLogin($email, $password){
            if($this->isEmailExist($email)){

                $hashed_password = $this->getUsersPasswordByEmail($email);
                if(password_verify($password, $hashed_password)){
                    return USER_AUTHENTICATED;
                }else {
                    return USER_PASSWORD_DO_NOT_MATCH;
                }

            }else{
                return USER_NOT_FOUND;
            }
        } 

        private function getUsersPasswordByEmail($email){
            $stmt = $this->con->prepare("SELECT password FROM users WHERE email = ?" );
            $stmt ->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($password);
            $stmt->fetch();
            $user = array();
           return $password;
        }

        public function getAllUsers(){
            $stmt = $this->con->prepare("SELECT id, email, name, school FROM users;");
            $stmt->execute();
            $stmt->bind_result($id, $email, $name, $school);
            $users = array();
            while($stmt->fetch()){
                    $user = array();
                    $user['id'] = $id;
                    $user['email'] = $email;
                    $user['name'] = $name;
                    $user['school'] = $school;
                    array_push($users, $user);
            }
        
            return $users;
        }
        
        // public function getAllPaydates(){
        //     $stmt = $this->con->prepare("SELECT * FROM project_matrix_paydate;");
        //     $stmt->execute();
        //     $stmt->bind_result($date_id, $plan_id, $pay_month, $pay_amount, $unit_id, $client_id, $pay_state, $author_id,  $post_date);
        //     $paydate = array();
        //     while($stmt->fetch()){
        //             $paydate = array();
        //             $paydate['date_id'] = $date_id;
        //             $paydate['plan_id'] = $plan_id;
        //             $paydate['pay_month'] = $pay_month;
        //             $paydate['pay_amount'] = $pay_amount;
        //             $paydate['unit_id'] = $unit_id;
        //             $paydate['client_id'] = $client_id;
        //             $paydate['pay_state'] = $pay_state;
        //             $paydate['author_id'] = $author_id;
        //             $paydate['post_date'] = $post_date;
        //             array_push($paydate, $paydate);
        //     }
        // }

        public function getUserByEmail($email){
            $stmt = $this->con->prepare("SELECT id, email, name, school FROM users WHERE email = ?" );
            $stmt ->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $email, $name, $school);
            $stmt->fetch();
            $user = array();
            $user['id'] = $id;
            $user['email'] = $email;
            $user['name'] = $name;
            $user['school'] = $school;
            return $user;
        }

        public function updateUser($email, $name, $school, $id){
        
            $stmt = $this->con->prepare("UPDATE users SET email = ?, name = ?, school = ? WHERE id = ?");
            $stmt->bind_param("sssi", $email, $name, $school, $id);
            if($stmt->execute())

            return true;
            return false;
        }

        public function updatePassword($currentpassword, $newpassword, $email){
            
            $hashed_password = $this->getUsersPasswordByEmail($email);
                if(password_verify($currentpassword, $hashed_password)){

                    $hash_password = password_hash($newpassword, PASSWORD_DEFAULT);
                    $stmt = $this->con->prepare("UPDATE users SET password = ? WHERE email = ?");
                    $stmt->bind_param("ss", $hashed_password, $email);

                    if( $stmt->execute())
                        return PASSWORD_CHANGED;
                        return PASSWORD_DO_NOT_MATCH;
                    

                
                } else{
                    return PASSWORD_DO_NOT_MATCH;
                }
        }

        public function deleteUser($id){
            $stmt = $this->con->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute())
            return true;
            return false;
        }

        private function isEmailExist($email){
            $stmt = $this->con->prepare("SELECT id FROM users WHERE email = ?"); 
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }

    }