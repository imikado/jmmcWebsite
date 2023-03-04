<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Apis\SellerApi;
use MyWebsite\Components\Shared\SellerCardListComponent;

class SellersListComponent extends ComponentAbstract implements ComponentInterface
{

    const STATUS_PUBLISHED = 'published';

    public function render(): string
    {

        $eventApi = new SellerApi();

        $props = (object)[
            'contentList' => $eventApi->getCurrentList(),
            'title' => 'Les Commerçants'

        ];

        $component = new SellerCardListComponent($props);
        return $component->render();
    }
}
