<?php
class Register {
    public function registerUser() {
        $controll = array(0 => false, 1 => 'Viga');
        
        if (isset($_POST['save'])) {
            $errorString = "";
            $name = $_POST['name'];
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            
            if (!$email) {
                $errorString .= "Vale e-posti aadress<br />";
            }
            
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            
            if (!$password || !$confirm || mb_strlen($password) < 6) {
                $errorString .= "Parool peab olema vähemalt 6 tähemärki pikk<br />";
            }
            
            if ($password != $confirm) {
                $errorString .= "Paroolid ei ühti<br />";
            }
            
            if (mb_strlen($errorString) == 0) {                
                $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $date = Date("Y-m-d");
                
                $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `registration_date`, `pass`) 
                        VALUES (NULL, '$name', '$email', '$passwordHash', 'kasutaja', '$date', '$password')";
                
                $db = new Database();
                $item = $db->executeRun($sql);
                
                if ($item) 
                    $controll = array(0 => true);
                else
                    $controll = array(0 => false, 1 => 'Viga');
            } else {
                $controll = array(0 => false, 1 => $errorString);
            }
        }
        
        return $controll;
    }
    public function checkUser($username, $password) {
        $db = new Database();
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && $user['password'] === $password) {
            return $user;
        }
        return false;
    }
}
?>
