<?php
/**
 * Update an Item
 * 
 * @package setinputoptions
 * @subpackage processors
 */

class SetInputOptionsGroupUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'SetInputOptionsGroup';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.item';

    public function beforeSet() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('setinputoptions.err.item_name_ns'));

        } else if ($this->modx->getCount($this->classKey, array('name' => $name)) && ($this->object->name != $name)) {
            $this->addFieldError('name',$this->modx->lexicon('setinputoptions.err.item_name_ae'));
        }
        return parent::beforeSet();
    }

}
return 'SetInputOptionsGroupUpdateProcessor';