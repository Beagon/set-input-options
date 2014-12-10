<?php
/**
 * Create an Item
 * 
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsItemCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'SetInputOptionsItem';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.item';

    public function beforeSet(){
        $items = $this->modx->getCollection($this->classKey);

        $this->setProperty('position', count($items));

        return parent::beforeSet();
    }

    public function beforeSave() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('setinputoptions.err.item_name_ns'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name',$this->modx->lexicon('setinputoptions.err.item_name_ae'));
        }
        return parent::beforeSave();
    }
}
return 'SetInputOptionsItemCreateProcessor';
