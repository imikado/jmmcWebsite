<?php

namespace MyWebsite\Pages;

use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;
use MyWebsite\Components\NavComponent;
use MyWebsite\Components\Shared\ContentComponent;

class ContentPage extends PageAbstract implements PageInterface
{

    protected $filename;
    protected $content;
    protected $title;

    public function loadContent($otherPage)
    {
        $this->filename = $otherPage->filename;
        $this->content = $otherPage->content;
        $this->title = $otherPage->title;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function render(): string
    {

        $props = (object)[
            'title' => $this->title,

            'content' => $this->content
        ];

        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->getFilename()),
                'contentList' => [
                    new ContentComponent($props)
                ]
            ]
        );
    }
}
