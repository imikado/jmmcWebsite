<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Apis\ExhibitorsApi;
use MyWebsite\Apis\SellerApi;
use MyWebsite\Components\Shared\SellerCardListComponent;

class ExhibitorsListComponent extends ComponentAbstract implements ComponentInterface
{

    const STATUS_PUBLISHED = 'published';

    public function render(): string
    {

        $eventApi = new ExhibitorsApi();

        $props = (object)[
            'contentList' => $eventApi->getCurrentList(),
            'title' => 'Les Exposants'

        ];

        $component = new SellerCardListComponent($props);
        return $component->render();
    }
}
