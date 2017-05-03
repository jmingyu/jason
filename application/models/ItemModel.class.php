<?php

class ItemModel extends Fast_DB_NotORM
{
    private static $model = null;
    public function __construct() {
        if (self::$model == null) {
            $model = new Fast_DB_NotORM();
            self::$model=$model->item;
        }
    }
    public function index(){
        return self::$model->fetchAll();
    }

    public function add($data){
        return self::$model->insert($data);
    }

    public function view($id){
        return self::$model->where('id',$id)->fetch();
    }

    public function update($id,$value){
        return self::$model->where('id',$id)->update(['item_name'=>$value]);
    }

    public function delete($id){
        return self::$model->where('id',$id)->delete();
    }

}