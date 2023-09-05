<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Controller\Adminhtml\Post;

use \Magento\Backend\App\Action;
use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\Page;
use \Magento\Framework\Controller\ResultFactory;

class Index extends Action implements HttpGetActionInterface
{
	
	public function execute(): Page
	{
        /** @var Page $resultPage */
		$resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
		$resultPage->setActiveMenu('MykolaAkimov_SimpleBlog::post');
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Posts'));
        
		return $resultPage;
	}


}