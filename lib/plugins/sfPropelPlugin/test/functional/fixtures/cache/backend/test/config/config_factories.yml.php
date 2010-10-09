<?php
// auto-generated by sfFactoryConfigHandler
// date: 2009/07/06 19:58:57

  $class = sfConfig::get('sf_factory_logger', 'sfAggregateLogger');
  $this->factories['logger'] = new $class($this->dispatcher, array_merge(array('auto_shutdown' => false), sfConfig::get('sf_factory_logger_parameters', array (
  'level' => 'debug',
))));
  
$logger = new sfFileLogger($this->dispatcher, array_merge(array('auto_shutdown' => false), array (
  'level' => 'debug',
  'file' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/log/backend_test.log',
)));
$this->factories['logger']->addLogger($logger);


  if (sfConfig::get('sf_i18n'))
  {
    $class = sfConfig::get('sf_factory_i18n', 'sfI18N');
    $cache = new sfFileCache(array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/cache/backend/test/i18n',
  'lifetime' => 31556926,
  'prefix' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/apps/backend/i18n',
));
    $this->factories['i18n'] = new $class($this->configuration, $cache, array (
  'source' => 'XLIFF',
  'debug' => false,
  'untranslated_prefix' => '[T]',
  'untranslated_suffix' => '[/T]',
));
    sfWidgetFormSchemaFormatter::setTranslationCallable(array($this->factories['i18n'], '__'));
  }

  $class = sfConfig::get('sf_factory_routing', 'sfPatternRouting');
      $cache = new sfFileCache(array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/cache/backend/test/config/routing',
  'lifetime' => 31556926,
  'prefix' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/apps/backend/routing',
));

$this->factories['routing'] = new $class($this->dispatcher, $cache, array_merge(array('auto_shutdown' => false), sfConfig::get('sf_factory_routing_parameters', array (
  'load_configuration' => true,
  'suffix' => '.',
  'default_module' => 'default',
  'default_action' => 'index',
  'debug' => '1',
  'logging' => '1',
))));
  $class = sfConfig::get('sf_factory_controller', 'sfFrontWebController');
   $this->factories['controller'] = new $class($this);
  $class = sfConfig::get('sf_factory_request', 'sfWebRequest');
   $this->factories['request'] = new $class($this->dispatcher, array(), sfConfig::get('sf_factory_request_parameters', array (
  'formats' => 
  array (
    'txt' => 'text/plain',
    'js' => 
    array (
      0 => 'application/javascript',
      1 => 'application/x-javascript',
      2 => 'text/javascript',
    ),
    'css' => 'text/css',
    'json' => 
    array (
      0 => 'application/json',
      1 => 'application/x-json',
    ),
    'xml' => 
    array (
      0 => 'text/xml',
      1 => 'application/xml',
      2 => 'application/x-xml',
    ),
    'rdf' => 'application/rdf+xml',
    'atom' => 'application/atom+xml',
  ),
)), sfConfig::get('sf_factory_request_attributes', array()));
  $class = sfConfig::get('sf_factory_response', 'sfWebResponse');
  $this->factories['response'] = new $class($this->dispatcher, sfConfig::get('sf_factory_response_parameters', array_merge(array('http_protocol' => isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : null), array (
  'logging' => '1',
  'charset' => 'utf-8',
))));
  if ($this->factories['request'] instanceof sfWebRequest 
      && $this->factories['response'] instanceof sfWebResponse 
      && 'HEAD' == $this->factories['request']->getMethodName())
  {  
    $this->factories['response']->setHeaderOnly(true);
  }

  $class = sfConfig::get('sf_factory_storage', 'sfSessionTestStorage');
  $this->factories['storage'] = new $class(array_merge(array(
'auto_shutdown' => false, 'session_id' => $this->getRequest()->getParameter('symfony'),
), sfConfig::get('sf_factory_storage_parameters', array (
  'session_name' => 'symfony',
  'session_path' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/cache/backend/test/test/sessions',
))));
  $class = sfConfig::get('sf_factory_user', 'myUser');
  $this->factories['user'] = new $class($this->dispatcher, $this->factories['storage'], array_merge(array('auto_shutdown' => false, 'culture' => $this->factories['request']->getParameter('sf_culture')), sfConfig::get('sf_factory_user_parameters', array (
  'timeout' => 1800,
  'logging' => '1',
  'use_flash' => true,
  'default_culture' => 'en',
))));

  if (sfConfig::get('sf_cache'))
  {
    $class = sfConfig::get('sf_factory_view_cache', 'sfFileCache');
    $cache = new $class(sfConfig::get('sf_factory_view_cache_parameters', array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/cache/backend/test/template',
  'lifetime' => 86400,
  'prefix' => '/var/www/production/sfweb/www/cache/symfony-for-release/1.1.8/lib/plugins/sfPropelPlugin/test/functional/fixtures/apps/backend/template',
)));
    $this->factories['viewCacheManager'] = new sfViewCacheManager($this, $cache);
  }
  else
  {
    $this->factories['viewCacheManager'] = null;
  }

