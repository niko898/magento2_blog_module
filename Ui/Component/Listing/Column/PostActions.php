<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Ui\Component\Listing\Column;

use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Framework\UrlInterface;

class PostActions extends Column
{
    private const URL_PATH_EDIT = 'mykolaakimov_simpleblog/post/edit';
    
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        private UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ){
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    
    public function prepareDataSource(array $dataSource): array
    {
        if(isset($dataSource['data']['items'])){
            foreach($dataSource['data']['items'] as &$item){
                if (isset($item['post_id'])){
                    $name = $this->getData('name');
                    $item[$name]['edit'] = [
                        'href' => $this->getEditUrl($item),
                        'label' => __('Edit')
                    ];
                }
            }
        }
        return $dataSource;
    }

    private function getEditUrl(array $item): string
    {
        return $this->urlBuilder->getUrl(self::URL_PATH_EDIT, ['post_id' => $item['post_id']]);
    }
}