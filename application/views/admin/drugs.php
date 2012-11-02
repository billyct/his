<script id="druglist_tr_tmpl" type="text/template">
<tr>
    <td>{{=it.id}}</td>
	<td>{{=it.type}}</td>
    <td>{{=it.name}}</td>
    <td>{{=it.price}}</td>
    <td>{{=it.sum}}</td>
    <td class="center">
        <a href="<?php echo base_url('admin/deleteDrug')?>" 
        	class="icon entypo cancel tipsy-trigger delete_link" 
        	data="{{=it.id}}" title="删除"></a>
    </td>
</tr>
</script>

<div id="page_drugs">
	<div class="one-half">
        <div class="box">
            <div class="inner">
                <form action="<?php echo base_url('/admin/addDrug')?>" method="post" id="adddrug_form">
                <div class="titlebar"><span class="icon entypo white browser"></span> <span class="w-icon">添加药品</span></div>
                <div class="contents">

                	<div class="row">
                		<label>药品名称</label>
	                	<div class="field-box" id="drug_type_select_container">
	                    	<select id="drug_type_select" name="drug_type">
	                    		<option value="1">中药</option>
	                    		<option value="2">西药</option>
	                    		<option value="3">中成药</option>
	                    	</select>
	                	</div>
	                </div>
                    
                    <div class="row">
                        <label>药品名称</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="drug_name" placeholder="请输入药品名">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>单价</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="drug_price" placeholder="请输入药品单价">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>库存</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="drug_sum" placeholder="请输入药品库存">
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                </div>
                <div class="bar-big">
                    <input type="submit" id="adddrug_btn" value="添加药品">
                    <input type="reset" value="重置">
                    
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="one-half">
        <div class="box no-bg">
        	<h2>用户管理</h2>
        	<table id="druglist_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">药品类型</th>
                        <th scope="col">药品名</th>
                        <th scope="col">单价</th>
                        <th scope="col">库存</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($drugs as $drug) { ?>
                        <tr>
                            <td><?= $drug['id']?></td>
							<td><?= $drug['type']?></td>
                            <td><?= $drug['name']?></td>
                            <td><?= $drug['price']?></td>
                            <td><?= $drug['sum']?></td>
                            <td class="center">
                                <a href="<?php echo base_url('admin/deleteDrug')?>" class="icon entypo cancel tipsy-trigger delete_link" data="<?= $drug['id']?>" title="删除"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>