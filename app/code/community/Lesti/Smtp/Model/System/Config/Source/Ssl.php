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
 * Class Lesti_Smtp_Model_System_Config_Source_Ssl
 */
class Lesti_Smtp_Model_System_Config_Source_Ssl
{
    const NO = '';
    const TLS = 'tls';
    const SSL = 'ssl';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::NO, 'label' => Mage::helper('smtp')->__('no')),
            array('value' => self::TLS, 'label'=>Mage::helper('smtp')->__('tls')),
            array('value' => self::SSL, 'label'=>Mage::helper('smtp')->__('ssl'))
        );
    }
}
