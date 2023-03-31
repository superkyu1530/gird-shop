<?php 
require "./bootstrap.php";

if (check_login()) {
    header("Location: index.php");
    exit();
}

$isPost = $_SERVER['REQUEST_METHOD'] == 'POST';
$errors = [];

if ($isPost) {
    $credentials = [
        'username' => $_POST['username'] ?? null,
        'password' => $_POST['password'] ?? null
    ];

    $user = authenticate($credentials);

    if ($user) {//đăng nhập thành công
        $_SESSION['user'] = $user;
    
        if(isset($_POST['remember_me'])) {

            //chuyển sang mảng chuỗi để mã hóa
            $str = serialize($credentials);

            //hàm mã hóa chuỗi được định nghĩa trong helper.
            $encrypted = encrypt($str, ENCRYPTION_KEY);


        }

        if(($user['role']) == "admin") {
            header("Location: admin.php");
        } else{
        header("Location: index.php");
    }
        exit();

    } else {
        $errors[] = 'Username or password is invalid.';
    }
}



$view = 'auth/login.php';

$data = [
    'isPost' => $isPost,
    'errors' => $errors,
];

echo $template->renderLayout($view, $data);
?>