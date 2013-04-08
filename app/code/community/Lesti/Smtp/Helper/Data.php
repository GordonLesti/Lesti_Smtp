<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 17.03.13
 * Time: 20:37
 * To change this template use File | Settings | File Templates.
 */
class Lesti_Smtp_Helper_Data extends Mage_Core_Helper_Data
{
    const XML_PATH_LESTI_SMTP_ENABLE = 'system/lesti_smtp/enable';
    const XML_PATH_LESTI_SMTP_HOST = 'system/lesti_smtp/host';
    const XML_PATH_LESTI_SMTP_PORT = 'system/lesti_smtp/port';
    const XML_PATH_LESTI_SMTP_USERNAME = 'system/lesti_smtp/username';
    const XML_PATH_LESTI_SMTP_PASSWORD = 'system/lesti_smtp/password';
    const XML_PATH_LESTI_SMTP_SSL = 'system/lesti_smtp/ssl';
    const XML_PATH_LESTI_SMTP_AUTH = 'system/lesti_smtp/auth';

    public function setSmtpAsDefaultTransport()
    {
        $authDetails = array('port' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_PORT),
            'auth' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_AUTH),
            'username' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_USERNAME),
            'password' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_PASSWORD));
        if(Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_SSL) != Lesti_Smtp_Model_System_Config_Source_Ssl::NO) {
            $authDetails['ssl'] = Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_SSL);
        }
        $transport = new Zend_Mail_Transport_Smtp(Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_HOST),
            $authDetails);
        Zend_Mail::setDefaultTransport($transport);
    }

}