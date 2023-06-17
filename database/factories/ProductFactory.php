<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $products = [
            ['Air freshener', 'air_freshener.webp'],
            ['Apple', 'apple.webp'],
            ['Bag', 'bag.webp'],
            ['Balloon', 'balloon.webp'],
            ['Bananas', 'bananas.webp'],
            ['Book', 'book.webp'],
            ['Bookmark', 'bookmark.webp'],
            ['Boom box', 'boom_box.webp'],
            ['Bottle', 'bottle.webp'],
            ['Brocolli', 'brocolli.webp'],
            ['Candle', 'candle.webp'],
            ['Carrots', 'carrots.webp'],
            ['Chair', 'chair.webp'],
            ['Chalk', 'chalk.webp'],
            ['Chapter book', 'chapter_book.webp'],
            ['Cinder block', 'cinder_block.webp'],
            ['Clamp', 'clamp.webp'],
            ['Clothes', 'clothes.webp'],
            ['Coasters', 'coasters.webp'],
            ['Computer', 'computer.webp'],
            ['Cork', 'cork.webp'],
            ['Couch', 'couch.webp'],
            ['Credit card', 'credit_card.webp'],
            ['Cup', 'cup.webp'],
            ['Deodorant', 'deodorant_.webp'],
            ['Desk', 'desk.webp'],
            ['Doll', 'doll.webp'],
            ['Door', 'door.webp'],
            ['Drawer', 'drawer.webp'],
            ['Eraser', 'eraser.webp'],
            ['Flag', 'flag.webp'],
            ['Food', 'food.webp'],
            ['Fridge', 'fridge.webp'],
            ['Glasses', 'glasses.webp'],
            ['Grid paper', 'grid_paper.webp'],
            ['Ice cube tray', 'ice_cube_tray.webp'],
            ['Ipod', 'ipod.webp'],
            ['Keys', 'keys.webp'],
            ['Knife', 'knife.webp'],
            ['Lamp', 'lamp.webp'],
            ['Lamp shade', 'lamp_shade.webp'],
            ['Lotion', 'lotion.webp'],
            ['Milk', 'milk.webp'],
            ['Money', 'money.webp'],
            ['Monitor', 'monitor.webp'],
            ['Mop', 'mop.webp'],
            ['Mp3 player', 'mp3_player.webp'],
            ['Nail file', 'nail_file.webp'],
            ['Needle', 'needle.webp'],
            ['Newspaper', 'newspaper.webp'],
            ['Outlet', 'outlet.webp'],
            ['Paint brush', 'paint_brush.webp'],
            ['Pants', 'pants.webp'],
            ['Pen', 'pen.webp'],
            ['Perfume', 'perfume.webp'],
            ['Phone', 'phone.webp'],
            ['Piano', 'piano.webp'],
            ['Picture frame', 'picture_frame.webp'],
            ['Pillow', 'pillow.webp'],
            ['Plastic fork', 'plastic_fork.webp'],
            ['Purse', 'purse.webp'],
            ['Rubber band', 'rubber_band.webp'],
            ['Rubber duck', 'rubber_duck.webp'],
            ['Rug', 'rug.webp'],
            ['Rusty nail', 'rusty_nail.webp'],
            ['Sailboat', 'sailboat.webp'],
            ['Sand paper', 'sand_paper.webp'],
            ['Sharpie', 'sharpie.webp'],
            ['Shawl', 'shawl.webp'],
            ['Shoe lace', 'shoe_lace.webp'],
            ['Shoes', 'shoes.webp'],
            ['Sidewalk', 'sidewalk.webp'],
            ['Sofa', 'sofa.webp'],
            ['Soy sauce packet', 'soy_sauce_packet.webp'],
            ['Speakers', 'speakers.webp'],
            ['Spoon', 'spoon.webp'],
            ['Stockings', 'stockings.webp'],
            ['Stop sign', 'stop_sign.webp'],
            ['Street lights', 'street_lights.webp'],
            ['Sun glasses', 'sun_glasses.webp'],
            ['Table', 'table.webp'],
            ['Teddies', 'teddies.webp'],
            ['Television', 'television.webp'],
            ['Thread', 'thread.webp'],
            ['Tire swing', 'tire_swing.webp'],
            ['Tissue box', 'tissue_box.webp'],
            ['Toilet', 'toilet.webp'],
            ['Tomato', 'tomato.webp'],
            ['Tooth picks', 'tooth_picks.webp'],
            ['Toothbrush', 'toothbrush.webp'],
            ['Tv', 'tv.webp'],
            ['Twister', 'twister.webp'],
            ['USB drive', 'usb_drive.webp'],
            ['Vase', 'vase.webp'],
            ['Video games', 'video_games.webp'],
            ['Washing machine', 'washing_machine.webp'],
            ['Watch', 'watch.webp'],
            ['Water bottle', 'water_bottle.webp'],
            ['White out', 'white_out.webp'],
        ];

        $rand = random_int(0, count($products) - 1);
        $quality = $this->faker->randomElement(['', 'New ', 'Used ', 'Refurbished ']);
        $name = $quality . $products[$rand][0];
        $image = $products[$rand][1];

        return [
            'shop_id' => fake()->numberBetween(1, 10_000),
            'name' => $name,
            'slug' => fake()->slug(),
            'image' => 'https://storage.googleapis.com/tinyshops/images/products/' . $image,
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(10, 100_000),
            'is_pinned' => fake()->boolean(),
        ];
    }
}
