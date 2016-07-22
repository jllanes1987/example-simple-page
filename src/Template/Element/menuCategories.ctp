<div class="head-top">
    <div class="col-sm-8 col-md-offset-2 menu-categories">
        <nav class="navbar nav_bottom" role="navigation">
            <div class="navbar-header nav_2">
                <button class="navbar-toggle navbar-toggle1 collapsed" data-target="#bs-megadropdown-tabs" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="bs-megadropdown-tabs" class="navbar-collapse collapse" style="height: 1px;">
                <ul class="nav navbar-nav items-categories">
                    <?php
                    $selected = 'selected';
                    foreach ($categories as $currentCategory)
                    {?>
                        <li><a class="<?= $selected?>" href="#" id="<?php echo $currentCategory->id;?>"><?php echo $currentCategory->name;?></a></li>
                    <?php $selected = '';}
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</div>