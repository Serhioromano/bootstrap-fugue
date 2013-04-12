<?php
$handle = opendir('./img/i');

$demo = $css = array();
$patern_css = '.icon-f-%s {background: url("../img/i/%s")}';
$patern_demo = "\t\t\t<li><i class=\"icon-f-%s\"></i> <small><span>icon-f-</span>%s</small></li>";

$css[] = '[class^="icon-f-"],[class*=" icon-f-"] {background-position: 0 0;	width: 16px; height: 16px;}';
while(false !== ($entry = readdir($handle)))
{
	if(in_array($entry, array('.', '..'))) continue;

	$class = str_replace('.png', '', $entry);

	$css[] = sprintf($patern_css, $class, $entry);
	$demo[] = sprintf($patern_demo, $class, $class);
}

file_put_contents('./css/bootstrap-fugue.css', implode("\n", $css));

$index = file_get_contents('index.html');
$index = preg_replace('/<ul class="unstyled">.*<\/ul>/isU', "<ul class=\"unstyled\">\n".implode("\n", $demo)."</ul>\n", $index);
file_put_contents('index.html', $index);

closedir($handle);
