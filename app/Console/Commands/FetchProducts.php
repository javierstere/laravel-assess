<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FetchProducts extends Command
{
    protected $signature = 'fetch:products';

    protected $description = 'Fetch products from DummyJSON.com API';

    public function handle()
    {
        $totalPages = 3;
        $perPage = 10;

        $client = new Client();

        for ($page = 1; $page <= $totalPages; $page++) {
            try {
                $response = $client->get("https://dummyjson.com/products?page=$page");

                $products = json_decode($response->getBody(), true);

                foreach ($products['products'] as $product) {
                    Product::updateOrCreate(['id' => $product['id']], [
                        'title' => $product['title'],
                        'description' => $product['description'],
                        'price' => $product['price'],
                        // Add any other fields you need
                    ]);
                }
            } catch (RequestException $e) {
                $this->error("Failed to fetch products from page $page of the API. Error: " . $e->getMessage());
                continue;
            }
        }

        $this->info('Products fetched successfully.');
    }
}
