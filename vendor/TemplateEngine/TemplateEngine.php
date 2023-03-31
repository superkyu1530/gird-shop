<?php

/**
 * A very simple Template engine for beginners
 * 
 * @copyright 2021
 * @license MIT
 */
class TemplateEngine
{
    public $config = [];

    public function __construct($config)
    {

        if (!isset($config['layout'])) {
            throw new Exception('Invalid configuration file. Missing layout config');
        }

        if (!isset($config['path'])) {
            throw new Exception('Invalid configuration file. Missing path view config');
        }

        $this->config = $config;
    }

    /**
     * Render layout
     *    
     * Hàm render nội dung của trang và thay giá trị các biến
     * Để render nội dung layout chính cần phải có các biến: 
     * $js: chèn các tập tin Javascript của trang con
     * $css: chèn các tập tin CSS của trang con
     * $content: chèn nội dung của trang con
     * Nội dung được render theo thứ tự: 
     * 1. Load layout
     * 2. Load nội dung trang con và đặt vào layout
     * 3. Trả về nội dung đã render
     * 
     *  Ví dụ về $data
     *      $data  = [
     *             'css' => [
     *                  'css/main.css',
     *                  'css/admin/custom.css',
     *              ],
     *             'js' => [
     *                  'js/script.js',
     *                  'js/other/another_script.js',
     *              ],
     *             'content'    => $html
     *      ];
     * 
     * @param string $view tên tập tin trong thư mục /views
     * @param array $data mảng các tham số pass sang view
     * @return string|mixed HTML output
     */
    public function renderLayout($view = null, $data = [])
    {
        $jsLinks = "";
        $cssLink = "";
        if (isset($data['js'])) {
            foreach ($data['js'] as $js) {
                if (!preg_match('/^(\bhttp(s)?\b:\/\/)/i', $js)) { // nếu không phải external host, bắt đầu bằng http:// hoặc https://
                    $f = BASE_PATH . $js; // chèn script dạng internal host, sử dụng đường dẫn tương đối js/myscript.js ==> /js/myscript.js
                }
                $jsLinks .= '<script type="text/javascript" src="' . $js . '"></script>';
            }
        }

        if (isset($data['css'])) {
            foreach ($data['css'] as $css) {
                if (!preg_match('/^(\bhttp(s)?\b:\/\/)/i', $css)) { // nếu không phải external host, bắt đầu bằng http:// hoặc https://
                    $f = BASE_PATH . $css; // chèn script dạng internal host, sử dụng đường dẫn tương đối 
                }
                $cssLink .= '<link rel="stylesheet" href="' . $css . '"/>';
            }
        }

        $childPage = $this->renderPage($view, $data);
        $params = [
            'js'    => $jsLinks,
            'css'   => $cssLink,
            'content'   => $childPage
        ];


        if ($view) {

            $childPage = $this->renderPage($view, $data);
        }

        $params = [
            'js'    => $jsLinks,
            'css'   => $cssLink,
            'content'   => $childPage
        ];

        $layout = $this->getMainLayout();

        return $this->render($layout, $params);
    }


    /**
     * Render a single page
     * 
     * Render nội dung của page $view, không bao gồm layout
     *
     * @param string $view
     * @param array $data
     * @return string|mixed HTML output
     */
    public function render($view, $data = [])
    {
        return $this->renderPage($view, $data);
    }

    /**
     * Render page với các tham số
     * @param $view string chuỗi chứa đường dẫn tương đối View
     * @param $params array chứa các tham số
     * @return string kết quả render HTML
     */
    private function renderPage($view, $params)
    {
        $file = $this->getViewPath($view); // lấy đường dẫn vật lý
        return $this->renderPhpFile($file, $params);
    }



    /**
     * Lấy đường dẫn tuyệt đối của tập tin view
     * Ví dụ $view = 'admin/login.php' ==> returns C:\xampp\htdocs\myproject\views\admin\login.php
     * 
     * @param $view tên của view
     */
    private function getViewPath($view)
    {
        $view = preg_replace("/^[\\|\\\\|\/|\/\/]/", "", $view); // remove // or \\ ở đầu chuỗi
        $path = ROOT_DIR . $this->config['path'] . DIRECTORY_SEPARATOR .  $view;
        // chuyển sang đường dẫn tuyệt đối tương thích với OS, e.g \views\layouts\main.php --> Unix/Linux /views/layouts/main.php
        $file = preg_replace('[\\\\|\\|\/|//]', DIRECTORY_SEPARATOR, $path);

        if (!file_exists($file)) {
            throw new \Exception("Unable to find the View  " . $file);
        }
        return $file;
    }

    /**
     * Get main layout based on the configuration file.
     *
     * @return string
     */
    public function getMainLayout()
    {
        $layout =  $this->config['layout']['main'] ?? 'default.php';

        $view = preg_replace("/^[\\|\\\\|\/|\/\/]/", "", $layout); // remove // or \\ ở đầu chuỗi
        $path = $this->config['layout']['path'] . DIRECTORY_SEPARATOR .  $view; // views/layouts/
        // chuyển sang đường dẫn tuyệt đối tương thích với OS, e.g \views\layouts\main.php --> Unix/Linux /views/layouts/main.php
        $path = preg_replace('[\\\\|\\|\/|//]', DIRECTORY_SEPARATOR, $path);
        return $path;
    }

    /**
     * Đọc tập tin PHP, extract các tham số như là các biến để view sử dụng 
     *
     * @param [type] $_file_
     * @param array $_params_
     * @return string HTML output
     */
    private static function renderPhpFile($_file_, $_params_ = [])
    {
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($_params_, EXTR_OVERWRITE);
        try {
            require $_file_;
            return ob_get_clean();
        } catch (\Exception $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }
}
