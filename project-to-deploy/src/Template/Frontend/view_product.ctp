
<div class="col-sm-2"></div>
<div class="col-sm-8">
    <div class="col-sm-12 buy-product product-info">
        <div class="col-sm-12 item_add">
            <a id="<?php echo $product->id;?>"><i class="glyphicon glyphicon-shopping-cart"></i></a>
        </div>
    </div>
    <div class="col-sm-12 product-container">
        <div class="col-sm-5" id="product_img">
            <div class="product-img">
                <?php echo $this->Html->image('products/'.$product->image, array('class' => 'img-responsive'));?>
            </div>
        </div>
        <div class="col-sm-7" id="product_data">
            <div class="col-sm-12 border-simple">
                <div class="col-sm-5 product-lbl">Name</div>
                <div class="col-sm-7 product-txt"><?php echo $product->name;?></div>
            </div>
            <div class="col-sm-12 border-simple">
                <div class="col-sm-5 product-lbl">Category</div>
                <div class="col-sm-7 product-txt"><?php echo $product->category->name;?></div>
            </div>
            <div class="col-sm-12 border-simple">
                <div class="col-sm-5 product-lbl">Price</div>
                <div class="col-sm-7 product-txt"><?php echo '$'.$product->price;?></div>
            </div>
            <div class="col-sm-12 border-simple">
                <div class="col-sm-5 product-lbl">Ranks</div>
                <div class="col-sm-7 product-txt">
                    <div class="stars">
                        <div class="star_holder">
                            <span class="glyphicon glyphicon-star <?php echo ($product->ranks >= 1)? 'star-colored' : '';?>" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star <?php echo ($product->ranks >= 2)? 'star-colored' : '';?>" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star <?php echo ($product->ranks >= 3)? 'star-colored' : '';?>" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star <?php echo ($product->ranks >= 4)? 'star-colored' : '';?>" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star <?php echo ($product->ranks == 5)? 'star-colored' : '';?>" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 border-simple">
                <div class="col-sm-12 product-lbl">Description</div>
                <div class="col-sm-12" id="product_desc"><?php echo $product->description;?></div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-2"></div>



