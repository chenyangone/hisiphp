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
/**
 * 配置管理控制器
 * @package app\loan_shop\controller
 */

class LoanApi extends \app\common\controller\Common
{
    //api 接口
    public function getLoan()
    {
        $type = input('param.type');
        if ($type == 'hot') {
            $result = ModelLoanShop::getHotLoan();
        } elseif ($type == 'recommend') {
            $result = ModelLoanShop::getRecommendLoan();
        } else {
            $result = [];
        }
	$result = array_values($result);
        $this->result( $result,0,'success','json');
    }

    public function addCount(){
        $id = input('param.id');
        $row = ModelLoanShop::where('id', $id)->field('*')->find();
        $data['id'] = $id;
        $data['hit_count'] = $row['hit_count'] +1 ;
        if (!ModelLoanShop::update($data)) {
            $this->result( [],-1,'fail','json');
        }else{
            $this->result( [],0,'success','json');
        }
    }

}

