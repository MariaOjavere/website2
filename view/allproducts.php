<?php ob_start(); ?>
<div class="container">
    <h2>Kõik tooted</h2>
    <?php if (empty($arr)): ?>
        <p>Tooteid ei leitud.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($arr as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if ($product['picture']): ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($product['picture']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <?php else: ?>
                            <img src="/img/placeholder.jpg" class="card-img-top" alt="No image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="card-text price"><strong>Hind:</strong> <?php echo htmlspecialchars($product['price']); ?> €</p>
                            <a href="product?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">Vaata lähemalt</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "layout.php"; ?>