# magento2_blog_module
This is Magento 2 Simple Blog Module!



В индекс файле для быстрого тестирования модели используем обжектменеджер и проверяем
$bootstrap = Bootstrap::create(BP, $_SERVER);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication(\Magento\Framework\App\Http::class);
//$bootstrap->run($app);


$om = $bootstrap->getObjectManager();

/** @var \MykolaAkimov\SimpleBlog\Model\ResourceModel\Post $postResource */
$postResource = $om->get(\MykolaAkimov\SimpleBlog\Model\ResourceModel\Post::class);

/** @var \MykolaAkimov\SimpleBlog\Model\Post $post */
$post = $om->create(\MykolaAkimov\SimpleBlog\Model\Post::class);


// $post->setData([
//     'title' => 'Test Post',
//     'meta_title' => 'MEta test Post',
//     'content' => '<p>Some text content</p>',
//     'meta_keywords' => 'post,blog',
//     'meta_description' => 'Post desc',
// ]);

// $postResource->save($post);

// var_dump($post->getData());

/** @var \MykolaAkimov\SimpleBlog\Model\ResourceModel\Post\Collection $collection */
$collection = $om->get(\MykolaAkimov\SimpleBlog\Model\ResourceModel\Post\Collection::class);

foreach($collection->getItems() as $item){
    var_dump($item->getData());
}