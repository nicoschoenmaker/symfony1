<?php
// auto-generated by sfRoutingConfigHandler
// date: 2009/07/09 17:06:12
$this->connect('homepage', '/', array (
  'module' => 'default',
  'action' => 'index',
), array());
$this->connect('default_symfony', '/symfony/:action/*', array (
  'module' => 'default',
), array());
$this->connect('default_index', '/:module', array (
  'action' => 'index',
), array());
$this->connect('default', '/:module/:action/*', array(), array());
