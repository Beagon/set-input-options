<?php
/**
 * Create a group
 * 
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsGroupCreateProcessor extends modObjectCreateProcessor
{
    public $classKey = 'SetInputOptionsGroup';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.group';

    public function beforeSet()
    {
        $items = $this->modx->getCollection($this->classKey);

        $this->setProperty('position', count($items));

        return parent::beforeSet();
    }

    public function beforeSave()
    {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name', $this->modx->lexicon('setinputoptions.err.group_name_ns'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name', $this->modx->lexicon('setinputoptions.err.group_name_ae'));
        }
        return parent::beforeSave();
    }
}
return 'SetInputOptionsGroupCreateProcessor';
