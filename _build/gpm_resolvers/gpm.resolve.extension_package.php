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
    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('setinputoptions.core_path');

            if (empty($modelPath)) {
                $modelPath = '[[++core_path]]components/setinputoptions/model/';
            }

            if ($modx instanceof modX) {
                $modx->addExtensionPackage('setinputoptions', $modelPath);
            }

            break;
        case xPDOTransport::ACTION_UNINSTALL:
            if ($modx instanceof modX) {
                $modx->removeExtensionPackage('setinputoptions');
            }

            break;
    }
}
return true;