--TEST--
Bug #11216 (::addEmptyDir() crashes when the directory already exists)
--SKIPIF--
<?php
/* $Id: bug11216.phpt 273126 2009-01-08 22:03:32Z tony2001 $ */
if(!extension_loaded('zip')) die('skip');
 ?>
--FILE--
<?php
$archive = new ZipArchive();
$archive->open('__test.zip', ZIPARCHIVE::CREATE);
var_dump($archive->addEmptyDir('test'));
print_r($archive);
var_dump($archive->addEmptyDir('test'));
$archive->close();
unlink('__test.zip');
?>
--EXPECTF--
bool(true)
ZipArchive Object
(
    [status] => 0
    [statusSys] => 0
    [numFiles] => 1
    [filename] => %s
    [comment] => 
)
bool(false)
