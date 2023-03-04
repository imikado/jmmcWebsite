<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
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
            ],

            (object)[
                'label' => 'Nous soutenir',
                'link' => SupportUsPage::FILENAME
            ],

            (object)[
                'label' => 'Contact',
                'link' => ContactPage::FILENAME
            ],


        ];

        return $this->renderViewWithParamList(
            __DIR__ . '/Nav/nav.php',
            [
                'linkList' => $linkList,
                'pageSelected' => $this->pageSelected
            ]
        );
    }
}
