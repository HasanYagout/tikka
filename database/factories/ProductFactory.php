<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandIds = Brand::pluck('id')->toArray();
        $categoryId = Category::pluck('id')->toArray();
        $selectedCategoryIds = Arr::random($categoryId, 3);

        $categoryIdsWithPosition = collect($selectedCategoryIds)->map(function ($id, $index) {
            return ['id' => (string) $id, 'position' => $index + 1];
        })->toArray();
        $thumbnailLinks = [
            '2024-05-15-664527fd2606a.png',
            '2024-05-16-6645c08d0465d.png',
            '2024-05-16-6645c14cf3aba.png'

        ];
        $spiceNames = [
            'Cinnamon',
            'Turmeric',
            'Cumin',
            'Coriander',
            'Paprika',
            'Ginger',
            'Cardamom',
            'Cloves',
            'Nutmeg',
            'Fenugreek',
            'Mustard',
            'Black Pepper',
            'Chili Powder',
            'Saffron',
            'Fennel',
            'Allspice',
            'Star Anise',
            'Vanilla',
            'Bay Leaves',
            'Oregano',
        ];
        $variation = [
            [
                'type' => 'Aquamarine',
                'price' => 31231,
                'sku' => 't-Aquamarine',
                'qty' => 1,
            ]
        ];

        return [
            'added_by' => 'admin',
            'user_id' => '1',
            'name' => $this->faker->randomElement($spiceNames),
            'slug' => $this->faker->slug,
            'product_type' => 'physical',
            'category_ids' => json_encode($categoryIdsWithPosition),
            'category_id' =>  $this->faker->randomElement($categoryId),
            'sub_category_id' => $this->faker->randomElement($categoryId),
            'sub_sub_category_id' => $this->faker->randomElement($categoryId),
            'brand_id' => $this->faker->randomElement($brandIds),
            'unit' => $this->faker->word,
            'min_qty' => $this->faker->randomNumber(2),
            'refundable' => $this->faker->boolean,
            'digital_product_type' => $this->faker->word,
            'digital_file_ready' => $this->faker->word,
            'images' => json_encode([Arr::random($thumbnailLinks)]),
            'color_image' => "",
            'thumbnail' => $this->faker->randomElement($thumbnailLinks),
            'featured' => $this->faker->boolean,
            'flash_deal' => $this->faker->imageUrl,
            'video_provider' => $this->faker->word,
            'video_url' => $this->faker->url,
            'colors' => json_encode(['#7FFFD4']),
            'variant_product' => $this->faker->boolean,
            'attributes' => $this->faker->word,
            'choice_options' => json_encode([]),
            'variation' => json_encode($variation),
            'published' => $this->faker->boolean,
            'unit_price' => $this->faker->randomFloat(2, 10, 100),
            'purchase_price' => $this->faker->randomFloat(2, 1, 50),
            'tax' => '0.00',
            'tax_type' => $this->faker->word,
            'tax_model' => 'exclude',
            'discount' => '0.00',
            'discount_type' => $this->faker->word,
            'current_stock' => $this->faker->randomNumber(3),
            'minimum_order_qty' => '1',
            'details' => $this->faker->text,
            'free_shipping' => $this->faker->boolean,
            'attachment' => $this->faker->word,
            'status' => $this->faker->boolean,
            'featured_status' => $this->faker->boolean,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'meta_image' => $this->faker->imageUrl,
            'request_status' => $this->faker->boolean,
            'denied_note' => $this->faker->sentence,
            'shipping_cost' => $this->faker->randomFloat(2, 0, 50),
            'multiply_qty' => $this->faker->boolean,
            'temp_shipping_cost' => $this->faker->randomFloat(2, 0, 50),
            'is_shipping_cost_updated' => $this->faker->boolean,
            'code' => $this->faker->word,
        ];
    }
    protected function customImageUrl($directory, $extension)
    {
        $path = 'path/to/images/' . $directory . '/';
        $fileName = $this->faker->unique()->word . '.' . $extension;
        $fullPath = $path . $fileName;
        return $fullPath;
    }
}
