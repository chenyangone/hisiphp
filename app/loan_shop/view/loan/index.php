<!--
+----------------------------------------------------------------------
| 列表页实例模板，Ctrl+A 可直接复制以下代码使用
+----------------------------------------------------------------------
-->
<form class="page-list-form">
<div class="page-toolbar">
    <div class="layui-btn-group fl">

        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>

    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="q" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
            <col width="100">
            <col width="100">
            <col width="200">
            <col width="100">
            <col width="100">
            <col width="300">
            <col width="50">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>产品名称</th>
                <th>产品介绍</th>
                <th>产品链接地址</th>
                <th>额度限制</th>
                <th>贷款利率</th>
                <th>截止日期</th>
                <th>点击次数</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>

            {volist name="data_list" id="voa"}
            <tr>
                <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" value="{$voa['id']}" lay-skin="primary"></td>

                <td>{$voa['product_name']}</td>
                <td>{$voa['product_desc']}</td>
                <td>{$voa['product_app_url']}</td>
                <td>{$voa['money_limit']}</td>
                <td>{$voa['interest_rate']}</td>
                <td>{:date('Y-m-d H:i:s', $voa['end_time'])} </td>
                <td>{$voa['hit_count']}</td>
                <td><input type="checkbox" name="status" {if condition="$voa['status'] eq 1"}checked=""{/if} value="{$voa['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=loan_shop&ids='.$voa['id'])}"></td>
                <td>
		<div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a href="{:url('edit?id='.$voa['id'])}" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon">&#xe642;</i></a>
                            <a data-href="{:url('del?id='. $voa['id'])}" class="layui-btn layui-btn-primary layui-btn-sm j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                        </div>
                    </div>
                </td>
            </tr>
            {/volist}

        </tbody>
    </table>
</div>
</form>

{include file="admin@block/layui" /}


