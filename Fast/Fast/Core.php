<?php
/**
 * Created by PhpStorm.
 * User: jiangmingyu
 * Date: 2017/4/20 0020
 * Time: 上午 10:54
 */
/**
 * 核心框架
 */
//echo FRAME_ROOT;
require FRAME_ROOT.'/Fast/Error.php';


class Core{

    //运行
    public function run(){
        spl_autoload_register(array($this,'loadClass'));
        $error=new Error();
        $error->setError();
        $this->unregisterGlobals();
        $this->Route();
    }

    //路由处理
    public function Route(){
        $controllerName='Index';
        $action='index';
        $param=array();

        if(!empty($_GET['url'])){
            $url = $_GET['url'];

            // 使用“/”分割字符串，并保存在数组中
            $urlArray = explode('/', $url);

            // 删除空的数组元素
            $urlArray = array_filter($urlArray);

            // 获取控制器名
            $controllerName = ucfirst($urlArray[0]);

            // 获取动作名
            array_shift($urlArray);
            $action = $urlArray ? $urlArray[0] : 'index';

            // 获取URL参数
            array_shift($urlArray);
            $param = $urlArray ? $urlArray : array();
        }

        //实例化控制器
        $controller=$controllerName.'Controller';
        $dispatch = new $controller($controllerName, $action);

        //控制器的方法存在则传入参数，否则返回错误
        if ((int)method_exists($controller, $action)) {
            call_user_func_array(array($dispatch, $action), $param);
        } else {
            exit($controller . "控制器不存在");
        }
    }


    // 检测自定义全局变量（register globals）并移除
    public function unregisterGlobals()
    {
        if (ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    // 自动加载控制器和模型类
    public static function loadClass($class)
    {
        $frameworks = FRAME_ROOT . $class . '.class.php';
        $controllers = APP_ROOT . 'application/controllers/' . $class . '.class.php';
        $models = APP_ROOT . 'application/models/' . $class . '.class.php';

        if (file_exists($frameworks)) {
            // 加载框架核心类
            include $frameworks;
        } elseif (file_exists($controllers)) {
            // 加载应用控制器类
            include $controllers;
        } elseif (file_exists($models)) {
            //加载应用模型类
            include $models;
        } else {
            /* 错误代码 */
        }
    }





}