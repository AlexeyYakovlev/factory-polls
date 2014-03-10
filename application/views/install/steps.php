<ul class="nav nav-pills nav-justified steps">
    <?php foreach ($g_menuitems as $menuitem): ?>
        <li>
            <a href="<?php echo $menuitem['href']; ?>" class="step <?php echo $menuitem['aclass']; ?>">
                <span class="number"><?php echo $menuitem['step']; ?></span>
                <span class="desc"><i class="fa fa-check"></i> <?php echo $menuitem['text']; ?></span>   
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<div id="bar" class="progress progress-striped" role="progressbar">
    <div class="progress-bar progress-bar-success" style="width: <?php echo $g_menuitems[Request::current()->action()]['progress']; ?>%"></div>
</div>