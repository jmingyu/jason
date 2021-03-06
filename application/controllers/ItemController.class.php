<?php
/**
 * Created by JiangMingyu.
 * User: JiangMingyu
 * E-mail: jmingyu@qq.com
 * Date: 2017/4/17/017
 * Time: 22:30
 */

class ItemController extends Controller
{

    // 首页方法，测试框架自定义DB查询
    public function index()
    {
        $model = new ItemModel();
        $items=$model->index();
        $this->assign('title', '全部条目');
        $this->assign('items', $items);
        $this->render();
    }

    // 添加记录，测试框架DB记录创建（Create）
    public function add()
    {
        $data['item_name'] = $_POST['value'];
        $model=new ItemModel();
        $count=$model->add($data);

        $this->assign('title', '添加成功');
        $this->assign('count', $count);
        $this->render();
    }

    // 查看记录，测试框架DB记录读取（Read）
    public function view($id = null)
    {
        $model=new ItemModel();
        $item = $model->view($id);
        $this->assign('title', '正在查看' . $item['item_name']);
        $this->assign('item', $item);
        $this->render();
    }

    // 更新记录，测试框架DB记录更新（Update）
    public function update()
    {
        $model=new ItemModel();
        $count=$model->update($_POST['id'],$_POST['value']);

        $this->assign('title', '修改成功');
        $this->assign('count', $count);
        $this->render();
    }

    // 删除记录，测试框架DB记录删除（Delete）
    public function delete($id = null)
    {
        $model=new ItemModel();
        $count=$model->delete($id);

        $this->assign('title', '删除成功');
        $this->assign('count', $count);
        $this->render();
    }

}