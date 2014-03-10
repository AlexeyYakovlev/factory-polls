<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu">
        <li>
            <div class="sidebar-toggler hidden-phone"></div>
        </li>
        <li class="active">
            <a href="javascript:;">
                <i class="fa fa-cogs"></i>
                <span class="title">Установка</span>
                <span class="selected "></span>
            </a>
            <ul class="sub-menu">
                <?php foreach ($menuitems as $menuitem): ?>
                    <li class="<?php echo $menuitem['class']; ?>">
                        <a href="<?php echo $menuitem['href']; ?>">
                            <span class="text"><?php echo $menuitem['text']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>