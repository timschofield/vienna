<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require_once('./roots.php');
require('../../include/helpers/inc_environment_global.php');
/*
CARE2X Integrated Information System Deployment 2.1 - 2004-10-02 for Hospitals and Health Care Organizations and Services
Copyright (C) 2002,2003,2004,2005  Elpidio Latorilla & Intellin.org	

GNU GPL. For details read file "copy_notice.txt".
*/
define('MODULE','phone_directory');
define('LANG_FILE_MODULAR','phone_directory.php');
define('NO_2LEVEL_CHK',1);
require_once($root_path.'include/helpers/inc_front_chain_lang.php');

require_once($root_path.'global_conf/areas_allow.php');

$allowedarea=&$allow_area['phonedir'];

$fileforward='phone_edit.php'.URL_REDIRECT_APPEND.'&edit=1';

$thisfile=basename(__FILE__);

$breakfile='phone.php'.URL_APPEND;

$lognote="$LDPhoneDir $LDNewData ok";

$userck='phonedir_user';
//reset cookie;
// reset all 2nd level lock cookies
setcookie($userck.$sid,'');
require($root_path.'include/helpers/inc_2level_reset.php'); 
setcookie('ck_2level_sid'.$sid,'');

require($root_path.'include/helpers/inc_passcheck_internchk.php');

if (isset($pass)&&($pass=='check')) include($root_path.'include/helpers/inc_passcheck.php');

$errbuf="$LDPhoneDir $LDNewData";

require($root_path.'include/helpers/inc_passcheck_head.php');
?>
<BODY  onLoad="document.passwindow.userid.focus();" 
<?php if (!$cfg['dhtml']){ echo ' link='.$cfg['idx_txtcolor'].' alink='.$cfg['body_alink'].' vlink='.$cfg['idx_txtcolor']; } ?>>

<FONT    SIZE=-1  FACE="Arial">
<P>
<img <?php echo createComIcon($root_path,'phone.gif','0') ?>>
<FONT  COLOR="<?php echo $cfg[top_txtcolor] ?>"  SIZE=6  FACE="verdana"> <b><?php echo "$LDPhoneDir $LDNewData" ?></b></font>

<table width=100% border=0 cellpadding="0" cellspacing="0"> 
<tr>
<td colspan=3>
    <ul class="tabs">
	    <li><a href="phone.php<?php echo URL_APPEND; ?>">Search</a></li>
	    <li><a href="phone_list.php<?php echo URL_APPEND; ?>">Directory</a></li>
	    <li class="active"><a href="#">New Data</a></li>
    </ul>
</td>
</tr>

<?php require($root_path.'include/helpers/inc_passcheck_mask.php') ?>  
 
<?php
if(file_exists($root_path.'language/$lang/lang_'.$lang.'_phone.php')) include($root_path."/language/$lang/lang_".$lang."_phone.php");
  else include($root_path."language/en/lang_en_phone.php");?>     

<p>
<img <?php echo createComIcon($root_path,'frage.gif','0') ?>> <a href="javascript:gethelp('phone_how2start.php','newphone','search')"><?php echo $LDHow2SearchPhone ?></a><br>
<img <?php echo createComIcon($root_path,'frage.gif','0') ?>> <a href="javascript:gethelp('phone_how2start.php','newphone','dir')"><?php echo $LDHow2OpenDir ?></a><br>
<img <?php echo createComIcon($root_path,'frage.gif','0') ?>> <a href="javascript:gethelp('phone_how2start.php','newphone','newphone')"><?php echo $LDHowEnter ?></a><br>
</BODY>
</HTML>
