<?php

namespace Dlaweb\AjaxContact\Controller\Magento\Contact\Index;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;

class Post extends \Magento\Contact\Controller\Index\Post
{
    
    private $dataPersistor;
    protected $inlineTranslation;
    
    public function execute()
    {
        
        $post = $this->getRequest()->getPostValue();
        
        if (!$post) {
            $this->_redirect('*/*/');
            return;
        }
        
       // $this->inlineTranslation->suspend();
        try {
            $postObject = new \Magento\Framework\DataObject();
            $postObject->setData($post);
             
            $error = false;
             
            if (!\Zend_Validate::is(trim($post['name']), 'NotEmpty')) {
                $error = true;
            }
            if (!\Zend_Validate::is(trim($post['comment']), 'NotEmpty')) {
                $error = true;
            }
            if (!\Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                $error = true;
            }
            if (\Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                $error = true;
            }
            if ($error) {
                throw new \Exception();
            }
             
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            $transport = $this->_transportBuilder
            ->setTemplateIdentifier($this->scopeConfig->getValue(self::XML_PATH_EMAIL_TEMPLATE, $storeScope))
            ->setTemplateOptions(
                    [
                            'area' => \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE,
                            'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                    ]
                    )
                    ->setTemplateVars(['data' => $postObject])
                    ->setFrom($this->scopeConfig->getValue(self::XML_PATH_EMAIL_SENDER, $storeScope))
                    ->addTo($this->scopeConfig->getValue(self::XML_PATH_EMAIL_RECIPIENT, $storeScope))
                    ->setReplyTo($post['email'])
                    ->getTransport();
                     
                    $transport->sendMessage();
                    //$this->inlineTranslation->resume();
                     
                    $message = __('Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.');
                             
                    $this->getDataPersistor()->clear('contact_us');
                    echo $message;
                    //$this->_redirect('contact/index');
                    return;
        } catch (\Exception $e) {
            //$this->inlineTranslation->resume();
            $message = 
                    __('We can\'t process your request right now. Sorry, that\'s all we know.');
                     
            $this->getDataPersistor()->set('contact_us', $post);
            //$this->_redirect('contact/index');
            echo $message;
            return;
        }
    }
     
    private function getDataPersistor()
    {
        if ($this->dataPersistor === null) {
            $this->dataPersistor = ObjectManager::getInstance()
            ->get(DataPersistorInterface::class);
        }
         
        return $this->dataPersistor;
    }
}