
<div class="view-title">
    <h3 class="text-center">Shopping Cart Items</h3>
    <label class="line"></label>
    <?php echo $this->element("paypalForm");?>

</div>

<div class="shopping-cart-list">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-sm-8"><h5>Product</h5></div>
            <div class="col-sm-1"><h5>Price/U</h5></div>
            <div class="col-sm-1"><h5>Price/T</h5></div>
            <div class="col-sm-1"><h5>Count</h5></div>
            <div class="col-sm-1"><h5>Actions</h5></div>
        </div>
    </div>
    <?php
    if(!empty($products))
    {
        foreach ($products as $product)
        {
            ?>
            <div id="<?php echo $product['product']->id;?>" class="panel panel-default">
                <div class="panel-body">
                    <div class="disable-item hidden"></div>
                    <div class="col-sm-8">
                        <div class="col-sm-2">
                            <?php echo $this->Html->image('products/'.$product['product']->image, array('class' => 'img-responsive'));?>
                        </div>
                        <div class="col-sm-10">
                            <div class="col-sm-12"><?php echo $product['product']->name;?></div>
                            <div class="col-sm-12"><?php echo $product['product']->description;?></div>
                            <div class="col-sm-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 text-center"><?php echo $product['product']->price;?></div>
                    <div class="col-sm-1 text-center total-price"><?php echo $product['product']->price * $product['count'];?></div>
                    <div class="col-sm-1 text-center">
                        <select class="form-control">
                            <option <?php echo ($product['count'] == 1)? 'selected' : '';?>>1</option>
                            <option <?php echo ($product['count'] == 2)? 'selected' : '';?>>2</option>
                            <option <?php echo ($product['count'] == 3)? 'selected' : '';?>>3</option>
                            <option <?php echo ($product['count'] == 4)? 'selected' : '';?>>4</option>
                            <option <?php echo ($product['count'] == 5)? 'selected' : '';?>>5</option>
                        </select>
                    </div>
                    <div class="col-sm-1 text-center"><a id="<?php echo $product['product']->id;?>" class="delete-product"><i class="glyphicon glyphicon-trash"></a></i></div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>