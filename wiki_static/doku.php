<?
//Page par défault
if (!isset($_GET['id'])){
	include ("doku.php.htm");
}
else if ($_GET['id'] ==  'dormant'){
	include("doku.php_dormant.htm");
}
// http://devsnotebook.free.fr/wiki/doku.php?do=index&id=redmine
else if ($_GET['id'] ==  'redmine' && $_GET['id'] == 'index'){
	include("doku.php_doIndex_idRedmine.htm");
}
//http://devsnotebook.free.fr/wiki/doku.php?id=agiletool
else if ($_GET['id'] ==  'agiletool'){
	include("doku.php_agiletool.htm");
}
//http://devsnotebook.free.fr/wiki/doku.php?id=icescrum_icescrum
else if ($_GET['id'] ==  'icescrum_icescrum'){
	include("doku.php_icescrum.htm");
}
// les urls référencées ici ont été mises en static : http://devsnotebook.free.fr/index.php?post/Tools-used-for-agile-projects-:-the-survey-results-!
else {
	include("doku.php_".$_GET['id'].".htm");	
}
?>