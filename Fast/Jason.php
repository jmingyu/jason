<?php
/**
 * Created by PhpStorm.
 * User: jiangmingyu
 * Date: 2017/4/19 0019
 * Time: 下午 15:38
 */
//项目根目录
defined('FRAME_ROOT') or define('FRAME_ROOT', dirname(__FILE__).'/');//框架目录
defined('APP_ROOT') or define('APP_ROOT', dirname($_SERVER['SCRIPT_FILENAME']).'/');//项目目录
defined('APP_DEBUG') or define('APP_DEBUG', true);//调试模式是否开启
defined('CONFIG_ROOT') or define('CONFIG_ROOT', APP_ROOT.'config/');//配置文件目录
defined('RUNTIME_ROOT') or define('RUNTIME_ROOT', APP_ROOT.'runtime/');

// 包含配置文件
require APP_ROOT . 'config/config.php';
//包含notorm
require  FRAME_ROOT.'DB/NotORM.php';
//包含核心框架类
require FRAME_ROOT . 'Core.php';

//实例化数据库类
$notorm=new Fast_DB_NotORM($db_config);
//实例化核心类
$jason=new Core();
$jason->run();
//var_dump($db_config['tables']);
//var_dump(file_exists());
//echo APP_ROOT.'>>>>>'.FRAME_ROOT;