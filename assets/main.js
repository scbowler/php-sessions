console.log('Main JS Loaded');

// fetch('http://localhost/php/file_operations/get_all_products.php').then(resp => {
//     return resp.json();
// }).then(resp => {
//     console.log('Server Response:', resp);
// });

async function addProduct(name, cost, type = 'cupcakes') {
    const postData = new URLSearchParams();

    postData.append('name', name);
    postData.append('cost', cost);


    const config = {
        method: 'POST',
        body: postData
    }

    const resp = await fetch(`add_product.php?product-type=${type}`, config);

    const result = await resp.json();

    console.log('Add Product Result:', result);
}

async function getAllProducts(){
    const resp = await fetch('get_all_products.php');

    const products = await resp.json();

    console.log('All The Products:', products);
}

async function getProduct(productId, type = 'cupcakes'){
    
    const resp = await fetch(`get_product.php?product-type=${type}&product-id=${productId}`);

    const product = await resp.json();

    console.log('Get Product:', product);
}

getProduct('1560033072');
// getAllProducts();
// addProduct('Test Fetch', 1200);
