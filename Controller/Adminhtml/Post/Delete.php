<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;
use MykolaAkimov\SimpleBlog\Model\PostFactory;
use MykolaAkimov\SimpleBlog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Exception\LocalizedException;

class Delete extends Action implements HttpPostActionInterface
{
	/**
	 * Undocumented function
	 *
	 * @param Context $context
	 * @param PostResource $resource
	 * @param PostFactory $postFactory
	 */
	public function __construct(
		Context $context,
		private PostResource $resource,
		private PostFactory $postFactory
	){
		parent::__construct($context);
	}
	
	/**
	 * Undocumented function
	 *
	 * @return ResultInterface
	 */
	public function execute(): ResultInterface
	{
        $postId = (int) $this->getRequest()->getParam('post_id');
		$resultRedirect = $this->resultRedirectFactory->create();
		if(!$postId){
			$this->messageManager->addErrorMessage(__('We can`t find a post to delete'));
			return $resultRedirect->setPath('*/*/');
		}

		$model = $this->postFactory->create();

		try{
			$this->resource->load($model, $postId);
			$this->resource->delete($model);

			$this->messageManager->addSuccessMessage(__('The post has been deleted succefully!'));
		} catch(\Throwable $exception){
			$this->messageManager->addErrorMessage($exception->getMessage());
		}
		
		return $resultRedirect->setPath('*/*/');
	}

}