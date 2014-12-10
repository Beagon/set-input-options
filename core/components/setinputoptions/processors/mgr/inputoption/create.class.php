<?php
/**
 * Create a InputOption
 * 
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsInputOptionCreateProcessor extends modObjectCreateProcessor
{
    public $classKey = 'SetInputOptionsInputOption';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.inputoption';

    public function beforeSet()
    {
        $items = $this->modx->getCollection($this->classKey, array('group' => $this->getProperty('group'), 'softDelete' => false));

        $this->setProperty('position', count($items));

        return parent::beforeSet();
    }

    public function beforeSave()
    {
        return parent::beforeSave();
    }
}
return 'SetInputOptionsInputOptionCreateProcessor';
