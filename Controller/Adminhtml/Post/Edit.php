<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Controller\Adminhtml\Post;

use \Magento\Backend\App\Action;
use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\Page;
use \Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\Controller\ResultInterface;

class Edit extends Action implements HttpGetActionInterface
{
	
	public function execute(): Page
	{
        /** @var Page $resultPage */
		$pageResult = $this->createPageResult();
		$title = $pageResult->getConfig()->getTitle();
        $title->prepend(__('Posts'));
		$title->prepend(__('New Post'));

		return $pageResult;
	}

	private function createPageResult(): Page|ResultInterface
	{
		return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
	}

}