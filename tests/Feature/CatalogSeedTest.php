<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;

it('seeds the catalog idempotently', function () {
    $this->seed(DatabaseSeeder::class);
    $this->seed(DatabaseSeeder::class);

    expect(Product::count())->toBe(20)
        ->and(Category::count())->toBe(5)
        ->and(Brand::count())->toBe(5);
});

it('gives every product a category, brand and price', function () {
    $this->seed(DatabaseSeeder::class);

    Product::with(['category', 'brand'])->each(function (Product $product) {
        expect($product->category)->not->toBeNull()
            ->and($product->brand)->not->toBeNull()
            ->and($product->price)->toBeGreaterThan(0);
    });
});
