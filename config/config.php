<?php
/**
 * Created by JiangMingyu.
 * User: JiangMingyu
 * E-mail: jmingyu@qq.com
 * Date: 2017/4/19/019
 * Time: 21:49
 */
//return array(
//    'aaa'=>'bbb',
//);
$db_config=[
    'tables' => [
        //通用路由
        '__default__' => [
            'prefix' => 'b2b_',
            'key' => 'id',
            'map' => [
                ['db' => 'db_b2b'],
            ],
        ],
    ],
    'servers' => [
        'db_b2b' => [                               //服务器标记
            'host'      => '127.0.0.1',             //数据库域名
            'name'      => 'koiclub_b2b',               //数据库名字
            'user'      => 'root',                  //数据库用户名
            'password'  => '123456',	                    //数据库密码
            'port'      => '3306',                  //数据库端口
            'charset'   => 'UTF8',                  //数据库字符集
        ],
    ],
];