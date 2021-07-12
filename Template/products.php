<?php
//request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['products_sale_submit'])){
        //call method addToCard
        $nr_persoane = 1;
        $cost = $_POST['cost'];
        if(isset($_POST['nr_persoane']))
            {
             $nr_persoane = $_POST['nr_persoane'];
             $cost = $nr_persoane * $cost;
            }
        $Cart->addToCart($_POST['user_id'], $_POST['item_id'], $nr_persoane, $cost);
    }
}
?>
<?php
$item_id =$_GET['id_produs']??1;
foreach($product->GetData() as $item):
    if($item['id_produs'] == $item_id):
?>

<!--product-->
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4 py-5">
                <img src="<?php echo $item['poza']?? "./assets/Banner1.png"; ?>" style="width: 800px;" alt="product"
                    class="img-fluid text-center">
            </div>
            <div class="col-sm-4 py-5">
                <h5 class="font-size-20"><?php echo $item['nume']?? "Unknown"; ?></h5>
                <div class="d-flex">
                    <hr class="m-0">
                    <tr class="font-size-20">
                        <td>Preț: </td>
                        <td class="text-danger">&nbsp;$<span><?php echo $item['pret']?? "Unknown"; ?></span></td>
                    </tr>
                    <hr>
                    <!--atractii turistice-->
                </div>
                <!--buton rezervare-->
                <div class="form-row pt-3 font-size-16">
                    <div class="col-sm-8">
                        <form method="post">
                            <div class="row">
                                <div class="col-25">
                                    Număr rezervări:
                                </div>
                                <div class="col-75">
                                    <input type="text" name="nr_persoane" placeholder="1"><br>
                                </div>
                            </div>
                            <br><br>
                            <input type="hidden" name="item_id" value="<?php echo $item['id_produs'] ?? "1"; ?>">
                            <input type="hidden" name="cost" value="<?php echo $item['pret']  ?? "1"; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <?php
                                    if(in_array($item['id_produs'],$Cart->getCartId($UserManager->GetData($user_id))??[]))
                                    {
                                        echo ' <button type="submit" disabled class="btn btn-success font-size-12">Adăugat în coș</button>';
                                    }
                                    else{
                                        echo ' <button type="submit" name="products_sale_submit" class="btn btn-warning font-size-12">Rezervă</button>';
                                    }
                                    ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-8">
                <h6>Descriere</h6>
                <hr>
                <p class="font-size-14"><?php echo $item['descriere']?? "Unknown"; ?></p>
            </div>
            <div class="col-sm-2"></div>

        </div>
</section>
<!--end product-->
<?php
    endif;
endforeach;
?>