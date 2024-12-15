<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura digital</title>
    <link rel="stylesheet" href="../../../../css/store/bill/invoice-template.css">

    <?php
        include('../../../../conexion.php');

        $query = "SELECT * FROM sales ORDER BY id DESC LIMIT 1";
        $result_query = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result_query);
        $sale_id = $row['id'];
    ?>

</head>
<body>
    
    <main class="main">
        <section class="bill">
            <div class="logo-bill">
                <img src="../../../../svg/vendex-dash.png" class="logo" alt="">
                <div class="bill-date">
                    <h1 class="tlt-bill">Factura</h1>

                    <div class="num-dates">
                        <?php
                            $query = "SELECT s.*, sd.invoice_number  
                                    FROM sales AS s 
                                    INNER JOIN sale_details AS sd ON s.id = sd.sale_id
                                    ORDER BY s.id DESC
                                    LIMIT 1";
                            $num_dates = mysqli_query($conexion, $query);
                            $row_num_dates = mysqli_fetch_array($num_dates);

                            echo "<div class='flex'>
                                    <p>Núm. de factura:</p>
                                    <p>" . $row_num_dates['invoice_number'] . "</p>
                                  </div>
                                
                                  <div class='flex'>
                                    <p>Fecha de la factura:</p>
                                    <p>" . $row_num_dates['sale_date'] . "</p>
                                  </div>
                                  
                                  <div class='flex'>
                                        <p>Vencimiento:</p>
                                        <p>" . $row_num_dates['sale_date'] . "</p>
                                  </div>";
                        ?>
                    </div>
                </div>            
            </div>

            <div class="personal-data">
                <div class="data">
                    <h2>De</h2>

                    <?php
                        $query_users = "SELECT name_business, user_email, phone_number FROM sales ORDER BY id DESC LIMIT 1";
                        $users = mysqli_query($conexion, $query_users);
                        $row_user = mysqli_fetch_array($users);

                        $name_business = ucwords($row_user['name_business']);
                        $email = $row_user['user_email'];
                        $phone_number = $row_user['phone_number'];

                        echo "<div id='sale_details'>
                                <p class='top'>" . $name_business . "</p>
                                <div class='contact'>
                                    <div>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                                            <path fill='#eee' d='m20 8l-8 5l-8-5V6l8 5l8-5m0-2H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2'/>
                                        </svg>
                                        <p>" . $email . "</p>
                                    </div>
                                    <div>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                                            <path fill='#eee' d='M4.05 21q-.45 0-.75-.3t-.3-.75V15.9q0-.325.225-.587t.575-.363l3.45-.7q.35-.05.713.063t.587.337L10.9 17q.95-.55 1.8-1.213t1.625-1.437q.825-.8 1.513-1.662t1.187-1.788L14.6 8.45q-.2-.2-.275-.475T14.3 7.3l.65-3.5q.05-.325.325-.562T15.9 3h4.05q.45 0 .75.3t.3.75q0 3.125-1.362 6.175t-3.863 5.55t-5.55 3.863T4.05 21'/>
                                        </svg>
                                        <p>" . $phone_number . "</p>
                                    </div>
                                </div>
                            </div>";
                    ?>

                </div>

                <div class="data">
                    <h2>Facturar a</h2>
                    <?php
                        $query_clients = "SELECT sd.client, sd.client_email, sd.client_phone
                                            FROM sales AS s
                                            INNER JOIN sale_details AS sd ON s.id = sd.sale_id
                                            WHERE s.id = $sale_id
                                            LIMIT 1";
                        $clients = mysqli_query($conexion, $query_clients);
                        $row_client = mysqli_fetch_array($clients);

                        echo "<p class='top'>" . ucwords($row_client['client']) . "</p>";
                        echo "<div class='contact'>
                                <div>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'><path fill='#eee' d='m20 8l-8 5l-8-5V6l8 5l8-5m0-2H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2'/></svg>
                                    <p>" . $row_client['client_email'] . "</p>
                                </div>

                                <div>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'><path fill='#eee' d='M4.05 21q-.45 0-.75-.3t-.3-.75V15.9q0-.325.225-.587t.575-.363l3.45-.7q.35-.05.713.063t.587.337L10.9 17q.95-.55 1.8-1.213t1.625-1.437q.825-.8 1.513-1.662t1.187-1.788L14.6 8.45q-.2-.2-.275-.475T14.3 7.3l.65-3.5q.05-.325.325-.562T15.9 3h4.05q.45 0 .75.3t.3.75q0 3.125-1.362 6.175t-3.863 5.55t-5.55 3.863T4.05 21'/></svg>
                                    <p>" . $row_client['client_phone'] . "</p>
                                </div>
                            </div>";
                    ?>
                </div>
            </div>

            <div class="products">
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                    </tr>

                    <?php
                        $query_products = "SELECT sd.product_name, sd.quantity, sd.unit_price, sd.subtotal
                                            FROM sales AS s
                                            INNER JOIN sale_details AS sd ON s.id = sd.sale_id
                                            WHERE s.id = $sale_id";
                        $products = mysqli_query($conexion, $query_products);

                        while($row = mysqli_fetch_assoc($products)){
                            echo "<tr>
                                    <td>" . ucfirst($row['product_name']) . "</td>
                                    <td>" . $row['quantity'] . "</td>
                                    <td>$ " . number_format($row['unit_price'], 0) . "</td>
                                    <td>$ " . number_format($row['subtotal'], 0) . "</td>
                                </tr>";
                        }
                    ?>
                </table>

                <div class="total">
                    <h3 class="total-pay">Total a pagar</h3>
                    <?php
                        $query_total = "SELECT total_amount FROM sales ORDER BY id DESC LIMIT 1";
                        $total = mysqli_query($conexion, $query_total);
                        $row_total = mysqli_fetch_array($total);

                        echo "<p>$ " . number_format($row_total['total_amount'], 0) . "</p>";
                    ?>
                </div>
            </div>
            
            <div class="thanks">
                <p>**Gracias por tu compra**</p>
                <p>Tu experiencia es nuestra prioridad.</p>
            </div>
        </section>
    </main>

</body>
</html>