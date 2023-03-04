<?php

namespace MyWebsite\Components;

use DateTime;
use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Apis\DataApi;
use MyWebsite\Apis\EventApi;
use MyWebsite\Components\Shared\EventCardListComponent;

class EventListComponent extends ComponentAbstract implements ComponentInterface
{

    const STATUS_PUBLISHED = 'published';

    public function render(): string
    {
        $currentDateTime = new DateTime();

        $eventApi = new EventApi();

        $props = (object)[
            'contentList' => $eventApi->getCurrentEventList($currentDateTime)
        ];

        $component = new EventCardListComponent($props);
        return $component->render();
    }
}
