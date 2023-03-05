<?php

namespace MyWebsite\Components\Shared;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;

class ContentComponent extends ComponentAbstract implements ComponentInterface
{

    protected $props;

    public function __construct(object $props)
    {
        $this->props = $props;
    }

    public function render(): string
    {

        return $this->renderViewWithParamList(
            __DIR__ . '/Views/content.php',
            [
                'title' => $this->props->title,
                'content' => $this->props->content,

            ]
        );
    }
}
