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
}
