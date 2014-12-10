<?php
/**
 * Get list Items
 *
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsInputOptionGetListProcessor extends modObjectGetListProcessor
{
    public $classKey = 'SetInputOptionsInputOption';
    public $languageTopics = array('setinputoptions:default');
    public $defaultSortField = 'position';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'setinputoptions.inputoption';

    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $query = $this->getProperty('query');
        $groupID = $this->getProperty('id');
        $whereArray = array(
                'group' => $groupID,
                'softDelete' => 0,
            );

        if (!empty($query)) {
            $whereArray['name:LIKE'] = '%'.$query.'%';
        }
        $c->where($whereArray);
        return $c;
    }
}
return 'SetInputOptionsInputOptionGetListProcessor';
