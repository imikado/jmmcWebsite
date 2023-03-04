<?php

use MyWebsite\Pages\AgendaPage;
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

foreach ($pagesList as $pageLoop) {
    print("Generate " . $pageLoop->getFilename() . "\n");
    // $pageLoop->generateTo(__DIR__ . '/../docs/');
    $pageLoop->generateTo(__DIR__ . '/../../public/');
}
