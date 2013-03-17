<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 17.03.13
 * Time: 20:32
 * To change this template use File | Settings | File Templates.
 */
class Lesti_Smtp_Model_System_Config_Source_Ssl
{

    const NO = '';
    const TLS = 'tls';
    const SSL = 'ssl';

    public function toOptionArray()
    {
        return array(
            array('value' => self::NO, 'label' => Mage::helper('smtp')->__('no')),
            array('value' => self::TLS, 'label'=>Mage::helper('smtp')->__('tls')),
            array('value' => self::SSL, 'label'=>Mage::helper('smtp')->__('ssl'))
        );
    }

}