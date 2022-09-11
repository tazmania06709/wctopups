<?php
require __DIR__ . '/vendor/autoload.php';
use Automattic\WooCommerce\Client;
//use GuzzleHttp\Promise\Create;

// Conexión WooCommerce API destino
// ================================
/* $url_API_woo = 'https://localhost/wordpress/';
$ck_API_woo = 'ck_d40f910432b1391d7bde1f0e60c0c95874175886';
$cs_API_woo = 'cs_8b7d316d8053758c720e4b8849a246390bcef831'; */

$woocommerce = new Client(
     /* $url_API_woo,
    $ck_API_woo,
    $cs_API_woo, */
    'https://localhost/wordpress/', 
    'ck_d40f910432b1391d7bde1f0e60c0c95874175886',
    'cs_8b7d316d8053758c720e4b8849a246390bcef831',
    [
        // 'wp_api' => true,
        'version' => 'wc/v3',
        'timeout'=> 30,
        'verify_ssl'=> false
    ]
);
// ================================


// Conexión API origen
// ===================
/*$url_API="http://localhost:3000/inventory/";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url_API);

echo "➜ Obteniendo datos origen ... \n";
$items_origin = curl_exec($ch);
curl_close($ch);

if ( ! $items_origin ) {
    exit('❗Error en API origen');
}
// ===================


// Obtenemos datos de la API de origen
$items_origin = json_decode($items_origin, true);

// formamos el parámetro de lista de SKUs a actualizar
$param_sku ='';
foreach ($items_origin as $item){
    $param_sku .= $item['sku'] . ',';
}

echo "➜ Obteniendo los ids de los productos... \n";
// Obtenemos todos los productos de la lista de SKUs
$products = $woocommerce->get('products/?sku='. $param_sku);

// Construimos la data en base a los productos recuperados
$item_data = [];
foreach($products as $product){

    // Filtramos el array de origen por sku
    $sku = $product->sku;
    $search_item = array_filter($items_origin, function($item) use($sku) {
        return $item['sku'] == $sku;
    });
    $search_item = reset($search_item);

    // Formamos el array a actualizar
    $item_data[] = [
        'id' => $product->id,
        'regular_price' => $search_item['price'],
        'stock_quantity' => $search_item['qty'],
    ];

}

// Construimos información a actualizar en lotes
$data = [
    'update' => $item_data,
];

echo "➜ Actualización en lote ... \n";
// Actualización en lotes
$result = $woocommerce->post('products/batch', $data);



if (! $result) {
    echo("❗Error al actualizar productos \n");
} else {
    print("✔ Productos actualizados correctamente \n");
} */


