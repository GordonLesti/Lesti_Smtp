<?php
/**
 * Created by JetBrains PhpStorm.
 * User: glesti
 * Date: 03.04.13
 * Time: 13:01
 * To change this template use File | Settings | File Templates.
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