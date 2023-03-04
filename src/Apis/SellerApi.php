<?php

namespace MyWebsite\Apis;

class SellerApi
{
    const STATUS_PUBLISHED = 'published';

    public function getCurrentList()
    {

        $dataApi = new DataApi('/Db/Sellers');

        $allSellerList = $dataApi->findAll();
        $currentSellerList = [];
        foreach ($allSellerList as $sellerLoop) {
            if ($sellerLoop->status != self::STATUS_PUBLISHED) continue;

            $currentSellerList[] = $sellerLoop;
        }

        return $currentSellerList;
    }
}
