<?php
    include('../../../../conexion.php');

    // Inicializamos variables
    $name_product = '';
    $results = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name-product'])) {
        // Escapamos los caracteres especiales para prevenir inyección SQL
        $name_product = mysqli_real_escape_string($conexion, $_POST['name-product']);

        // Consulta para buscar productos que coincidan con la palabra clave
        $query = "SELECT product_name, sale_price, stock_quantity, unit_measure FROM inventory_products WHERE product_name LIKE '%$name_product%'";
        $result = mysqli_query($conexion, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Guardamos los resultados en un arreglo
            $results = []; // Aseguramos que esté inicializado como un arreglo vacío
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = [
                    'product_name' => $row['product_name'],
                    'sale_price' => $row['sale_price'],
                    'stock_quantity' => $row['stock_quantity'],
                    'unit_measure' => $row['unit_measure']
                ];
            }
        }
    }
?>

<!-- Mostramos los resultados -->
<?php if (!empty($name_product)): ?>
    <?php if (!empty($results)): ?>
        <?php foreach ($results as $product): ?>
            <div class="card-product">
                <div class="unit-info">
                    <p class="unit"><?php echo htmlspecialchars($product['unit_measure']); ?></p>
                    <div class="info-product">
                        <h3 class="product"><?php echo ucfirst(htmlspecialchars($product['product_name'])); ?></h3>
                        <div class="price-available">
                            <p>$ <?php echo number_format($product['sale_price'], 0); ?></p>
                            <p><?php echo htmlspecialchars($product['stock_quantity']); ?> disponibles</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="not-product">No se encontraron productos con esa palabra clave.</p>
    <?php endif; ?>
<?php endif; ?>
