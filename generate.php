<?php
$demo = $css = $css_shadow = array();
$patern_css = '.icon-f-%s {background: url("../img/%s/%s")}';
$patern_demo = "\t\t\t<li><i class=\"icon-f-%s\"></i> <small><span>icon-f-</span>%s</small></li>";

$handle = opendir('./img/i');
while(false !== ($entry = readdir($handle)))
{
	if(in_array($entry, array('.', '..'))) continue;

	$class = str_replace('.png', '', $entry);

	$css[] = sprintf($patern_css, $class, 'i', $entry);
	$css_shadow[] = sprintf($patern_css, $class, 's', $entry);
	$demo[] = sprintf($patern_demo, $class, $class);
}

file_put_contents('./css/bootstrap-fugue.css', file_get_contents('css/_core.css').implode("\n", $css));
file_put_contents('./css/bootstrap-fugue-shadow.css', file_get_contents('css/_core.css').implode("\n", $css_shadow));

$index = file_get_contents('index.html');
$index = preg_replace('/<ul class="unstyled">.*<\/ul>/isU', "<ul class=\"unstyled\">\n".implode("\n", $demo)."</ul>\n", $index);
file_put_contents('index.html', $index);

closedir($handle);
