<form class="layui-form layui-form-pane" action="{:url()}" method="post" id="editLoan">

    <div class="layui-form-item">
        <label class="layui-form-label">产品名称*</label>
        <div class="layui-input-inline">
            <input type="text" lay-verify="required"  class="layui-input field-product_name" name="product_name" lay-verify="required" autocomplete="off" placeholder="请输入产品名称">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">产品logo* </label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
            <input type="hidden"  lay-verify="required"  class="upload-input field-product_logo_url" name="product_logo_url" value="">
            <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">产品简介</label>
        <div class="layui-input-inline">
            <input type="text"  data-disabled class="layui-input field-product_desc" name="product_desc" autocomplete="off" placeholder="请输入产品简介">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">贷款额度*</label>
        <div class="layui-input-inline">
            <input type="text" lay-verify="required"  class="layui-input field-loan_money_limit" name="loan_money_limit" autocomplete="off" placeholder="请输入产品额度">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">贷款期限*</label>
        <div class="layui-input-inline">
            <input type="text" lay-verify="required"  class="layui-input field-loan_time_limit" name="loan_time_limit" autocomplete="off" placeholder="请输入贷款期限">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">贷款利率</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-interest_rate" name="interest_rate" autocomplete="off" placeholder="请输入贷款利率">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">放贷时间</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-loan_start_time" name="loan_start_time" autocomplete="off" placeholder="请输入放贷时间">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">借贷条件</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-loan_charge" name="loan_charge" autocomplete="off" placeholder="请输入借贷条件">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">还款方式</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-loan_method" name="loan_method" autocomplete="off" placeholder="请输入还款方式">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">链接地址*</label>
        <div class="layui-input-inline">
            <input type="text"  lay-verify="required" class="layui-input field-product_app_url" name="product_app_url"   autocomplete="off" placeholder="请输入链接地址"  >
        </div>
    </div>

   <!-- <div class="layui-form-item">
        <label class="layui-inline">截止日期</label>
        <div class="layui-input">
            <input type="text" class="field-end_time" name="end_time" autocomplete="off" placeholder="请输入截止日期" onclick="layui.laydate({elem: this,format:'YYYY-MM-DD hh:mm:ss'})" readonly>
        </div>
    </div>-->
 <div class="layui-form-item">
        <label class="layui-form-label">推&nbsp;&nbsp;&nbsp;&nbsp;荐</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="is_recommend" value="1" title="推荐" checked>
            <input type="radio" class="field-status" name="is_recommend" value="0" title="不推荐">
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
            min:'0'
        });

        $('#reset_expire').on('click', function(){
            $('input[name="end_time"]').val(0);
        });
    });

    layui.use(['upload'], function() {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
        /**
         * 附件上传url参数说明
         * @param string $from 来源
         * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
         * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
         * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
         * @param string $thumb_type 缩略图方式
         * @param string $input 文件表单字段名
         */
        upload.render({
            elem: '.layui-upload'
            ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=m_loan_shop")}'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(res.data.file);
            }
        });
    });

</script>
<script src="__ADMIN_JS__/footer.js"></script>
