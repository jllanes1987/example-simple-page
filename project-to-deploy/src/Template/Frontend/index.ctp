<div class="col-md-12">
    <div class="products-items">
        <?php
        foreach ($products as $currentProduct)
        {?>
            <div class="col-sm-3 product-item">
                <div class="product-pop">
                    <div class="product-img">
                        <?php echo $this->Html->image('products/'.$currentProduct->image, array('class' => 'img-responsive'));?>
                        <div class="zoom-icon">
                            <a rel="title" href="<?php echo $this->Url->build(array("controller" => "frontend", "action" => "viewProduct",$currentProduct->id));?>" class="picture">
                                <i class="glyphicon glyphicon-search icon "></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="col-md-12 no-padding">
                            <div class="col-md-9">
                                <div class="product-name"><?php echo $currentProduct->name;?></div>
                            </div>
                            <div class="item_add col-md-3">
                                <a id="<?php echo $currentProduct->id;?>" class="glyphicon glyphicon-shopping-cart"></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12 product-price no-padding">
                            <div class="col-md-5 item_price"><?php echo '$'.$currentProduct->price;?></div>
                            <div class="col-md-7">
                                <div class="stars">
                                    <div class="star_holder">
                                        <span class="glyphicon glyphicon-star <?php echo ($currentProduct->ranks >= 1)? 'star-colored' : '';?>" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-star <?php echo ($currentProduct->ranks >= 2)? 'star-colored' : '';?>" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-star <?php echo ($currentProduct->ranks >= 3)? 'star-colored' : '';?>" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-star <?php echo ($currentProduct->ranks >= 4)? 'star-colored' : '';?>" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-star <?php echo ($currentProduct->ranks == 5)? 'star-colored' : '';?>" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php }
        ?>

        <div class="clearfix"></div>
    </div>
</div>