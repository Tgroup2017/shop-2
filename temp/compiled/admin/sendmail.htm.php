﻿<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js,validator.js')); ?>
<div id="tabbody-div">
<form action="sendmail.php" name="theForm" onsubmit="return validate()" method="post">
  <table width="100%" id="general-table" align="center">
    <tr>
      <td><?php echo $this->_var['lang']['recipient']; ?></td>
      <td><input name="email" type="text" value="<?php echo $this->_var['email']; ?>" size="100" />
    </tr>
    <tr>
      <td><?php echo $this->_var['lang']['subject']; ?></td>
      <td><input name="subject" type="text" size="100" /></td>
    </tr>
    <tr>
      <td><?php echo $this->_var['lang']['content']; ?></td>
      <td>
		<input type="hidden" id="content" name="content" style="display:none" />
		<iframe src="../includes/fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="450" frameborder="0" scrolling="no"></iframe>
	  </td>
    </tr>
    <tr>
      <td></td>
      <td align="center">
        <input name="submit" type="submit" class="button" value="<?php echo $this->_var['lang']['button_send']; ?>" />
        <input type="hidden" name="act" value="send_act">
      </td>
    </tr>
  </table>
</form>
</div>
<script type="text/javascript">

document.forms['theForm'].elements['subject'].focus();

onload = function()
{
    startCheckOrder(); // 开始检查订单
}

/**
 * 检查表单输入的数据
 */
function validate()
{
    validator = new Validator("theForm");
	
    validator.isEmail("email", invalid_email, true);
	validator.required("subject", no_subject);
	validator.required("content", no_content);
	
	return validator.passed();
}
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>