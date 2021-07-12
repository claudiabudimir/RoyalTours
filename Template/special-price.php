<?php
$in_cart =$Cart->getCartId($product->GetData('rezervare'));
?>

<link href="./style_productGallery.css" rel="stylesheet" type="text/css">

<!-- start section portfolio -->
<div id="portfolio" class="text-center paddsection">


    <div class="section-title text-center">
        <h2>Servicii disponibile pe vasul tău</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="portfolio-list">

                    <ul class="nav list-unstyled" id="portfolio-flters">
                        <li class="filter filter-active" data-filter=".all">toate</li>
                        <li class="filter" data-filter=".1">tururi</li>
                        <li class="filter" data-filter=".2">entertainment</li>
                        <li class="filter" data-filter=".3">wellness</li>
                        <li class="filter" data-filter=".4">food</li>
                    </ul>

                </div>

                <div class="portfolio-container">
                    <?php array_map(function ($item) use($in_cart){ ?>
                    <div class="col-md-4 portfolio-thumbnail all <?php echo $item['id_tipserviciu'] ?? "unknown"; ?>">
                        <a class="popup-img" href="<?php printf('%s?id_produs=%s', 'home_product.php', $item['id_produs']) ?>">
                            <img src="<?php echo $item['poza'] ?? "./assets/Banner1.png"; ?>" alt="img">
                        </a>
                        <div class="product-info">
                            <div class="text-center">
                                <div class="product-title py-2"><?php echo $item['nume'] ?? "Unknown"; ?> <span>$<?php echo $item['pret'] ?? 0 ?></span></div>
                            </div>
                        </div>
                    </div>
                    <?php }, $product_shuffle) ?>
                </div>
            </div>
            <div class="col-md-12"><hr></div>
        </div>
    </div>

</div>
<br><br><br><br>
<!-- End section portfolio -->

