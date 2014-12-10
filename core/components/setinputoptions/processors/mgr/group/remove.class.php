<?php
/**
 * Remove an inputoption.
 * 
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsGroupRemoveProcessor extends modObjectUpdateProcessor {
    public $classKey = 'SetInputOptionsGroup';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.group';

    public function beforeSet()
    {
        $this->setProperty('softDelete', true);
        return parent::beforeSet();
    }

}
return 'SetInputOptionsGroupRemoveProcessor';
