<?php
/**
 * Get list Items
 *
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsGroupGetListProcessor extends modObjectGetListProcessor
{
    public $classKey = 'SetInputOptionsGroup';
    public $languageTopics = array('setinputoptions:default');
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'setinputoptions.group';

    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $query = $this->getProperty('query');
        $whereArray = array(
                'softDelete' => 0,
            );
        if (!empty($query)) {
            $whereArray['name:LIKE'] = '%'.$query.'%';
        }
        $c->where($whereArray);
        return $c;
    }
}
return 'SetInputOptionsGroupGetListProcessor';
