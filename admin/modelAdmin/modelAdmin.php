<?php
class modelAdmin{
    public static function userAuth(){
        if(isset($_SESSION['userId'])){
            error_log("User already logged in: userId = " . $_SESSION['userId']);
            $logIn = true;
        } else {
            $logIn = false;
            if(isset($_POST['btnLogin'])){
                if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != "" && !empty($_POST['password'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    error_log("Attempting login with username: $username");

                    $db = new Database();
                    $sql = 'SELECT * FROM users WHERE username = ?';
                    $item = $db->getOne($sql, [$username]);
                    
                    if($item){
                        error_log("User found: id = " . $item['id'] . ", status = " . $item['status']);
                        if(password_verify($password, $item['password'])){
                            $_SESSION['userId'] = $item['id'];
                            $_SESSION['username'] = $item['username'];
                            $_SESSION['status'] = $item['status'];			
                            $_SESSION['sessionID'] = session_id();	
                            $_SESSION['email'] = $item['email'];
                            $_SESSION['is_admin'] = ($item['status'] === 'admin');
                            error_log("Login successful: userId = " . $item['id'] . ", status = " . $item['status']);
                            $logIn = true;
                        } else {
                            error_log("Password verification failed for username: $username");
                        }
                    } else {
                        error_log("User not found for username: $username");
                    }
                } else {
                    error_log("Username or password not provided");
                }
            } else {
                error_log("Login form not submitted");
            }
        }		
        return $logIn;
    }

    public static function userLogout(){
        unset($_SESSION['sessionId']);
        unset($_SESSION['userId']);		
        unset($_SESSION['username']);
        unset($_SESSION['status']);
        unset($_SESSION['is_admin']);
        session_destroy();
        return;
    }

    public static function ChangePassword(){
        $test = array(false, "No correct password");
        if(isset($_POST['send'])){
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            
            if($new_password == $confirm_password && $new_password != ""){
                $sql = 'SELECT * FROM users WHERE email = ?';
                $db = new Database();
                $item = $db->getOne($sql, [$_SESSION['email']]);
                if($item && password_verify($current_password, $item['password'])){
                    $passwordHash = password_hash($new_password, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET password = ?, pass = ? WHERE id = ?";
                    $db = new Database();
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(1, $passwordHash, PDO::PARAM_STR);
                    $stmt->bindParam(2, $new_password, PDO::PARAM_STR);
                    $stmt->bindParam(3, $_SESSION['userId'], PDO::PARAM_INT);
                    $item = $stmt->execute();
                    if($item){
                        $test = array(true);
                    }
                }
            } else {
                $test = array(false, "No insert password");
            }			
        }
        return $test;
    }
}
?>