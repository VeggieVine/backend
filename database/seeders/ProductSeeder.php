<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryID = ['FRT01', 'VGT01'];
        $harvestLocations = ['Bogor', 'Depok', 'Jakarta', 'Tangerang', 'Bekasi'];
        $storageLifeRanges = [7, 14, 21];
        $priceRanges = [20000, 30000, 40000, 50000];
        $stockRanges = [100, 200, 300, 400, 500];
        $fruitList = [
            0 => [
                'name' => 'Apel Malang',
                'slug' => 'apel-malang',
                'description' => 'Apel Malang adalah apel yang berasal dari Malang yang memiliki rasa yang manis dan renyah.',
                'image' => 'apel.png',
            ],
            1 => [
                'name' => 'Apel Fuji China',
                'slug' => 'apel-fuji-china',
                'description' => 'Apel Fuji China adalah apel yang berasal dari China yang memiliki rasa yang manis dan renyah.',
                'image' => 'apel.png',
            ],
            2 => [
                'name' => 'Apel Premium Pohon',
                'slug' => 'apel-premium-pohon',
                'description' => 'Apel Premium Pohon adalah apel yang berasal dari pohon apel yang memiliki rasa yang manis dan renyah.',
                'image' => 'apel.png',
            ],
            3 => [
                'name' => 'Blueberry China',
                'slug' => 'blueberry-china',
                'description' => 'Blueberry China adalah blueberry yang berasal dari China yang memiliki rasa yang manis dan segar.',
                'image' => 'blueberry.jpg',
            ],
            4 => [
                'name' => 'Jeruk Sunkist Valencia',
                'slug' => 'jeruk-sunkist-valencia',
                'description' => 'Jeruk Sunkist Valencia adalah jeruk sunkist yang berasal dari Valencia yang memiliki rasa yang manis dan segar.',
                'image' => 'jeruk-sunkist.jpg',
            ],
            5 => [
                'name' => 'Jeruk Lemon',
                'slug' => 'jeruk-lemon',
                'description' => 'Jeruk Lemon adalah jeruk yang memiliki rasa yang asam dan segar.',
                'image' => 'jeruk-lemon.jpg',
            ],
            6 => [
                'name' => 'Jeruk Malang',
                'slug' => 'jeruk-malang',
                'description' => 'Jeruk Malang adalah jeruk yang berasal dari Malang yang memiliki rasa yang manis dan segar.',
                'image' => 'jeruk-malang.jpg',
            ],
            7 => [
                'name' => 'Pear Century China',
                'slug' => 'pear-century-china',
                'description' => 'Pear Century China adalah pear yang berasal dari China yang memiliki rasa yang manis dan segar.',
                'image' => 'pear.jpg',
            ],
            8 => [
                'name' => 'Kelengkeng Thailand',
                'slug' => 'kelengkeng-thailand',
                'description' => 'Kelengkeng Thailand adalah kelengkeng yang berasal dari Thailand yang memiliki rasa yang manis dan segar.',
                'image' => 'kelengkeng.jpg',
            ],
            9 => [
                'name' => 'Kiwi',
                'slug' => 'kiwi',
                'description' => 'Kiwi adalah buah yang memiliki rasa yang manis dan segar.',
                'image' => 'kiwi.jpg',
            ],
            10 => [
                'name' => 'Belimbing',
                'slug' => 'belimbing',
                'description' => 'Belimbing adalah buah yang memiliki rasa yang asam dan segar.',
                'image' => 'belimbing.jpg',
            ],
            11 => [
                'name' => 'Semangka',
                'slug' => 'semangka',
                'description' => 'Semangka adalah buah yang memiliki rasa yang manis dan segar.',
                'image' => 'semangka.jpg',
            ],
            12 => [
                'name' => 'Pepaya',
                'slug' => 'pepaya',
                'description' => 'Pepaya adalah buah yang memiliki rasa yang manis dan segar.',
                'image' => 'pepaya.jpg',
            ],
            13 => [
                'name' => 'Alpukat',
                'slug' => 'alpukat',
                'description' => 'Alpukat adalah buah yang memiliki rasa yang manis dan segar.',
                'image' => 'alpukat.png',
            ], 
            14 => [
                'name' => 'Mangga',
                'slug' => 'mangga',
                'description' => 'Mangga adalah buah yang memiliki rasa yang manis dan segar.',
                'image' => 'mangga.png',
            ],
            15 => [
                'name' => 'Persik',
                'slug' => 'persik',
                'description' => 'Persik adalah buah yang memiliki rasa yang manis dan segar.',
                'image' => 'persik.png',
            ],
        ];
        $vegetableList = [
            0 => [
                'name' => 'Bawang Bombai',
                'slug' => 'bawang-bombai',
                'description' => 'Bawang Bombai adalah bawang yang memiliki rasa yang pedas dan segar.',
                'image' => 'bawang-bombai.jpg',
            ],
            1 => [
                'name' => 'Bawang Merah',
                'slug' => 'bawang-merah',
                'description' => 'Bawang Merah adalah bawang yang memiliki rasa yang pedas dan segar.',
                'image' => 'bawang-merah.jpg',
            ],
            2 => [
                'name' => 'Bawang Putih',
                'slug' => 'bawang-putih',
                'description' => 'Bawang Putih adalah bawang yang memiliki rasa yang pedas dan segar.',
                'image' => 'bawang-putih.jpg',
            ],
            3 => [
                'name' => 'Jamur',
                'slug' => 'jamur',
                'description' => 'Jamur adalah jamur yang memiliki rasa yang pedas dan segar.',
                'image' => 'jamur.jpg',
            ],
            4 => [
                'name' => 'Brokoli',
                'slug' => 'brokoli',
                'description' => 'Brokoli adalah brokoli yang memiliki rasa yang pedas dan segar.',
                'image' => 'brokoli.jpg',
            ],
            5 => [
                'name' => 'Mentimun',
                'slug' => 'mentimun',
                'description' => 'Mentimun adalah mentimun yang memiliki rasa yang pedas dan segar.',
                'image' => 'timun.png',
            ],
            6 => [
                'name' => 'Kentang',
                'slug' => 'kentang',
                'description' => 'Kentang adalah kentang yang memiliki rasa yang pedas dan segar.',
                'image' => 'kentang.png',
            ],
            7 => [
                'name' => 'Oyong',
                'slug' => 'oyong',
                'description' => 'Oyong adalah oyong yang memiliki rasa yang pedas dan segar.',
                'image' => 'oyong.jpeg',
            ],
            8 => [
                'name' => 'Kol',
                'slug' => 'kol',
                'description' => 'Kol adalah kol yang memiliki rasa yang pedas dan segar.',
                'image' => 'kol.jpeg',
            ],
            9 => [
                'name' => 'Kol Ungu',
                'slug' => 'kol-ungu',
                'description' => 'Kol Ungu adalah kol ungu yang memiliki rasa yang pedas dan segar.',
                'image' => 'kol-ungu.jpeg',
            ],
            10 => [
                'name' => 'Daun Bawang',
                'slug' => 'daun-bawang',
                'description' => 'Daun Bawang adalah daun bawang yang memiliki rasa yang pedas dan segar.',
                'image' => 'daun-bawang.png',
            ],
            11 => [
                'name' => 'Pokcoy',
                'slug' => 'pokcoy',
                'description' => 'Pokcoy adalah pokcoy yang memiliki rasa yang pedas dan segar.',
                'image' => 'pokcoy.png',
            ],
            12 => [
                'name' => 'Buncis',
                'slug' => 'buncis',
                'description' => 'Buncis adalah buncis yang memiliki rasa yang pedas dan segar.',
                'image' => 'buncis.jpeg',
            ],
            13 => [
                'name' => 'Wortel',
                'slug' => 'wortel',
                'description' => 'Wortel adalah wortel yang memiliki rasa yang pedas dan segar.',
                'image' => 'wortel.jpg',
            ],
        ];

        foreach ($fruitList as $fruit)
        {
            Products::create([
                'category_id' => $categoryID[0],
                'name' => $fruit['name'],
                'slug' => $fruit['slug'],
                'description' => $fruit['description'],
                'harvested_from' => $harvestLocations[array_rand($harvestLocations)],
                'storage_life' => $storageLifeRanges[array_rand($storageLifeRanges)],
                'price' => $priceRanges[array_rand($priceRanges)],
                'stock' => $stockRanges[array_rand($stockRanges)],
                'image' => $fruit['image'],
                'harvested_at' => now()->subDays(rand(1, 30))->format('Y-m-d H:i:s'),
            ]);
        }

        foreach ($vegetableList as $vegetable)
        {
            Products::create([
                'category_id' => $categoryID[1],
                'name' => $vegetable['name'],
                'slug' => $vegetable['slug'],
                'description' => $vegetable['description'],
                'harvested_from' => $harvestLocations[array_rand($harvestLocations)],
                'storage_life' => $storageLifeRanges[array_rand($storageLifeRanges)],
                'price' => $priceRanges[array_rand($priceRanges)],
                'stock' => $stockRanges[array_rand($stockRanges)],
                'image' => $vegetable['image'],
                'harvested_at' => now()->subDays(rand(1, 30))->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
