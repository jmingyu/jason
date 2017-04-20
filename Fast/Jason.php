<?php
/**
 * Created by PhpStorm.
 * User: jiangmingyu
 * Date: 2017/4/19 0019
 * Time: 下午 15:38
 */

/**
 * 项目根目录
 */
defined('FRAME_ROOT') or define('FRAME_ROOT', dirname(__FILE__));
defined('APP_ROOT') or define('APP_ROOT', dirname($_SERVER['SCRIPT_FILENAME']).'/');
defined('APP_DEBUG') or define('APP_DEBUG', false);
defined('CONFIG_ROOT') or define('CONFIG_ROOT', APP_ROOT.'config/');
defined('RUNTIME_ROOT') or define('RUNTIME_ROOT', APP_ROOT.'runtime/');

// 包含配置文件
require APP_ROOT . '/config/config.php';

//包含核心框架类
require FRAME_ROOT . '/Fast/Core.php';

$jason=new Core();
$jason->run();
//var_dump(file_exists());
echo file_exists(date('Ym',time()));