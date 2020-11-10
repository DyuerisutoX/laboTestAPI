<?php

    ini_set('dislay_errors', 1);
    ini_set('dislay_startup_errors', 1);
    error_reporting(E_ALL);

    require __DIR__ . '/vendor/autoload.php';
    require 'config.php';

    use Automattic\WooCommerce\Client;
    use Automattic\WooCommerce\HttpClient\HttpClientException;

    $woocommerce = new Client(
        $store, 
        $client_key, 
        $secret_key,

        [
            'version' => 'wc/v3',
        ]
    );

    try {
        // Array of response results.

        // $results = json_encode($woocommerce->get('products'), true);
        $results = json_decode(json_encode($woocommerce->get('products')), true);

        // Example: ['customers' => [[ 'id' => 8, 'created_at' => '2015-05-06T17:43:51Z', 'email' => ...
        // print_r($results);


        // echo "They are......(" .count($results). ") products in the shop.<br>";

        $retour["success"] = 'true';
        $retour["message"] = "Voici les produits";
        $retour["dataCount"] = count($results);
        $retour["products"] = $results;

        // echo '<pre>' . print_r( $retour, true ) . '<pre>'; // JSON output.
        

        foreach ($retour["products"] as $products){
            // if  ($products['tags'][0]['name'] == 'Polo'){
            //     echo '<pre>' . print_r( $products, true ) . '<pre>'; // JSON output.
            // }

            echo '<pre>' . print_r( $products["tags"], true ) . '<pre>'; // JSON output.
        }



    } 
    
    catch (HttpClientException $e) {
        echo '<pre><code>' . print_r( $e->getMessage(), true ) . '</code><pre>'; // Error message.
        echo '<pre><code>' . print_r( $e->getRequest(), true ) . '</code><pre>'; // Last request data.
        echo '<pre><code>' . print_r( $e->getResponse(), true ) . '</code><pre>'; // Last response data.
    }

?>