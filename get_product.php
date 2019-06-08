<?php
$output = [
    'success' => false
];

// Verify you have the correct get data
if(empty($_GET['product-type'])){
    $output['errors'][] = 'No product type received';
} else {
    $product_type = $_GET['product-type'];
}

if(empty($_GET['product-id'])){
    $output['errors'][] = 'No product id received';
} else {
    $product_id = $_GET['product-id'];
}

if(empty($output['errors'])){
    // Build the file path
    $full_path = "products/$product_type.php";
    
    // check if file exists
    if(file_exists($full_path)){
        // if file exists read data and convert to assoc array
        $product_file = fopen($full_path, 'r');

        $products = json_decode(fread($product_file, filesize($full_path)), 1);

        // Use $product_id to find specific product
        if(!empty($products[$product_id])){
            // if product found print it
            $product = $products[$product_id];

            $output['product'] = $product;
            $output['success'] = true;
        } else {
            // if no product found print invalid product id
            $output['errors'][] = "No $product_type product found with an ID of $product_id";
        }
    } else {
        // if no file print no file found

        $output['errors'][] = "Unknown Product Type: $product_type";
    }
}

print json_encode($output);
