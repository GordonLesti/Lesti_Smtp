<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 17.03.13
 * Time: 19:47
 * To change this template use File | Settings | File Templates.
 */
class Lesti_Smtp_Core_Model_Email_Template extends Mage_Core_Model_Email_Template
{

    const XML_PATH_LESTI_SMTP_ENABLE = 'system/lesti_smtp/enable';
    const XML_PATH_LESTI_SMTP_HOST = 'system/lesti_smtp/host';
    const XML_PATH_LESTI_SMTP_PORT = 'system/lesti_smtp/port';
    const XML_PATH_LESTI_SMTP_USERNAME = 'system/lesti_smtp/username';
    const XML_PATH_LESTI_SMTP_PASSWORD = 'system/lesti_smtp/password';
    const XML_PATH_LESTI_SMTP_SSL = 'system/lesti_smtp/ssl';
    const XML_PATH_LESTI_SMTP_AUTH = 'system/lesti_smtp/auth';

    /**
     * Send mail to recipient
     *
     * @param   array|string       $email        E-mail(s)
     * @param   array|string|null  $name         receiver name(s)
     * @param   array              $variables    template variables
     * @return  boolean
     **/
    public function send($email, $name = null, array $variables = array())
    {
        if (!$this->isValidForSend()) {
            Mage::logException(new Exception('This letter cannot be sent.')); // translation is intentionally omitted
            return false;
        }

        $emails = array_values((array)$email);
        $names = is_array($name) ? $name : (array)$name;
        $names = array_values($names);
        foreach ($emails as $key => $email) {
            if (!isset($names[$key])) {
                $names[$key] = substr($email, 0, strpos($email, '@'));
            }
        }

        $variables['email'] = reset($emails);
        $variables['name'] = reset($names);

        ini_set('SMTP', Mage::getStoreConfig('system/smtp/host'));
        ini_set('smtp_port', Mage::getStoreConfig('system/smtp/port'));

        $mail = $this->getMail();

        $setReturnPath = Mage::getStoreConfig(self::XML_PATH_SENDING_SET_RETURN_PATH);
        switch ($setReturnPath) {
            case 1:
                $returnPathEmail = $this->getSenderEmail();
                break;
            case 2:
                $returnPathEmail = Mage::getStoreConfig(self::XML_PATH_SENDING_RETURN_PATH_EMAIL);
                break;
            default:
                $returnPathEmail = null;
                break;
        }

        if(Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_ENABLE)) {
            $authDetails = array('port' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_PORT),
                'ssl' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_SSL),
                'auth' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_AUTH),
                'username' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_USERNAME),
                'password' => Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_PASSWORD));
            $transport = new Zend_Mail_Transport_Smtp(Mage::getStoreConfig(self::XML_PATH_LESTI_SMTP_HOST),
                $authDetails);
            Zend_Mail::setDefaultTransport($transport);
        } else {
            if ($returnPathEmail !== null) {
                $mailTransport = new Zend_Mail_Transport_Sendmail("-f".$returnPathEmail);
                Zend_Mail::setDefaultTransport($mailTransport);
            }
        }

        foreach ($emails as $key => $email) {
            $mail->addTo($email, '=?utf-8?B?' . base64_encode($names[$key]) . '?=');
        }

        $this->setUseAbsoluteLinks(true);
        $text = $this->getProcessedTemplate($variables, true);

        if($this->isPlain()) {
            $mail->setBodyText($text);
        } else {
            $mail->setBodyHTML($text);
        }

        $mail->setSubject('=?utf-8?B?' . base64_encode($this->getProcessedTemplateSubject($variables)) . '?=');
        $mail->setFrom($this->getSenderEmail(), $this->getSenderName());

        try {
            $mail->send();
            $this->_mail = null;
        }
        catch (Exception $e) {
            $this->_mail = null;
            Mage::logException($e);
            return false;
        }

        return true;
    }

}