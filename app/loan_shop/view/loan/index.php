<!--
+----------------------------------------------------------------------
| 列表页实例模板，Ctrl+A 可直接复制以下代码使用
+----------------------------------------------------------------------
-->
<form class="page-list-form">
<div class="layui-collapse page-tips">
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">温馨提示</h2>
    <div class="layui-colla-content">
      <p>此页面为后台数据管理标准模板，您可以直接复制使用修改</p>
    </div>
  </div>
</div>
<div class="page-toolbar">
    <div class="layui-btn-group fl">

        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
      <!--  <a href="{:url('status?table=loan_shop&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a href="{:url('status?table=loan_shop&val=2')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
-->
    </div>
<div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
          <!--  <div class="layui-input-inline">
                <select name="q" class="field-q" lay-verify="required"  type="select">
                    <option value="update_time" selected="">更新时间</option>
                    <option value="create_time" >创建时间</option>
                    <option value="hit_count" >点击次数</option>
                </select>
            </div>  -->
            <div class="layui-input-inline">
                <input type="text" name="q" lay-verify="required" placeholder="update_time/create_time/status" autocomplete="off" class="layui-input">
            </div>
	    <label class="layui-form-label">排序</label>
        </div>
        </form>
    </div>
</div>
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
            <col width="100">
            <col width="80">
            <col width="80">
            <col width="80">
            <col width="120">
            <col width="120">
            <col width="100">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>产品名称</th>
                <th>额度</th>
                <th>期限</th>
                <th>利率</th>
                <th>修改时间</th>
                <th>创建时间</th>
                <th>点击次数</th>
                <th>状态</th>
                <th>推荐/取消</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>

            {volist name="data_list" id="voa"}
            <tr>
                <td><input type="checkbox" class="layui-checkbox checkbox-ids" name="ids[]" value="{$voa['id']}" lay-skin="primary"></td>

                <td>{$voa['product_name']}</td>
                <td>{$voa['loan_money_limit']}</td>
                <td>{$voa['loan_time_limit']}</td>
                <td>{$voa['interest_rate']}</td>
                <td>{$voa['update_time']}</td>
                <td>{$voa['create_time']} </td>
                <td>{$voa['hit_count']}</td>
                <td><input type="checkbox" name="status" {if condition="$voa['status'] eq 1"}checked=""{/if} value="{$voa['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=loan_shop&ids='.$voa['id'])}"></td>
                <td><input type="checkbox" name="is_recommend" {if condition="$voa['is_recommend'] eq 1"}checked=""{/if} value="{$voa['is_recommend']}" lay-skin="switch" lay-filter="switchStatus" lay-text="推荐|取消" data-href="{:url('status?field=is_recommend&table=loan_shop&ids='.$voa['id'])}"></td>
                <td>

                    <div class="layui-btn-group">
                        <div class="layui-btn-group">
                            <a href="{:url('edit?id='.$voa['id'])}" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon">&#xe642;</i></a>
                            <a data-href="{:url('del?id='.$voa['id'])}" class="layui-btn layui-btn-primary layui-btn-sm j-tr-del"><i class="layui-icon">&#xe640;</i></a>
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


