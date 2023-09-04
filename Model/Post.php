<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Model;

use Magento\Framework\Model\AbstractModel;
use MykolaAkimov\SimpleBlog\Model\ResourceModel\Post as PostResource;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(PostResource::class);
    }
}