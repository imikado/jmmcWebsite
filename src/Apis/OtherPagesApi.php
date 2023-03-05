<?php

namespace MyWebsite\Apis;

class OtherPagesApi
{

    public function getCurrentList()
    {

        $dataApi = new DataApi('/Db/OtherPages');

        return  $dataApi->findAll();
    }
}