// ---------Insertando un productos-------------
/* $data = [
    'create' => 
          [       
            //'id' => '794',
            'name' => 'Recargas Internacionales',
            'slug' => 'recargas-internacionales',
           // 'permalink' => '',
            'date_created' => '2021-03-23T14:01:13',
            'date_created_gmt' => '2021-03-23T14:01:13',
             'date_modified' => '',
            'date_modified_gmt' => '', 
            'type' => 'double',
            'status' => 'publish',
            'featured' => false,
            'catalog_visibility' => 'visible',
            'description' => 'Gestiona las recargas de familiares o amigos del exterior y conéctalos con el mundo mediante una tarifa económica.',
            'short_description' => 'Gestiona las recargas de familiares o amigos del exterior y conéctalos con el mundo mediante una tarifa económica.',
            'sku' => '',
            'price' => '19.80',
            'regular_price' => '19.80',
            'sale_price' => '',
            'date_on_sale_from' => null,
            'date_on_sale_from_gmt' => null,
            'date_on_sale_to' => null,
            'date_on_sale_to_gmt' => null,
           // 'price_html' => '<span class=\"woocommerce-Price-amount amount\"><span class=\"woocommerce-Price-currencySymbol\">&#36;</span>21.99</span>',
            'on_sale' => false,
            'purchasable' => true,
            'total_sales'=> 0,
            'virtual' => true,
            'downloadable' => true,
            'downloads' => [
                [
                    'name' => 'RECARGA INTERNACIONAL A CUBA',
                    'file' => 'https://prime-telecomservices.com/logo-transparent.png'
                ]
            ],
            /* 'download_limit' => -1,
            'download_expiry' => -1,
            'external_url' => '',
            'button_text' => '',
            'tax_status' => 'taxable',
            'tax_class' => '',
            'manage_stock' => false,
            'stock_quantity'=> null,
            'stock_status' => 'instock',
            'backorders' => 'no',
            'backorders_allowed' => false,
            'backordered' => false,
            'sold_individually' => false, */
            /* 'weight'=> '',
            'dimensions' => [
              'length'=> '',
              'width' => '',
              'height' => ''
            ], */
            /* 'shipping_required' => true,
            'shipping_taxable' => true,
            'shipping_class'=> '',
            'shipping_class_id' => 0,
            'reviews_allowed' => true,
            'average_rating' => '0.00',
            'rating_count' => 0, */
            /* 'related_ids' => [
                53,
                40,
                56,
                479,
                99
              ], */
              /* 'upsell_ids' => [],
              'cross_sell_ids' => [],
              'parent_id' => 0,
              'purchase_note' => '', 
              'categories' => [
                [
                  'id'=> 11,
                  'name' => 'Clothing',
                  'slug'=> 'clothing'
                ],
                [
                  'id' => 13,
                  'name' => 'T-shirts',
                  'slug' => 't-shirts'
                ]
              ],
              'tags' => [],
              'images' => [
                [
                   'id' => 792,
                  'date_created' => '2017-03-23T14:01:13',
                  'date_created_gmt' => '2017-03-23T20:01:13',
                  'date_modified'=> '2017-03-23T14:01:13',
                  'date_modified_gmt' => '2017-03-23T20:01:13', 
                  'src' => 'https://prime-telecomservices.com/logo-transparent.png',
                   'name' => '',
                  'alt' => '' 
                ],
                 [
                  /* 'id' =>  793,
                  'date_created' => '2017-03-23T14:01:13',
                  'date_created_gmt' => '2017-03-23T20:01:13',
                  'date_modified'=> '2017-03-23T14:01:13',
                  'date_modified_gmt' => '2017-03-23T20:01:13', 
                  'src' => 'https://prime-telecomservices.com/logo-transparent.png',
                   'name' => '',
                  'alt' => '' 
                ]
              ],
              /* 'attributes' => [],
              'default_attributes' => [],
              'variations' => [],
              'grouped_products' => [],
              'menu_order' => 0,
              'meta_data' => [],
              '_links' => [
                'self' => [
                  [
                    'href' => 'https://example.com/wp-json/wc/v3/products/794'
                  ]
                ],
                'collection' => [
                  [
                    'href' => 'https://example.com/wp-json/wc/v3/products'
                  ]
                ]
              ] 
            ]
          ],
       /*  [
            'name' => 'New Premium Quality',
            'type' => 'simple',
            'regular_price' => '21.99',
            'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
            'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'categories' => [
                [
                    'id' => 9
                ],
                [
                    'id' => 14
                ]
            ],
            'images' => [
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg'
                ]
            ]
        ] 
    ],
     'update' => [
        [
            'id' => 799,
            'default_attributes' => [
                [
                    'id' => 6,
                    'name' => 'Color',
                    'option' => 'Green'
                ],
                [
                    'id' => 0,
                    'name' => 'Size',
                    'option' => 'M'
                ]
            ]
        ] 
    ],
    'delete' => [
        794
    ] 
];
 */
$data = [
    'create' => [
        [
            'name' => 'Recargas Internacionales',
            'slug' => 'recargas-internacionales',
            'type' => 'simple',
            'regular_price' => '19.80',
            'virtual' => true,
            'downloadable' => true,
            'downloads' => [
                [
                    'name' => 'RI Single',
                    'file' => 'https://prime-telecomservices.com/logo-transparent.png'
                ]
            ],
            'categories' => [
                [
                    'id' => 11
                ],
                [
                    'id' => 13
                ]
            ],
            'images' => [
                [
                    'src' => 'https://prime-telecomservices.com/logo-transparent.png'
                ]
            ]
        ],
        /* [
            'name' => 'CUBA',
            'type' => 'simple',
            'regular_price' => '21.99',
            'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
            'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'categories' => [
                [
                    'id' => 9
                ],
                [
                    'id' => 14
                ]
            ],
            'images' => [
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
                ],
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg'
                ]
            ]
        ] */
    ],
    /* 'update' => [
        [
            'id' => 799,
            'default_attributes' => [
                [
                    'id' => 6,
                    'name' => 'Color',
                    'option' => 'Green'
                ],
                [
                    'id' => 0,
                    'name' => 'Size',
                    'option' => 'M'
                ]
            ]
        ]
    ],
    'delete' => [
        794
    ] */
];

print_r($woocommerce->post('products/batch', $data));
print("✔ Productos actualizados correctamente \n");

?>