<script id="drug_tr_tmpl" type="text/template">
	<tr class="drug_tr" id="drug_tr">
        <td>
        	<div class="drug_type_select_container">
            	<select id="drug_type_select" name="drug_type">
            		<option value="1">中药</option>
            		<option value="2">西药</option>
            		<option value="3">中成药</option>
            	</select>
        	</div>
        </td>
        <td>
        	<div id="drugZY_select_container" class="drug_div">
            	<select id="drugZY_select" name="drugZY">
            		<?php foreach ($drugsZY as $drug) { ?>
            			<option value="<?=$drug['id']?>"><?=$drug['name']?></option>
            		<?php } ?>
            	</select>
        	</div>

        	<div id="drugXY_select_container" class="drug_div" style="display:none">
            	<select id="drugXY_select" name="drugXY">
            		<?php foreach ($drugsXY as $drug) { ?>
            			<option value="<?=$drug['id']?>"><?=$drug['name']?></option>
            		<?php } ?>
            	</select>
            </div>

            <div id="drugZCY_select_container" class="drug_div" style="display:none">
            	<select id="drugZCY_select" name="drugZCY">
            		<?php foreach ($drugsZCY as $drug) { ?>
            			<option value="<?=$drug['id']?>"><?=$drug['name']?></option>
            		<?php } ?>
            	</select>
        	</div>
        </td>
        <td><input type="text" class="tiny" name="sum"/></td>
        <td class="center">
            <a href="javascript:void(0);" class="icon entypo cancel tipsy-trigger delete_link" title="删除"></a>
        </td>
    </tr>
</script>

<script id="patient_reg_tmpl" type="text/template">
    <div class="box">
        <input type="hidden" name="reg_id" id="reg_id" value="{{=it.id}}" />
        <input type="hidden" name="patient_id" id="patient_id" value="{{=it.patient_id}}" />
        <p>身份证：{{=it.id_card}}</p>
        <p>姓名：{{=it.name}}</p>
        <p>性别：{{=it.gender}}</p>
        <p>年龄：{{=it.age}}</p>
        <p>地址：{{=it.address}}</p>
        <p>手机/电话号码：{{=it.phone}}</p>
    </div>
</script>

<div id="page_work">
	<div class="one-third">
        <div class="box">
            <div class="inner">
                <form action="<?php echo base_url('/doctor/findReg')?>" method="post" id="findreg_form">
	                <div class="titlebar"><span class="icon entypo white browser"></span> <span class="w-icon">查询病人信息</span></div>
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
	                    <input type="submit" id="findreg_btn" value="查询" />
	                    <input type="reset" value="重置" />
	                </div>
                </form>
            </div>
        </div>
        <div id="patient_reg">
            
        </div>
    </div>

    <div class="two-thirds ">
    	<div class="box">
    		<div class="inner">
    			<div class="titlebar"><h4>医生工作台</h4></div>
    			<div class="one-half quick-post">
	                <div id="wysihtml5-toolbar" class="wysihtml5-toolbar">
	                	<p>病人自述</p>
	                </div>
	                <div class="wysihtml5-contents">
	                	<textarea id="patient_textarea" name="patient_talk"></textarea>
	                </div>

	                <div class="clear"></div>
	                <div id="wysihtml5-toolbar" class="wysihtml5-toolbar">
	                	<p>医生诊断</p>
	                </div>
	                <div class="wysihtml5-contents">
	                	<textarea id="doctor_textarea" name="doctor_talk"></textarea>
	                </div>                 
				</div>


				<div class="one-half quick-post">
	                <div class="titlebar">
	                	<span class="icon awesome white table"></span>
	                	<span class="w-icon">开药台</span>
	                	<a href="#" class="button blue tiny fright" id="adddrug_link">添加药品</a>
	                </div> 
                    <table id="drug_table">
                        <thead>
                            <tr>
                                <th scope="col">药类型</th>
                                <th scope="col">药名</th>
                                <th scope="col">数量</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="drug_tr" id="drug_tr">
                                <td>
                                	<div class="drug_type_select_container">
	                                	<select id="drug_type_select" name="drug_type">
	                                		<option value="1">中药</option>
	                                		<option value="2">西药</option>
	                                		<option value="3">中成药</option>
	                                	</select>
                                	</div>
                                </td>
                                <td>
                                	<div id="drugZY_select_container" class="drug_div">
	                                	<select id="drugZY_select" name="drugZY">
	                                		<?php foreach ($drugsZY as $drug) { ?>
	                                			<option value="<?=$drug['id']?>"><?=$drug['name']?></option>
	                                		<?php } ?>
	                                	</select>
                                	</div>

                                	<div id="drugXY_select_container" class="drug_div" style="display:none">
	                                	<select id="drugXY_select" name="drugXY">
	                                		<?php foreach ($drugsXY as $drug) { ?>
	                                			<option value="<?=$drug['id']?>"><?=$drug['name']?></option>
	                                		<?php } ?>
	                                	</select>
	                                </div>

	                                <div id="drugZCY_select_container" class="drug_div" style="display:none">
	                                	<select id="drugZCY_select" name="drugZCY">
	                                		<?php foreach ($drugsZCY as $drug) { ?>
	                                			<option value="<?=$drug['id']?>"><?=$drug['name']?></option>
	                                		<?php } ?>
	                                	</select>
                                	</div>
                                </td>

                                <td><input type="text" class="tiny" name="sum"/></td>
                                <td class="center">
                                    <a href="javascript:void(0);" class="icon entypo cancel tipsy-trigger delete_link" title="删除"></a>
                                </td>
                            </tr>
             
                        </tbody>
                    </table>
				</div>

				<div class="clear"></div>

				<div class="bar-big">
	                <input type="submit" id="adddrug_btn" action_url="<?php echo base_url('/doctor/addDrug')?>" value="开药">
	                <input type="reset" value="重置">
	            </div>

    		</div>
    	</div>

    </div>
    
</div>
