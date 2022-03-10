<?php

class Controller {
    public $page_title;
    public $error;
    public $content;

    public function __construct()
    {
        //nếu user chưa đăng nhập thì k cho phép truy cập vào các chức năng
        $controller = $_GET['controller'];

        if (!isset($_SESSION['user']) && $controller != 'login'){
            $_SESSION['error'] = "Bạn hãy đăng nhập để sử dụng";
            header("Location:index.php?controller=login&action=login");
            exit();
        }
    }

    public function render($view_path,$variables=[]){
        extract($variables);

        ob_start();
        require_once "$view_path";
        $render_view = ob_get_clean();
        return $render_view;
    }
}
