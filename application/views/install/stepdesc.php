<div class="portlet-title">
    <div class="caption">
        <i class="fa fa-reorder"></i> 
        <?php echo $g_menuitems[Request::current()->action()]['text']; ?> - 
        <span class="step-title">
            шаг <?php echo $g_menuitems[Request::current()->action()]['step']; ?> из <?php echo count($g_menuitems); ?>
        </span>
    </div>
</div>