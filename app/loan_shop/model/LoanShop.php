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
namespace app\loan_shop\model;

use think\Model;
/**
 * 贷款Model
 * @package app\admin\model
 */
class LoanShop extends Model
{

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;


    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * 获取所有角色
     * @author 橘子俊 <364666827@qq.com>
     * @return array
     */
    public static function getAll()
    {
        return self::column('id,product_name');
    }

}
