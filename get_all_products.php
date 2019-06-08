<?php
$directory = 'products/';
$output = [
    'success' => false
];

if(empty($_GET['product-type'])){
    $file_name = 'cupcakes';
} else {
    $file_name = $_GET['product-type'];
}

$full_path = $directory.$file_name.'.php';

if(file_exists($full_path)){
    $product_file = fopen($full_path, 'r');

    $file_contents = fread($product_file, filesize($full_path));

    $products = json_decode($file_contents, true);

    $output['products'] = $products;
    $output['success'] = true;
} else {
    $output['error'] = "No products of type $file_name found";
}

print json_encode($output);
