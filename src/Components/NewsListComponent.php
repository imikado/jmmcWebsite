<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Apis\NewsApi;
use MyWebsite\Components\Shared\PostCardListComponent;

class NewsListComponent extends ComponentAbstract implements ComponentInterface
{

    const STATUS_PUBLISHED = 'published';

    public function render(): string
    {
        $newsApi = new NewsApi();

        $publishedNewsList = $newsApi->getPublishedOrderedList();

        $props = (object)[
            'contentList' => $publishedNewsList
        ];

        $component = new PostCardListComponent($props);
        return $component->render();
    }
}
