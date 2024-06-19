<?php 

    require "../layout/header.php"; 
    require "../../config/config.php"; 
    
    $orders = $conn->query("SELECT orders.id AS id, orders.food_packages AS food_packages, 
    orders.user_id AS user_id, orders.delivery_spot_id AS delivery_spot_id, 
    orders.order_date AS order_date, orders.status AS status, users.username AS username 
    FROM orders JOIN users ON orders.user_id = users.id");
    $orders->execute();
    $allorders = $orders->fetchAll(PDO::FETCH_OBJ);
    
    ?>



<div class="card">
    <div class="card-body">
        <h4 class="mb-5">Orders List</h4>
        <table id="example" class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Food Package</th>
                    <th>Delivery Spot</th>
                    <th>Ordered Date</th>
                
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allorders as $order) : ?>
                    <tr>
                        <td><?php echo $order->username; ?></td>
                        <td><?php echo $order->food_packages; ?></td>
                        <td><?php echo $order->delivery_spot_id; ?></td>
                        <td><?php echo $order->order_date;?></td>
                        <td>
                            <?php if ($order->status == 0) : ?>
                                <span class="text-warning">Pending</span>
                            <?php endif ?>
                            <?php if ($order->status == 1) : ?>
                                <span class="text-success">Delivered</span>
                            <?php endif ?>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require "../layout/footer.php"; ?>