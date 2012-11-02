<script id="reglist_tr_tmpl" type="text/template">
    <tr>
        <td>{{=it.id}}</td>
        <td><a href="<?php echo base_url('nurse/show_patient/{{=it.patient_id}}') ?>" title="显示挂号人信息" class="show_patient">{{=it.id_card}}</a></td>
        
        {{ if (it.flag == 1) { }}
            <td class="center"><span class="highlight green">专家</span></td>
        {{ } else if (it.flag == 3) { }}
            <td class="center"><span class="highlight red">医生</span></td>
        {{ } }}

        <td>{{=it.depart_name}}</td>
        
        <td>
        {{ if (it.user_id != 0 ) { }}
            {{=it.expert_name}}
        {{ } }}
        </td>
        
        <td class="center">
            <a href="<?php echo base_url('nurse/deleteReg')?>" class="icon entypo cancel tipsy-trigger delete_link" data="{{=it.id}}" title="删除"></a>
        </td>
    </tr>
</script>

<script id="patient_tmpl" type="text/template">
    <p><span>身份证：</span>{{=it.id_card}}</p>
    <p><span>姓名：</span>{{=it.name}}</p>
    <p><span>性别：</span>{{=it.gender}}</p>
    <p><span>年龄：</span>{{=it.age}}</p>
    <p><span>地址：</span>{{=it.address}}</p>
    <p><span>手机/电话号码：</span>{{=it.phone}}</p>
</script>

<div id="page_reg">
	    <div class="one-half">
        <div class="box">
            <div class="inner">
                <form action="<?php echo base_url('/nurse/addReg')?>" method="post" id="addreg_form">
                <div class="titlebar"><span class="icon entypo white browser"></span> <span class="w-icon">挂号表单</span></div>
                <div class="contents">
                    
                    <div class="row">
                        <label>身份证</label>
                        <div class="field-box">
	                        <span class="icon entypo user for-input"></span>
	                        <input type="text" class="w-icon medium mask" name="id_card" data-mask="99999999999999999*" data-url="<?php echo base_url('nurse/show_patient/') ?>">
	                    </div>
                        
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>姓名</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="name" placeholder="请输入姓名">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>性别</label>
                        <div class="field-box" id="gender_select_container">
                            <select name="gender">
                                <option value="0">女</option>
                                <option value="1">男</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>年龄</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="age" placeholder="请输入年龄">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>地址</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="address" placeholder="请输入地址">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row">
                        <label>手机/电话号码</label>
                        <div class="field-box">
                        	<span class="icon entypo mobile for-input"></span>
                        	<input type="text" class="w-icon medium" name="phone">
                        </div>
                        <div class="clear"></div>
                    </div>
                    

                    <div class="row" >
                        <label>选择挂号类型</label> 
                        <div class="field-box" id="flag_select_container">
                            <select name="flag">
                                <option value="1">专家</option>
                                <option value="3">医生</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row" >
                        <label>选择科室</label> 
                        <div class="field-box" id="depart_select_container">
                            <select name="depart_id" id="depart_select" disabled="disabled">
                                <option value="0" selected="selected">医生用户请选择</option>
                                <?php foreach ($departs as $depart) { ?>
                                    <option value="<?= $depart['id'] ?>"><?= $depart['depart_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row" >
                        <label>选择专家</label> 
                        <div class="field-box" id="expert_select_container">
                            <select name="expert_id" id="expert_select">
                                <option value="0" selected="selected">专家用户请选择</option>
                                <?php foreach ($experts as $expert) { ?>
                                    <option value="<?= $expert['id'] ?>"><?= $expert['real_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                </div>
                <div class="bar-big">
                    <input type="submit" id="addreg_btn" value="挂号">
                    <input type="reset" value="重置">
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="one-half">
        <div class="box no-bg">
        	<h2>挂号列表</h2>
        	<table id="reglist_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">身份证</th>        
                        <th scope="col">挂号类型</th>
                        <th scopt="col">科室</th>
                        <th scope="col">专家</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($regs as $reg) { ?>
                        <tr>
                            <td><?=$reg['id']?></td>
                            <td>
                                <a href="<?php echo base_url('nurse/show_patient/'.$reg['patient_id']) ?>" title="显示挂号人信息" class="show_patient">
                                    <?=$reg['id_card']?>
                                </a>
                            </td>
                            
                            <?php if ($reg['flag'] == 1) { ?>
                                <td class="center"><span class="highlight green">专家</span></td>
                            <?php } else if ($reg['flag'] == 3) { ?>
                                <td class="center"><span class="highlight red">医生</span></td>
                            <?php } ?>

                            <td><?=$reg['depart_name']?></td>
                            <td>
                                <?php if ($reg['user_id'] != 0) { ?>
                                    <?=$reg['expert_name']?>
                                <?php } ?>
                            </td>
                            
                            
                            <td class="center">
                                <a href="javascript:void(0);" class="icon awesome print tipsy-trigger" title="打印"></a>
                                <a href="<?php echo base_url('nurse/deleteReg')?>" class="icon entypo cancel tipsy-trigger delete_link" data="<?=$reg['id']?>" title="删除"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>