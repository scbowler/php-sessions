<?php
$directory = 'products/';
$output = [
    'success' => false
];

if(!empty($_GET['product-type'])){
    $file_name = $_GET['product-type'];
} else {
    $file_name = 'cupcakes';
}

$full_path = $directory.$file_name.'.php';

if(!empty($_POST['name'])){
    $product_name = $_POST['name'];
} else {
    $output['errors'][] = 'Can not create a new product without a name';
}

if(!empty($_POST['cost']) && is_numeric($_POST['cost'])){
    $product_cost = (int) $_POST['cost'];
} else {
    $output['errors'][] = 'No cost provided';
}

if(empty($output['errors'])){
    $product_id = time();

    if(!file_exists($directory)){
        mkdir($directory);
    }

    $products = [];

    if(file_exists($full_path)){
        $file_size = filesize($full_path);

        if($file_size) {
            $product_file = fopen($full_path, 'r');

            $file_contents = fread($product_file, $file_size);

            $products = json_decode($file_contents, true);
        }
    }

    $products[$product_id] = [
        'name' => $product_name,
        'cost' => $product_cost
    ];

    $product_file = fopen($full_path, 'w');

    fwrite($product_file, json_encode($products));

    $output['success'] = true;
    $output['message'] = "Added new $file_name product: $product_name";
}

if($output['success']){
    header('location: index.php?msg=Successfully Added Product');
} else {
    header('location: index.php?error=There was an error adding your product');
}


// print json_encode($output);
