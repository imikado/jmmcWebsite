<?php

namespace MyWebsite\Apis;

class NewsApi
{
    const STATUS_PUBLISHED = 'published';

    public function getPublishedOrderedList()
    {

        $dataApi = new DataApi('/Db/News');

        $allNewsList = $dataApi->findAll();

        $publishedNewsList = [];

        foreach ($allNewsList as $newsLoop) {
            if ($newsLoop->status != self::STATUS_PUBLISHED) continue;
            $publishedNewsList[$newsLoop->publication_date . '_' . uniqid()] = $newsLoop;
        }

        krsort($publishedNewsList, SORT_STRING);


        return $publishedNewsList;
    }
}
