<?php
/**
 * Created by PhpStorm.
 * User: jiangmingyu
 * Date: 2017/4/18 0018
 * Time: 上午 10:27
 * 入口文件
 */
date_default_timezone_set('Asia/Shanghai');//设置时区

define('HOST',$_SERVER['HTTP_HOST'].'/');
define('ROOT',dirname(__FILE__));
//加载框架
require ROOT.'/Fast/Jason.php';


