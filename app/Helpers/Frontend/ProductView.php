<?php
namespace App\helpers\Frontend;

use \App\Models\Product;

class ProductView {

     /**
     * Price Sign BDT
     */
    public static function priceSign($price){
        return '৳'.$price;
    }

     /**
     * Product View Desoign
     */

    public static function view($query = '', $noQuery = ''){
       ob_start();
       foreach($query as $product) { 
        ?>
        <article class="single_product">
            <figure>
                <div class="product_thumb">
                    <a class="primary_img" href="<?php echo route('frontend_single_product', $product->slug);?>"><img src="<?php echo \App\Models\Media::fileLocation($product->featured_image)?>" alt=""></a>
                    <div class="label_product">
                    <?php echo !empty($product->sale_price) ? '<span class="label_sale">sale</span>' : '' ?>
                    </div>
                    <div class="action_links">
                        <ul>
                            <li class="quick_button"><a id="<?php echo $product->id;?>" class="modalQuickView" href="javascript:void()" xdata-toggle="modal" xdata-target="#modal_box" title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                        </ul>
                    </div>
                    <div class="add_to_cart">
                        <form method="POST" action="<?php echo route('frontend_cart_store');?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
                            <?php
                            if(isset($product['attribute'])){ ?>
                                <a id="<?php echo $product->id;?>" class="add_to_cart_btn modalQuickView" type="button" title="add to cart">Add to carts</a>
                            <?php }else{ ?>
                                <button class="add_to_cart_btn" type="submit" title="add to cart">Add to cart</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <figcaption class="product_content">
                    <div class="price_box">
                        <span class="old_price"><?php echo !empty($product->sale_price) ? '৳'.$product->regular_price : ''?></span>  
                        <span class="current_price"><?php echo empty($product->sale_price) ? '৳'.$product->regular_price : '৳'.$product->sale_price ;?></span>  
                    </div>
                    <h3 class="product_name"><a href="product-details.php"><?php echo $product->title;?></a></h3>
                </figcaption>
            </figure>
        </article>
        <?php
                
            } 
        ?>
        <?php
			$content = ob_get_contents();
			ob_end_clean();
			return $content;
    }


    public static function productModal(){
        ob_start();?>

        <!-- modal area start-->
       <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body product_modal_body">
                            
                    </div>    
                </div>
            </div>
        </div>

        <!-- modal area end-->
        
        

        <script>
            $('.modalQuickView').click(function(){
                let productId = $(this).attr('id');
                $.ajax({
                    type : 'GET',
                    url :  '<?php echo route('frontend_product_quick_view', '');?>/'+productId,
                    success : function(data){
                        $('.product_modal_body').html(data);
                        $('#modal_box').modal('show');  
                    }
                })
            })

              
        
            
        </script>
        

        <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}









?>