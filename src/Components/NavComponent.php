<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Apis\OtherPagesApi;
use MyWebsite\Pages\AgendaPage;
use MyWebsite\Pages\ContactPage;
use MyWebsite\Pages\ExhibitorsPage;
use MyWebsite\Pages\HomePage;
use MyWebsite\Pages\SellersPage;
use MyWebsite\Pages\SupportUsPage;

class NavComponent extends ComponentAbstract implements ComponentInterface
{

    protected $pageSelected;

    public function __construct($pageSelected)
    {
        $this->pageSelected = $pageSelected;
    }

    public function render(): string
    {


        $linkList = [

            (object)[
                'label' => 'Accueil',
                'link' => HomePage::FILENAME
            ],

            /*
            (object)[
                'label' => 'Association',
                'link' => AssociationPage::FILENAME
            ],*/

            (object)[
                'label' => 'Agenda',
                'link' => AgendaPage::FILENAME
            ],

            (object)[
                'label' => 'Commerçants',
                'link' => SellersPage::FILENAME
            ],

            (object)[
                'label' => 'Exposants',
                'link' => ExhibitorsPage::FILENAME
            ]

        ];

        $otherPageApi = new OtherPagesApi();
        $otherPageList = $otherPageApi->getCurrentList();
        foreach ($otherPageList as $otherPageLoop) {
            $linkList[] = (object)[
                'label' => $otherPageLoop->title,
                'link' => $otherPageLoop->filename
            ];
        }


        return $this->renderViewWithParamList(
            __DIR__ . '/Nav/nav.php',
            [
                'linkList' => $linkList,
                'pageSelected' => $this->pageSelected
            ]
        );
    }
}
