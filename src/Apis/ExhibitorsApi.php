<?php

namespace MyWebsite\Apis;

class ExhibitorsApi
{
    const STATUS_PUBLISHED = 'published';

    public function getCurrentList()
    {

        $dataApi = new DataApi('/Db/Exhibitors');

        $allExhibitorsList = $dataApi->findAll();
        $currentExhibitorsList = [];
        foreach ($allExhibitorsList as $exhibitosLoop) {
            if ($exhibitosLoop->status != self::STATUS_PUBLISHED) continue;

            $currentExhibitorsList[] = $exhibitosLoop;
        }

        return $currentExhibitorsList;
    }
}
