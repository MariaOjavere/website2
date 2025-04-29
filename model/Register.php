<?php
class Register {
    public function registerUser() {
        
        $controll = array(0 => false, 1 => 'Viga');
        
        $errorString = "";
        $name = $_POST['name'] ?? '';
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        
        if (!$email) {
            $errorString .= "Vale e-posti aadress<br />";
        }
        
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm'] ?? '';
        
        if (!$password || !$confirm || mb_strlen($password) < 6) {
            $errorString .= "Parool peab olema vähemalt 6 tähemärki pikk<br />";
        }
        
        if ($password !== $confirm) {
            $errorString .= "Paroolid ei ühti<br />";
        }

        if (mb_strlen($errorString) === 0) {
            $db = new Database();
            $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->execute([':email' => $email]);
            $emailExists = $stmt->fetchColumn();

            if ($emailExists > 0) {
                $errorString .= "See e-posti aadress on juba registreeritud<br />";
            }
        }
        
        if (mb_strlen($errorString) === 0) {                
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $date = date("Y-m-d");
            
            $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `registration_date`) 
                    VALUES (NULL, :username, :email, :password, 'kasutaja', :registration_date)";
            
            $db = new Database();
            $stmt = $db->prepare($sql);
            $result = $stmt->execute([
                ':username' => $name,
                ':email' => $email,
                ':password' => $passwordHash,
                ':registration_date' => $date
            ]);
            
            if ($result) {
                $controll = array(0 => true);
            } else {
                $controll = array(0 => false, 1 => 'Viga andmebaasi salvestamisel');
            }
        } else {
            $controll = array(0 => false, 1 => $errorString);
        }
        
        return $controll;
    }

    public function checkUser($username, $password) {
        $db = new Database();
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>