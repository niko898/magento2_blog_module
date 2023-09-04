<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MykolaAkimov\SimpleBlog\Model\ResourceModel\Post as PostRsource;
use MykolaAkimov\SimpleBlog\Model\Post;


class Collection extends AbstractCollection
{
    protected function _cunstruct()
    {
        $this->_init(Post::class, PostRecource::class);
    }
}