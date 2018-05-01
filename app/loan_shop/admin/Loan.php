<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\loan_shop\admin;
use app\loan_shop\model\LoanShop as ModelLoanShop;
use think\Log;

/**
 * 配置管理控制器
 * @package app\loan_shop\controller
 */

class Loan extends \app\admin\controller\Admin
{
    public function index($group = 'base')
    {
        $tab_data['menu'] = [
            [
                'title' => '商品',
                'url'   => ''
            ]
        ];
        $tab_data['current'] = url();

	$map = [];
	$map['del_status'] = 0;
        $data_list = ModelLoanShop::where($map)->paginate(10);

        Log::record(json_encode($data_list), 'error');

       $pages = $data_list->render();
        $this->assign('data_list', $data_list);
       $this->assign('pages', $pages);
        $this->assign('tab_data', $tab_data);
        $this->assign('tab_type', 1);
        return $this->fetch();
    }

    /**
     * 添加配置
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            Log::record(json_encode($data), 'error');

            $data['end_time'] = strtotime($data['end_time']);
            // 验证
          //  $result = $this->validate($data, 'LoanShop');
          //  if($result !== true) {
            //    return $this->error($result);
           // }
            if (!ModelLoanShop::create($data)) {
                return $this->error('添加失败！');
            }
            return $this->success('添加成功。');
        }
        return $this->fetch('loanform');
    }

    /**
     * 修改配置
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */


    public function edit($id = 0)
    {
        $row = ModelLoanShop::where('id', $id)->field('*')->find();

        if ($this->request->isPost()) {
            $data = $this->request->post();
            if (!ModelLoanShop::update($data)) {
                return $this->error('保存失败！');
            }
            return $this->success('保存成功。');
        }
    //    $row['tips'] = htmlspecialchars_decode($row['tips']);
    //    $row['value'] = htmlspecialchars_decode($row['value']);
        $this->assign('data_info', $row);
        return $this->fetch('loanform');
    }



    /**
     * 删除配置
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function del()
    {
        $id = input('param.id');
        $data['id'] = $id;
        $data['del_status'] = 1;
        if (!ModelLoanShop::update($data)) {
            return $this->error('删除失败！');
        }
        return $this->success('删除成功。');
    }




}

