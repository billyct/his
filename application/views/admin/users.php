<div id="page_users">
    <script id="userlist_tr_tmpl" type="text/template">
        <tr>
            <td>{{=it.id}}</td>
            <td>{{=it.username}}</td>
            <td>{{=it.real_name}}</td>
            <td>{{=it.depart_name}}</td>
            {{ if (it.flag == 1) { }}
                <td class="center"><span class="highlight green">专家</span></td>
            {{ } else if (it.flag == 2) { }}
                <td class="center"><span class="highlight yellow">护士</span></td>
            {{ } else if (it.flag == 3) { }}
                <td class="center"><span class="highlight red">医生</span></td>
            {{ } }}
            
            <td class="center">
                <a href="<?php echo base_url('admin/deleteUser')?>" class="icon entypo cancel tipsy-trigger delete_link" data="{{=it.id}}" title="删除"></a>
            </td>
        </tr>
    </script>


    <div class="one-half">
        <div class="box">
            <div class="inner">
                <form action="<?php echo base_url('/admin/addUser')?>" method="post" id="adduser_form">
                <div class="titlebar"><span class="icon entypo white browser"></span> <span class="w-icon">用户表单</span></div>
                <div class="contents">
                    
                    <div class="row">
                        <label>用户名</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="username" placeholder="请输入用户名">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>密码</label>
                        <div class="field-box">
                            <input type="password" class="medium" name="password" placeholder="请输入密码">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <label>真实姓名</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="real_name" placeholder="请输入真实姓名">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row" >
                        <label>用户类型</label> 
                        <div class="field-box" id="flag_select_container">
                            <select name="flag">
                                <option value="1">专家</option>
                                <option value="2">护士</option>
                                <option value="3">医生</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row" >
                        <label>科室</label> 
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
                    
                </div>
                <div class="bar-big">
                    <input type="submit" id="adduser_btn" value="添加用户">
                    <input type="reset" value="重置">
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="one-half">
        <div class="box no-bg">
        	<h2>用户管理</h2>
        	<table id="userlist_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">用户名</th>        
                        <th scope="col">真实姓名</th>
                        <th scopt="col">科室</th>
                        <th scope="col">职位类别</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user['id']?></td>
                            <td><?= $user['username']?></td>
                            <td><?= $user['real_name']?></td>
                            <td><?= $user['depart_name']?></td>
                            <?php if ($user['flag'] == 1) { ?>
                                <td class="center"><span class="highlight green">专家</span></td>
                            <?php } else if ($user['flag'] == 2) { ?>
                                <td class="center"><span class="highlight yellow">护士</span></td>
                            <?php } else if ($user['flag'] == 3) { ?>
                                <td class="center"><span class="highlight red">医生</span></td>
                            <?php } ?>
                            
                            <td class="center">
                            <!--     <a href="#" class="icon awesome heart tipsy-trigger" title="Set is as interesting"></a>
                                <a href="#" class="icon entypo star-2 tipsy-trigger" title="Set it as featured"></a> -->
                                <a href="<?php echo base_url('admin/deleteUser')?>" class="icon entypo cancel tipsy-trigger delete_link" data="<?= $user['id']?>" title="删除"></a>
                               <!--  <a href="#" class="icon entypo thumbs-up tipsy-trigger" title="Accept"></a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



        
        
