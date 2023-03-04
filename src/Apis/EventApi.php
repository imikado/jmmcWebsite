<?php

namespace MyWebsite\Apis;

use DateTime;

class EventApi
{
    const STATUS_PUBLISHED = 'published';


    public function getCurrentEventList(DateTime $currentDateTime)
    {
        $dateFormatToCompare = 'Ymd';

        $dataApi = new DataApi('/Db/Events');

        $allEventList = $dataApi->findAll();
        $currentEventList = [];
        foreach ($allEventList as $eventLoop) {
            if ($eventLoop->status != self::STATUS_PUBLISHED) continue;

            $eventLoopDateTime = new DateTime($eventLoop->publication_date);
            if ($eventLoopDateTime->format($dateFormatToCompare) < $currentDateTime->format($dateFormatToCompare)) {
                continue;
            }

            $currentEventList[$eventLoop->publication_date] = $eventLoop;
        }

        krsort($currentEventList, SORT_STRING);

        return $currentEventList;
    }
}
