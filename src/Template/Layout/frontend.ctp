<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('frontend.css') ?>
    <?= $this->Html->css('toastr.min.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('toastr.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class="logo">
                <?php echo $this->Html->image('logo.png');?>
            </div>
        </div>
    </div>
    <!--Shopping Cart-->
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 pull-right header-cart">
                <?php $cart = $this->request->session()->read('cart'); ?>
                <div class="shopping-cart">
                    <?php echo $this->Html->link(
                        '$<span class="price">'.$cart['total'].'</span> <i class="glyphicon glyphicon-shopping-cart"></i><span class="badge">'.$cart['num'].'</span>',
                        '/frontend/shoppingCart',
                        ['escape' => false]
                    );?>
                </div>
            </div>
        </div>
    </div>
    <!--end Shopping Cart-->

    <!--Menu Categories-->
    <div class="container">
        <?php echo $this->element('menuCategories');?>
    </div>
    <!--end Menu Categories-->

    <!--Banner -->
    <div class="banner-top">
        <div class="container">
            <h1>Sample</h1>
            <em></em>
        </div>
    </div>
    <!--end Banner -->
</div>

<!--Products -->
<div class="content-view">
    <div class="loading hidden"></div>
    <div id="content_view" class="container">
        <?php echo $this->fetch('content') ?>
    </div>
</div>
<!--end Products -->

<!--Footer -->
<div class="footer-bottom">
    <div class="container">
        <p class="footer-class">July 21 2016, Example for Peretz Mockin by
            <a target="_blank" href="https://www.linkedin.com/in/yormary-llanes-669a3476">Jormary Llanes</a> </p>
        <div class="clearfix"> </div>
    </div>
</div>
<!--end Footer -->
<script>
    var baseUrl = "<?php echo $this->Url->build('/frontend/', true);?>"
</script>
<?= $this->Html->script('frontend.js') ?>
</body>
</html>