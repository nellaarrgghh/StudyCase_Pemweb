<?php
// index.php - Coffee Menu and Ordering Dashboard
include 'auth.php';
include 'config.php';

if (isset($_GET['guest'])) {
    $_SESSION['is_guest'] = true;
}

if (!isset($_SESSION['user_id']) && empty($_SESSION['is_guest'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'] ?? null;
$role    = $_SESSION['role'] ?? 'guest';

if (!isset($_SESSION['ordered_products'])) {
    $_SESSION['ordered_products'] = [];
}

if (isset($_GET['order_id']) && !is_admin()) {
    $product_id = intval($_GET['order_id']);
    
    if (!in_array($product_id, $_SESSION['ordered_products'])) {
        $_SESSION['ordered_products'][] = $product_id;
    }

    header("Location: index.php");
    exit();
}

$query = "SELECT s.id, s.name, s.price, s.url_image FROM product s";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Coffee Menu</h4>
                <?php if (is_admin()): ?>
                    <a href="create.php" class="btn btn-success btn-sm">+ Add Product</a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): 
                                $prod_id = $row['id'];
                                $is_ordered = in_array($prod_id, $_SESSION['ordered_products']);
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= htmlspecialchars($row['url_image']) ?>" width="100" class="img-fluid" alt="coffee image"></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td>
                                <?php 
                                // 10% discount applies if member is logged in
                                // If no member then regular price
                                $is_member_customer = isset($_SESSION['user_id']) && (
                                    in_array(strtolower($_SESSION['role'] ?? ''), ['member', 'customer']) || !is_admin()
                                );
                                if ($is_member_customer){ ?>
                                    <strike><?= (int)$row['price'] ?></strike><br/>
                                    <?= (int)($row['price']*0.9) ?>
                                <?php } else{ ?>
                                    <?= (int)$row['price'] ?>
                                <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if (is_admin()): ?>
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                    <?php else: ?>
                                        <?php if ($is_ordered): ?>
                                            <span class="btn btn-secondary btn-sm disabled">Ordered</span>
                                        <?php else: ?>
                                            <a href="index.php?order_id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Order</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>