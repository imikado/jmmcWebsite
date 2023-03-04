<?php

namespace MyWebsite\Pages;

use DateTime;
use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;
use MyWebsite\Apis\DataApi;
use MyWebsite\Apis\EventApi;
use MyWebsite\Components\NavComponent;
use MyWebsite\Components\NewsListComponent;
use MyWebsite\Components\Shared\CarouselComponent;
use MyWebsite\Components\Shared\NanoCalendarComponent;

class HomePage extends PageAbstract implements PageInterface
{
    const FILENAME = 'index.html';

    public function getFilename(): string
    {
        return self::FILENAME;
    }

    public function render(): string
    {

        $carouselPath = '/images/carousel/';

        $filesList = scandir(__DIR__ . '/../../docs/images/carousel/');
        foreach ($filesList as $fileLoop) {
            if (substr($fileLoop, -4) == '.jpg') {
                $imageList[] = $carouselPath . '/' . basename($fileLoop);
            }
        }


        $carouselProps = (object)[
            'imageList' => $imageList
        ];

        $currentDateTime = new DateTime();

        $eventApi = new EventApi();
        $currentEventList = $eventApi->getCurrentEventList($currentDateTime);

        $indexedEventList = [];

        foreach ($currentEventList as $currentEventLoop) {
            $indexedEventList[$currentEventLoop->publication_date] = AgendaPage::FILENAME . '#date' . $currentEventLoop->publication_date;
        }

        $calendarProps = (object)[
            'indexedEventList' => $indexedEventList
        ];

        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->getFilename()),
                'contentList' => [
                    new CarouselComponent($carouselProps),
                    new NanoCalendarComponent($calendarProps),
                    new NewsListComponent()
                ]
            ]
        );
    }
}
