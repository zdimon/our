<?php
require_once(dirname(__FILE__).'/../lib/vendor/config.php');

$this->dispatcher->connect('debug.web.load_panels', array('sfWebDebugPanelZCache', 'listenToAddPanelEvent'));