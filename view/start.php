
<div id="promoCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/banner1.png" class="d-block w-100" alt="Promo 1">
        </div>
        <div class="carousel-item">
            <img src="/img/banner2.png" class="d-block w-100" alt="Promo 2">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<h1 class="text-center mb-4">Populaarsed Tooted</h1>
<div id="productsCarousel" class="carousel slide">
    <div class="carousel-inner">
        <?php
        $itemsPerSlide = 3;
        $totalItems = count($arr);
        $slidesCount = ceil($totalItems / $itemsPerSlide); 

        for ($i = 0; $i < $slidesCount; $i++) {
            $activeClass = $i === 0 ? 'active' : ''; 
            ?>
            <div class="carousel-item <?php echo $activeClass; ?>">
                <div class="row">
                    <?php
                    $start = $i * $itemsPerSlide;
                    $end = min($start + $itemsPerSlide, $totalItems);
                    for ($j = $start; $j < $end; $j++) {
                        $value = $arr[$j];
                        if (isset($value['picture']) && !empty($value['picture'])) {
                            $imageData = base64_encode($value['picture']);
                            $imageSrc = "data:image/jpeg;base64,{$imageData}";
                        } else {
                            $imageSrc = "/images/placeholder.jpg";
                        }
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($imageSrc); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($value['name'] ?? 'Product'); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($value['name'] ?? 'No Name'); ?></h5>
                                    <p class="card-text"><strong>Hind:</strong> <?php echo htmlspecialchars($value['price'] ?? '0'); ?> €</p>
                                    <a href="product?id=<?php echo htmlspecialchars($value['id'] ?? ''); ?>" class="btn btn-primary">Vaata lähemalt</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#productsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>