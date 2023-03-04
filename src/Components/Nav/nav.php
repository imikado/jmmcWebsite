<style>
    a.brand-logo {
        background: no-repeat left url('/css/images/logoNavbar.png');
        padding-left: 60px;
    }
</style>
<nav>
    <div class="nav-wrapper" style="background-color:<?php

                                                        use MyWebsite\Conf\Colors;

                                                        echo Colors::NAVBAR_BACKGROUND ?>">

        <a href="#" class="brand-logo ">Marché de Coeuilly</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

            <?php foreach ($this->paramList['linkList'] as $linkLoop) : ?>
                <li <?php if ($this->paramList['pageSelected'] == $linkLoop->link) : ?>class="active" <?php endif ?>><a href="<?php echo $linkLoop->link ?>"><?php echo $linkLoop->label ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>