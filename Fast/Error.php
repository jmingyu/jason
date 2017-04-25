<?php
/**
 * Created by PhpStorm.
 * User: jiangmingyu
 * Date: 2017/4/20 0020
 * Time: 下午 17:34
 */
class Fast_Error{
    //设置报错信息,每天把错误日志写到新的文件里面
    public function setError(){
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            $doc_path=RUNTIME_ROOT. 'logs/'.date('Ym',time());
            $file_path=RUNTIME_ROOT. 'logs/'.date('Ym',time()).'/'.date('d',time()).'.log';
            if(!file_exists($doc_path)){
                //新建文件夹
                mkdir ($doc_path);
            }
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', $file_path);
        }
    }
}

