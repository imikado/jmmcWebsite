<?php

namespace MyWebsite\Pages;

use Dupot\StaticGenerationFramework\Page\PageAbstract;
use Dupot\StaticGenerationFramework\Page\PageInterface;
use MyWebsite\Components\ExhibitorsListComponent;
use MyWebsite\Components\NavComponent;

class ExhibitorsPage extends PageAbstract implements PageInterface
{
    const FILENAME = 'exposants.html';

    public function getFilename(): string
    {
        return self::FILENAME;
    }

    public function render(): string
    {



        return $this->renderLayoutWithParamList(
            __DIR__ . '/layout/default.php',
            [
                'nav' => new NavComponent($this->getFilename()),
                'contentList' => [
                    new ExhibitorsListComponent()

                ]
            ]
        );
    }
}
