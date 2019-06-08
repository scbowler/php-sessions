<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP | File Operations and Endpoints</title>
    <script src="assets/main.js"></script>
</head>
<body>
    <h1>PHP File Operations and Endpoints</h1>

    <form action="add_product.php" method="POST">
        <h3>Add New Product</h3>

        <div>
            <label>Product Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Product Cost</label>
            <input type="number" name="cost">
        </div>

        <button>Add Item</button>
        <?php if(!empty($_GET['msg'])): ?>
            <p style="color: green"><?= $_GET['msg'] ?></p>
        <?php endif; ?>
        <?php if(!empty($_GET['error'])): ?>
            <p style="color: red"><?= $_GET['error'] ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
