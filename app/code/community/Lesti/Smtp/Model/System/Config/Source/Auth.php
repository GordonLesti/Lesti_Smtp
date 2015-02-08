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
 * Class Lesti_Smtp_Model_System_Config_Source_Auth
 */
class Lesti_Smtp_Model_System_Config_Source_Auth
{
    const CRAMMD5 = 'crammd5';
    const LOGIN = 'login';
    const PLAIN = 'plain';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => self::CRAMMD5, 'label' => Mage::helper('smtp')->__('crammd5')),
            array('value' => self::LOGIN, 'label'=>Mage::helper('smtp')->__('login')),
            array('value' => self::PLAIN, 'label'=>Mage::helper('smtp')->__('plain'))
        );
    }
}
