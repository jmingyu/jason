<?php
/**
 * Created by PhpStorm.
 * User: jiangmingyu
 * Date: 2017/4/21 0021
 * Time: 下午 18:02
 * 视图基类
 */

class View{
    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller,$action){
        $this->_controller=$controller;
        $this->_action=$action;
    }

    //分配变量
    public function assign($name,$value){
        $this->variables[$name]=$value;
    }

    //渲染页面
    public function render(){
        extract($this->variables);
        $defaultHeader = APP_ROOT . 'application/views/header.php';
        $defaultLayout = APP_ROOT . 'application/views/layout.php';
        $defaultFooter = APP_ROOT . 'application/views/footer.php';

        $controllerHeader = APP_ROOT . 'application/views/' . $this->_controller . '/header.php';
        $controllerFooter = APP_ROOT . 'application/views/' . $this->_controller . '/footer.php';
        $controllerLayout = APP_ROOT . 'application/views/' . $this->_controller . '/'.$this->_action.'.php';

        // 页头文件
        if (file_exists($controllerHeader)) {
            include ($controllerHeader);
        } else {
            include ($defaultHeader);
        }

        // 页内容文件
        if (file_exists($controllerLayout)) {
            include ($controllerLayout);
        } else {
            include ($defaultLayout);
        }

        // 页脚文件
        if (file_exists($controllerFooter)) {
            include ($controllerFooter);
        } else {
            include ($defaultFooter);
        }
    }
}
