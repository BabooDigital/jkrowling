<?php
/**
 * Created by PhpStorm.
 * User: paulsenjs
 * Date: 10/20/17
 * Time: 4:52 PM
 */

shell_exec("/home/devbaboo/deploy.sh | tee -a /home/devbaboo/tmp/deploy-git.txt 2>/dev/null >/dev/null &");

sleep(5);

$filename = "/home/devbaboo/tmp/deploy-git.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

echo "<pre>".$contents."</pre>";