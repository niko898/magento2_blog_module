<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Model\Post;

use MykolaAkimov\SimpleBlog\Model\Post;
use MykolaAkimov\SimpleBlog\Model\PostFactory;
use MykolaAkimov\SimpleBlog\Model\ResourceModel\Post as PostResource;
use MykolaAkimov\SimpleBlog\Model\ResourceModel\Post\CollectionFactory;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;
use Magento\Framework\App\RequestInterface;

class DataProvider extends ModifierPoolDataProvider
{
    /**
     *
     * @var array
     */
    private array $loadedData;

    /**
     *
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param PostResource $resource
     * @param PostFactory $postFactory
     * @param RequestInterface $request
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        private PostResource $resource,
        private PostFactory $postFactory,
        private RequestInterface $request,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data,
            $pool
        );
        
        $this->collection = $collectionFactory->create();
    }

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getData(): array 
    {
        if(isset($this->loadedData)){
            return $this->loadedData;
        }

        $post = $this->getCurrentPost();
        $this->loadedData[$post->getId()] = $post->getData();

        return $this->loadedData;
    }

    /**
     * Undocumented function
     *
     * @return Post
     */
    private function getCurrentPost(): Post
    {
        $postId = $this->getPostId();
        $post = $this->postFactory->create();
        if(!$postId){
            return $post;
        }

        $this->resource->load($post, $postId);

        return $post;
    }

    /**
     * Undocumented function
     *
     * @return int
     */
    private function getPostId(): int 
    {
        return (int) $this->request->getParam($this->getRequestFieldName());
    }

}