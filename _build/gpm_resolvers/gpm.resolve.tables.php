<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package setinputoptions
 * @subpackage build
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('setinputoptions.core_path', null, $modx->getOption('core_path') . 'components/setinputoptions/') . 'model/';
            $modx->addPackage('setinputoptions', $modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('SetInputOptionsGroup');
            $manager->createObjectContainer('SetInputOptionsInputOption');

            break;
    }
}

return true;