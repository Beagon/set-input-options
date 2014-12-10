<?php
require_once dirname(__FILE__) . '/model/setinputoptions/setinputoptions.class.php';
/**
 * @package setinputoptions
 */
class IndexManagerController extends SetInputOptionsBaseManagerController {
    public static function getDefaultController() { return 'home'; }
}

abstract class SetInputOptionsBaseManagerController extends modExtraManagerController {
    /** @var SetInputOptions $setinputoptions */
    public $setinputoptions;
    public function initialize() {
        $this->setinputoptions = new SetInputOptions($this->modx);

        $this->addCss($this->setinputoptions->getOption('cssUrl').'mgr.css');
        $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/setinputoptions.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            SetInputOptions.config = '.$this->modx->toJSON($this->setinputoptions->options).';
            SetInputOptions.config.connector_url = "'.$this->setinputoptions->getOption('connectorUrl').'";
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('setinputoptions:default');
    }
    public function checkPermissions() { return true;}
}