<?php if (!defined('THINK_PATH')) exit();?>
	
	<?php if(is_array($cate)): foreach($cate as $key=>$val): ?><div style="margin-top:4px;"><a target="_blank" href="<?php echo ($val['Fri_url']); ?>"><?php echo ($val['Fri_name']); ?></div></a><?php endforeach; endif; ?>