<?php

namespace MyWebsite\Components;

use Dupot\StaticGenerationFramework\Component\ComponentAbstract;
use Dupot\StaticGenerationFramework\Component\ComponentInterface;
use MyWebsite\Components\Shared\SellerCardListComponent;

class ContactComponent extends ComponentAbstract implements ComponentInterface
{


    public function render(): string
    {

        return $this->renderViewWithParamList(
            __DIR__ . '/Views/contact.php',
            []
        );
    }
}
