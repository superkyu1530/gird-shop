<?php
require "./bootstrap.php";

$isPost = $_SERVER['REQUEST_METHOD'] == 'POST';
$isSuccess = false;
$params = [];
$errors = [];

if ($isPost) 
{   
    $params['username'] = $_POST['username'] ?? null;
    $params['email'] = $_POST['email'] ?? null;
    $params['password'] = $_POST['password'] ?? null;
    $params['comfirm_password'] = $_POST['comfirm_password'] ?? null;

    $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
    if (!preg_match($pattern, $params['username'])) 
        {$errors['username'] = 'Only letters, numbers, underscore and at least 6 character long is allowed!';}

    if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) 
        {$errors['email'] = 'Invalid email format!';}

    $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
    if (!preg_match($pattern, $params['password'])) 
        {$errors['password'] = 'Password must contains at least one capitalize letters, number and special character!';}

    if ($params['password'] !== $params['comfirm_password']) 
        {$errors['comfirm_password'] = 'Password does not match';}

    if (!isset($_POST['terms']))
        {$errors['terms'] = 'You must agree before submitting.';}

    $sql = "SELECT username FROM users WHERE username = :username";
    /**
    * @var \PDO
    */
     $db = $GLOBALS['db'];

     $stmt = $db->prepare($sql);
     $stmt->execute([
        'username' => $params['username'],
    ]);
     if ($stmt ->fetch())
        {$errors['username'] = 'This username is already taken. Please choose another username.';}

     if (empty($errors)) 
     {
        $params['password'] = encrypt_password($params['password']);
        $params['created_at'] = date("Y-m-d H:i:s");
        unset($params['comfirm_password']);

        $sql = "INSERT INTO users(username, email, password, created_at, role) VALUES (:username, :email, :password, :created_at, 'user')";
        $stmt = $db->prepare($sql);
        if ($stmt->execute($params)) 
        {
            $messages['success'] = 'Congratulations, your account has been created successfully.';
            $isSuccess = true;
        }
        else 
            {$errors['failed'] = 'Registration failed. Something went wrong, please try agian.';}
    }
}
$view = 'auth/register.php';
$data = [
    'errors' => $errors,
    'params' => $params,
    'isPost' => $isPost,
    'js' =>[
        'assets/js/validate_form.js',
    ]
];

if ($isPost && $isSuccess) 
{
    $view = 'auth/register_success.php';
    echo $template->renderLayout($view, ['messages' => $messages]);
}
else 
{
    echo $template->renderLayout($view, $data);
};
?>