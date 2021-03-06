<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
require('../../include/helpers/inc_environment_global.php');
require('./roots.php');
/**
* CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
* GNU General Public License
* Copyright 2002,2003,2004,2005 Elpidio Latorilla
* elpidio@care2x.org, 
*
* See the file "copy_notice.txt" for the licence notice
*/
define('MODULE','ambulatory');
define('LANG_FILE_MODULAR','ambulatory.php');
define('NO_2LEVEL_CHK',1);
require_once($root_path.'include/helpers/inc_front_chain_lang.php');

require_once($root_path.'global_conf/areas_allow.php');

$allowedarea=&$allow_area['admit'];
$append=URL_REDIRECT_APPEND; 
$fileforward='amb_clinic_patients.php'.$append.'&origin=pass&target=list&dept_nr='.$dept_nr; 
$lognote=$LDAppointments.'ok';

$thisfile=basename(__FILE__);
# Set the break (return) file
switch($_SESSION['sess_user_origin']){
	case 'amb': $breakfile=$root_path.'modules/ambulatory/ambulatory.php'.URL_APPEND; break;
	default: $breakfile=$root_path.'modules/news/start_page.php'.URL_APPEND;
}

$_SESSION['sess_parent_mod']='';

$userck='ck_pflege_user';

# reset all 2nd level lock cookies
setcookie($userck.$sid,'',0,'/');
require($root_path.'include/helpers/inc_2level_reset.php'); 
setcookie(ck_2level_sid.$sid,'',0,'/');

require($root_path.'include/helpers/inc_passcheck_internchk.php');
if ($pass=='check') include($root_path.'include/helpers/inc_passcheck.php');

$errbuf=$LDOutpatientClinic;


require($root_path.'include/helpers/inc_passcheck_head.php');
?>
<BODY  onLoad="document.passwindow.userid.focus();" 
<?php if (!$cfg['dhtml']){ echo ' link='.$cfg['idx_txtcolor'].' alink='.$cfg['body_alink'].' vlink='.$cfg['idx_txtcolor']; } ?>>

<FONT    SIZE=-1  FACE="Arial">

<P>
<?php
if($cfg['dhtml'])
{

$buf=$LDOutpatientClinic; 
if($dept) $buf.=' <nobr>:: '.$dept.'</nobr>';
echo '
<script language=javascript>
<!--
 if (window.screen.width) 
 { if((window.screen.width)>1000) document.write(\'<img '.createComIcon($root_path,'xplaster.gif','0','top').'><FONT  COLOR="'.$cfg['top_txtcolor'].'"  SIZE=6  FACE="verdana"> <b>'.$buf.'</b></font>\');}
 //-->
 </script>';
 }
 ?>
  
<table width=100% border=0 cellpadding="0" cellspacing="0"> 

<?php require($root_path.'include/helpers/inc_passcheck_mask.php') ?>  

<p>
</FONT>
</BODY>
</HTML>
