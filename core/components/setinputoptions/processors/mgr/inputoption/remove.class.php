<?php
/**
 * Remove an inputoption.
 * 
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsInputOptionsRemoveProcessor extends modObjectUpdateProcessor {
    public $classKey = 'SetInputOptionsInputOption';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.inputoption';

    public function beforeSet()
    {
        $this->setProperty('softDelete', true);
        return parent::beforeSet();
    }

}
return 'SetInputOptionsInputOptionsRemoveProcessor';
