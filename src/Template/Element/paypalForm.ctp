
<?php if(!empty($products))
{?>

    <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
        <input type="hidden" value="_cart" name="cmd">
        <input type="hidden" value="1" name="upload">
        <input type="hidden" value="jormaryllanes@gmail.com" name="business">
        <input type="hidden" value="http://localhost:8080/example-simple-page/frontend" name="shopping_url">
        <input type="hidden" value="USD" name="currency_code">
        <input type="hidden" value="" name="return">
        <input type="hidden" value=" name="notify_url">
        <input type="hidden" value="2" name="rm">

        <div id="form_items">
            <?php
            $item_number = 1;
            foreach ($products as $product)
            {?>
                <div id="<?php echo $product['product']->id;?>">
                    <input type="hidden" value="<?php echo $product['product']->name;?>" name="item_number_<?php echo $item_number;?>">
                    <input type="hidden" value="<?php echo $product['product']->name;?>" name="item_name_<?php echo $item_number;?>">
                    <input type="hidden" value="<?php echo $product['product']->price;?>" name="amount_<?php echo $item_number;?>">
                    <input type="hidden" value="<?php echo $product['count'];?>" name="quantity_<?php echo $item_number;?>">
                </div>
                <?php
                $item_number++;
            } ?>
        </div>


        <div class="text-right"><button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-usd"></i>Buy Now!</button></div>
    </form>

<?php } ?>
