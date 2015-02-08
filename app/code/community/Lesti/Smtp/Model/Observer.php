<?php
/**
 * Lesti_Smtp (https://gordonlesti.com/projects/lestismtp/)
 *
 * PHP version 5
 *
 * @link      https://github.com/GordonLesti/Lesti_Smtp
 * @package   Lesti_Smtp
 * @author    Gordon Lesti <info@gordonlesti.com>
 * @copyright Copyright (c) 2013-2015 Gordon Lesti (http://gordonlesti.com)
 * @license   http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

/**
 * Class Lesti_Smtp_Model_Observer
 */
class Lesti_Smtp_Model_Observer
{

    public function controllerFrontInitBefore($observer)
    {
        if(Mage::getStoreConfig(Lesti_Smtp_Helper_Data::XML_PATH_LESTI_SMTP_ENABLE)) {
            Mage::helper('smtp')->setSmtpAsDefaultTransport();
        }
    }

}
