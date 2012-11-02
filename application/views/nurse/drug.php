<script id="case_drug_tmpl" type="text/template">
	
    {{ for (var i = 0, l = it.drugs.length; i < l; i++) { }}
    <tr>
    	<td>{{=it.drugs[i].id}}</td>
    	<td>{{=it.drugs[i].name}}</td>
    	<td>{{=it.drugs[i].sum}}</td>
    	<td>{{=it.drugs[i].price}}</td>
    </tr>
	{{ } }}
	
	<tr>
		<td></td>
		<td><h3>总价</h3></td>
		<td>{{=it.total}}</td>
	</tr>     
</script>

<div id="page_drug">
	<div class="one-half">
        <div class="box">
            <div class="inner">
                <form action="<?php echo base_url('/nurse/findDrug')?>" method="post" id="finddrug_form">
	                <div class="titlebar"><span class="icon entypo white browser"></span> <span class="w-icon">病例号查询，取药系统</span></div>
	                <div class="contents">
	                    
	                    <div class="row">
	                        <label>编号</label>
	                        <div class="field-box">
	                            <input type="text" class="medium" name="id" placeholder="请输入编号" />
	                        </div>
	                        <div class="clear"></div>
	                    </div>
	                    
	                </div>
	                <div class="bar-big">
	                    <input type="submit" id="finddrug_btn" value="查询" />
	                    <input type="reset" value="重置" />
	                </div>
                </form>
            </div>
        </div>
    	
    </div>
    <div class="one-half">
    	<div class="box">
        	<div class="inner">
        		<table id="drug_table">
		            <thead>
		                <tr>
		                	<th scope="col">#</th>
		                    <th scope="col">药名</th>
		                    <th scope="col">数量</th>
		                    <th scope="col">价格</th>
		                </tr>
		            </thead>
		            <tbody>
					</tbody>
		        </table>
		        <div class="bar-big">
                    
                    <a id="cancelprescribe_btn" class="button medium fright" href="javasricpt:void(0)">取消</a>
                    <a id="prescribe_btn" class="button light medium fright" href="javasricpt:void(0)">开药</a>
                </div>
        	</div>
        </div>
    </div>
</div>