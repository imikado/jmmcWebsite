<?php

namespace MyWebsite\Pages;

use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;
use MyWebsite\Components\ContactComponent;
use MyWebsite\Components\NavComponent;
use MyWebsite\Components\Shared\ContentComponent;

class ContentPage extends PageAbstract implements PageInterface
{

    const CONTACT_PAGE = 'contact.html';

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

        $props->content = str_replace('_vignette_', '<iframe id="haWidget" allowtransparency="true" scrolling="auto" src="https://www.helloasso.com/associations/j-aime-mon-marche-de-coeuilly/adhesions/adhesion/widget" style="width: 100%; height: 950px; border: none;"></iframe>', $props->content);

        $contentList = [
            new ContentComponent($props)
        ];

        if ($this->getFilename() == self::CONTACT_PAGE) {
            $contentList[] = new ContactComponent();
        }

        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->getFilename()),
                'contentList' => $contentList
            ]
        );
    }
}
