<form class="layui-form layui-form-pane" action="{:url()}" method="post" id="editLoan">

    <div class="layui-form-item">
        <label class="layui-form-label">产品名称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-product_name" name="product_name" lay-verify="required" autocomplete="off" placeholder="请输入产品名称">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">产品简介</label>
        <div class="layui-input-inline">
            <input type="text" data-disabled class="layui-input field-product_desc" name="product_desc" autocomplete="off" placeholder="请输入产品简介">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">贷款额度</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-money_limit" name="money_limit" autocomplete="off" placeholder="请输入产品额度">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">贷款利率</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-interest_rate" name="interest_rate" autocomplete="off" placeholder="请输入贷款利率">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">链接地址</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-product_app_url" name="product_app_url" autocomplete="off" placeholder="请输入链接地址"  >
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">截止日期</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-end_time" name="end_time" autocomplete="off" placeholder="请输入截止日期" onclick="layui.laydate({elem: this,istime:true  format:'YYYY-MM-DD hh:mm:ss'})" readonly>

        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
{include file="admin@block/layui" /}
<script>
    var formData = {:json_encode($data_info)};
    layui.use(['jquery', 'laydate'], function() {
        var $ = layui.jquery, laydate = layui.laydate;
        laydate.render({
            elem: '.field-end_time',
            min:'0',
	   type:'datetime'
        });

        $('#reset_expire').on('click', function(){
            $('input[name="end_time"]').val(0);
        });
    });
</script>
<script src="__ADMIN_JS__/footer.js"></script>
