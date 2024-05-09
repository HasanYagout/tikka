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
            'https://w7.pngwing.com/pngs/861/863/png-transparent-variety-of-spices-spice-mix-herb-ingredient-food-colorful-spices-natural-foods-color-splash-recipe-thumbnail.png',
            'https://upload.wikimedia.org/wikipedia/commons/8/82/Common_Indian_spices.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRixa4C8JBT2geDjYzX0FWtWcJ_Fn5DHMI1GsxaU06uhuaPG2Gfi7FGA-aRx3tWJxteamA&usqp=CAU',
            'https://media.post.rvohealth.io/wp-content/uploads/2021/09/allspice-732x549-thumbnail.jpg',
            'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.endofthefork.com%2Findian-spices-and-their-uses%2F&psig=AOvVaw3gRpFLlrgp-0m-qlKG8AVg&ust=1715202268731000&source=images&cd=vfe&opi=89978449&ved=2ahUKEwid8erAuPyFAxW_8AIHHWKTAyMQjRx6BAgAEBY',
            'https://cookifi.com/blog/wp-content/uploads/2018/07/screen-shot-2014-10-09-at-5-01-07-pm.png',
            'https://i.ndtvimg.com/i/2016-08/spice_625x350_51471090241.jpg',
            'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.micoope.com.gt%2F%3Fo%3Dcooking-with-indian-spices-a-primer-for-home-cooks-nn-0Lrjq0T2&psig=AOvVaw33UouNi3WIVeVMvnOSNaND&ust=1715202267971000&source=images&cd=vfe&opi=89978449&ved=2ahUKEwiqtrzAuPyFAxXF3wIHHdN0Ao4QjRx6BAgAEBY',
            'https://d1e3z2jco40k3v.cloudfront.net/-/media/clubhouse-for-chef/chfc_product_images_400x400/00066200912734_a1c1.png?rev=17e1d171de0e44e3b947d9e23516eec6&vd=20230406T082343Z&hash=FCF70490376FF1505E2CF3D41B0C23E4',
            'https://storage.googleapis.com/images-sof-prd-9fa6b8b.sof.prd.v8.commerce.mi9cloud.com/product-images/zoom/00066200015008.jpg'
        ];
        $variation = [
            [
                'type' => 'AntiqueWhite',
                'price' => 31231,
                'sku' => 't-AntiqueWhite',
                'qty' => 1,
            ]
        ];

        return [
            'added_by' => 'admin',
            'user_id' => '1',
            'name' => $this->faker->word,
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
            'images' => $this->faker->text,
            'color_image' => $this->faker->text,
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
