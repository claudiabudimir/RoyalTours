<!--Most wanted-->
<?php
//request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['top_sale_submit'])){
        //call method addToCard
        $nr_persoane = 1;
        $cost = $_POST['cost'];
        $Cart->addToCart($_POST['user_id'], $_POST['item_id'], $nr_persoane, $cost);
    }
}
?>

<section id="top-sale">
    <div class="container py-5">
        <div class="section-title text-center">
            <h2>Rezervă instant</h2>
        </div>

        <hr>
        <!--owl carousel-->
        <div class="owl-carousel owl-theme">
            <?php
            foreach ($product_shuffle as $item) {
                ?>
                <div class="item py-2">
                    <div class="product">
                        <a href="<?php printf('%s?id_produs=%s', 'home_product.php', $item['id_produs']) ?>"><img
                                    src="<?php echo $item['poza'] ?? "./assets/Banner1.png"; ?>" alt="product1"
                                    width="250" height="200"></a>
                        <div class="text-center">
                            <h6 class="py-2"><?php echo $item['nume'] ?? "Unknown"; ?> <span>$<?php echo $item['pret'] ?? "Unknown"; ?></span></h6>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['id_produs'] ?? "1"; ?>">
                                <input type="hidden" name="cost" value="<?php echo $item['pret']  ?? "1"; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <?php
                                if(in_array($item['id_produs'],$Cart->getCartId($UserManager->GetData($user_id))??[]))
                                    {
                                    echo ' <button type="submit" disabled class="btn btn-success font-size-12">Adăugat în coș</button>';
                                    }
                                else{
                                    echo ' <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Rezervă</button>';
                                 }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</section>
<!--end Most wanted-->
