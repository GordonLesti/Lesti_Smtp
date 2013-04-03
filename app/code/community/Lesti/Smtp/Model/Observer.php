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
        if(Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_ENABLE)) {
            $authDetails = array('port' => Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_PORT),
                'auth' => Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_AUTH),
                'username' => Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_USERNAME),
                'password' => Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_PASSWORD));
            if(Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_SSL) != Lesti_Smtp_Model_System_Config_Source_Ssl::NO) {
                $authDetails['ssl'] = Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_SSL);
            }
            $transport = new Zend_Mail_Transport_Smtp(Mage::getStoreConfig(Lesti_Smtp_Core_Model_Email_Template::XML_PATH_LESTI_SMTP_HOST),
                $authDetails);
            Zend_Mail::setDefaultTransport($transport);
        }
    }

}