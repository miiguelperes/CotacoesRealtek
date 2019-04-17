<?php 
class Cms5caf798057632562546659_586d15e120da5258a85a817ac3fd78fdClass extends Cms\Classes\PageCode
{
public function onStart()
{
    $this['token'] = \Session::token();
}
}
