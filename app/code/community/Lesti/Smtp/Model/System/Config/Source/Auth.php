<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 17.03.13
 * Time: 20:41
 * To change this template use File | Settings | File Templates.
 */
class Lesti_Smtp_Model_System_Config_Source_Auth
{

    const CRAMMD5 = 'crammd5';
    const LOGIN = 'login';
    const PLAIN = 'plain';

    public function toOptionArray()
    {
        return array(
            array('value' => self::CRAMMD5, 'label' => Mage::helper('smtp')->__('crammd5')),
            array('value' => self::LOGIN, 'label'=>Mage::helper('smtp')->__('login')),
            array('value' => self::PLAIN, 'label'=>Mage::helper('smtp')->__('plain'))
        );
    }

}