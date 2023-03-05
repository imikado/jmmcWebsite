<?php

use MyWebsite\Apis\OtherPagesApi;
use MyWebsite\Pages\AgendaPage;
use MyWebsite\Pages\ContentPage;
use MyWebsite\Pages\ExhibitorsPage;
use MyWebsite\Pages\HomePage;
use MyWebsite\Pages\SellersPage;

require __DIR__ . '/../vendor/autoload.php';

define('ROOT_DATA_PATH', __DIR__ . '/../../Data/');

$pagesList = [

    new HomePage(),
    //new OtherPage()
    new AgendaPage(),
    new SellersPage(),
    new ExhibitorsPage

];

$otherPageApi = new OtherPagesApi();

$otherPageList = $otherPageApi->getCurrentList();
foreach ($otherPageList as $otherPageLoop) {
    $contentPageLoop = new ContentPage();
    $contentPageLoop->loadContent($otherPageLoop);

    $pagesList[] = $contentPageLoop;
}

foreach ($pagesList as $pageLoop) {
    print("Generate " . $pageLoop->getFilename() . "\n");
    // $pageLoop->generateTo(__DIR__ . '/../docs/');
    $pageLoop->generateTo(__DIR__ . '/../../public/');
}
