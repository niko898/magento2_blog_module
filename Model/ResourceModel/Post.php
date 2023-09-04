<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    private const TABLE_NAME = 'mykolaakimov_simpleblog_post';
    private const PRIMARY_KEY = 'post_id';

    protected function _cunstruct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}