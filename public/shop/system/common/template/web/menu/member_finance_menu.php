<?php defined('IN_IA') or exit('Access Denied');?>
              <h3>
						<i class="main_i_icon1 fa fa-users">&nbsp;</i>会员管理
					</h3>     
<ul>
	<li <?php  if($_GPC['do'] == 'member' ) { ?><?php  if(($_GPC['act'] == 'list' || empty($_GPC['act']))) { ?> class="current" <?php  } ?><?php  } ?>>
                    <a href="<?php  echo create_url('site',array('act' => 'list','do' => 'member','m' => 'eshop','isagent'=>0))?>">会员管理 </a>
                                    </li>  
                     <li <?php  if($_GPC['do'] == 'member' ) { ?><?php  if($_GPC['act'] == 'level') { ?> class="current" <?php  } ?><?php  } ?>>
                    <a href="<?php  echo create_url('site',array('act' => 'level','do' => 'member','m' => 'eshop'))?>" >会员等级 </a>
                                    </li>  
                                    
                                         <li <?php  if($_GPC['do'] == 'member' ) { ?><?php  if($_GPC['act'] == 'group') { ?> class="current" <?php  } ?><?php  } ?>>
                    <a href="<?php  echo create_url('site',array('act' => 'group','do' => 'member','m' => 'eshop'))?>">会员分组 </a>
                                    </li> 
	</ul>


	</ul>    
