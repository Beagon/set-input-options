<?php

class SetInputOptionsInputOptionDuplicateProcessor extends modProcessor
{
    public $classKey = 'SetInputOptionsInputOption';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.inputoption';

    public function process()
    {
        $inputOptionId = $this->getProperty('id');
        $inputOption = $this->modx->getObject($this->classKey, $inputOptionId);

        $positionCount = count($this->modx->getCollection($this->classKey, array('group' => $inputOption, 'softDelete' => false)));

        $newInputOption = $this->modx->newObject($this->classKey, array(
            'name' => $inputOption->name,
            'alias' => $inputOption->alias,
            'position' => $positionCount,
            'group' => $inputOption->group,
        ));

        //Save it and when that returns false we are going to throw an modx error.
        if (!$newInputOption->save()) {
            $this->modx->log(xPDO::LOG_LEVEL_ERROR, $this->modx->lexicon('setinputoptions.err.inputoption.save'));
            return false;
        }

        return array("success" => true);
    }
}

return 'SetInputOptionsInputOptionDuplicateProcessor';
