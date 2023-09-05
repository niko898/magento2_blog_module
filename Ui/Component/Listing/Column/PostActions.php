<?php
declare(strict_types=1);

namespace MykolaAkimov\SimpleBlog\Ui\Component\Listing\Column;

use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Framework\UrlInterface;
use Magento\Framework\Escaper;

class PostActions extends Column
{
    private const URL_PATH_EDIT = 'mykolaakimov_simpleblog/post/edit';
    private const URL_PATH_DELETE = 'mykolaakimov_simpleblog/post/delete';
    
    /**
     * Undocumented function
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param Escaper $escaper
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        private UrlInterface $urlBuilder,
        private Escaper $escaper,
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
                    $title = $this->escaper->escapeHtml($item['title']);
                    $item[$name]['delete'] = [
                        'href' => $this->getDeleteUrl($item),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete %1', $title),
                            'message' => __('Are you sure to delete a %1?', $title)
                        ],
                        'post' => true
                    ];
                }
            }
        }
        return $dataSource;
    }

    /**
     * Undocumented function
     *
     * @param array $item
     * @return string
     */
    private function getEditUrl(array $item): string
    {
        return $this->urlBuilder->getUrl(self::URL_PATH_EDIT, ['post_id' => $item['post_id']]);
    }
    /**
     * Undocumented function
     *
     * @param array $item
     * @return string
     */
    private function getDeleteUrl(array $item): string
    {
        return $this->urlBuilder->getUrl(self::URL_PATH_DELETE, ['post_id' => $item['post_id']]);
    }
}