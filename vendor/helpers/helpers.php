<?php
    if(!function_exists('authenticate')){
        function authenticate($credentials)
        {
            /**
             * @var PDO
             */
            $db = $GLOBALS['db'];
            $username = $credentials['username'] ?? null;
            $password = $credentials['password'] ?? null;

            if ($username == null || $password == null) {
                return false;
            }

            $sql = "SELECT user_id, username, email, role, password FROM users
                    WHERE username = :username";
            $stmt = $db->prepare($sql);

            $stmt->execute([
                'username' => $username,
            ]);

            $user = $stmt->fetch();
            if ($user != null)
            {
                $password_hash = $user['password'];
                if (password_check($password,$password_hash)) {return $user;}
            }
            return false;
        }
    }

    if (!function_exists('encrypt')) {
        function encrypt($pure_string, $encryption_key)
        {
            $ciphering = "AES-128-CTR";
    
            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
    
            // Non-NULL Initialization Vector for encryption
            $encryption_iv = '1234567891011121';
    
            // Use openssl_encrypt() function to encrypt the data
            $encryption = openssl_encrypt(
                $pure_string,
                $ciphering,
                $encryption_key,
                $options,
                $encryption_iv
            );
    
            return $encryption;
        }
    }
    
    if (!function_exists('decrypt')) {
        function decrypt($encrypted_string, $encryption_key)
        {
            $ciphering = "AES-128-CTR";
            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
    
            // Non-NULL Initialization Vector for decryption
            $decryption_iv = '1234567891011121';
    
            // Use openssl_decrypt() function to decrypt the data
            $decryption = openssl_decrypt(
                $encrypted_string,
                $ciphering,
                $encryption_key,
                $options,
                $decryption_iv
            );
    
            return $decryption;
        }
    }

    if (!function_exists('auto_login')){
        function auto_login() 
        {
            $encryptedCredentials = $_COOKIE['credentials'] ?? null;

            if (!$encryptedCredentials) {
                return;
            }

            $decriptedCredentials = decrypt($encryptedCredentials,ENCRYPTION_KEY);

            $credentials = unserialize($decriptedCredentials);

            $user = authenticate($credentials);

            if ($user) {
                $_SESSION['user'] = $user;
            }

        }
    }

    if (!function_exists('check_login')) {
        function check_login()
        {
            return isset($_SESSION['user']) ? true : false;
        }
    }

    if (!function_exists('encrypt_password')) {
        function encrypt_password($password)
        {
            $options = [
                'cost' => 12,
            ];
            return password_hash($password, PASSWORD_BCRYPT, $options);
        }
    }

    if (!function_exists('password_check')) {
        function password_check($password, $password_hash)
        {
            return password_verify($password, $password_hash);
        }
    }

    if(!function_exists('check_role')) {
        function check_role() {
            $user=$_SESSION['user'];
            return $user['role'];
        }
    }
?>