<div id="page_departs">
    <script id="departlist_tr_tmpl" type="text/template">
        <tr>
            <td>{{=it.id}}</td>
            <td>{{=it.depart_name}}</td>
            
            <td class="center">
                <a href="<?php echo base_url('admin/deleteDepart')?>" class="icon entypo cancel tipsy-trigger delete_link" data="{{=it.id}}" title="删除"></a>
            </td>
        </tr>
    </script>

    <div class="one-half">
        <div class="box">
            <div class="inner">
                <form action="<?php echo base_url('/admin/addDepart')?>" method="post" id="adddepart_form">
                <div class="titlebar"><span class="icon entypo white browser"></span> <span class="w-icon">添加科室</span></div>
                <div class="contents">
                    
                    <div class="row">
                        <label>科室</label>
                        <div class="field-box">
                            <input type="text" class="medium" name="depart_name" placeholder="请输入科室名">
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                </div>
                <div class="bar-big">
                    <input type="submit" id="adddepart_btn" value="添加科室">
                    <input type="reset" value="重置">
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="one-half">
        <div class="box no-bg">
        	<h2>用户管理</h2>
        	<table id="departlist_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">科室名</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($departs as $depart) { ?>
                        <tr>
                            <td><?= $depart['id']?></td>
                            <td><?= $depart['depart_name']?></td>
                            
                            <td class="center">
                            <!--     <a href="#" class="icon awesome heart tipsy-trigger" title="Set is as interesting"></a>
                                <a href="#" class="icon entypo star-2 tipsy-trigger" title="Set it as featured"></a> -->
                                <a href="<?php echo base_url('admin/deleteDepart')?>" class="icon entypo cancel tipsy-trigger delete_link" data="<?= $depart['id']?>" title="删除"></a>
                               <!--  <a href="#" class="icon entypo thumbs-up tipsy-trigger" title="Accept"></a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>