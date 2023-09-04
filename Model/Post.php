<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Model;

use Magento\Framework\Model\AbstractModel;
use MykolaAkimov\SimpleBlog\Model\ResourceModel\Post as PostRsource;

class Post extends AbstractModel
{
    protected function _cunstruct()
    {
        $this->_init(PostRsource::class);
    }
}