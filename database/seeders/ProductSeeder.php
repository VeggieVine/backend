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
        $fruitList = [
            0 => [
                'name' => 'Apel Malang',
                'slug' => 'apel-malang',
                'description' => 'Apel Malang adalah apel yang berasal dari Malang yang memiliki rasa yang manis dan renyah.',
                'price' => 40000,
                'stock' => 100,
                'image' => 'apel-malang.jpg',
            ],
            1 => [
                'name' => 'Apel Fuji China',
                'slug' => 'apel-fuji-china',
                'description' => 'Apel Fuji China adalah apel yang berasal dari China yang memiliki rasa yang manis dan renyah.',
                'price' => 40000,
                'stock' => 100,
                'image' => 'apel-fuji-china.jpg',
            ],
            2 => [
                'name' => 'Apel Premium Pohon',
                'slug' => 'apel-premium-pohon',
                'description' => 'Apel Premium Pohon adalah apel yang berasal dari pohon apel yang memiliki rasa yang manis dan renyah.',
                'price' => 40000,
                'stock' => 100,
                'image' => 'apel-premium-pohon.jpg',
            ],
            3 => [
                'name' => 'Blueberry China',
                'slug' => 'blueberry-china',
                'description' => 'Blueberry China adalah blueberry yang berasal dari China yang memiliki rasa yang manis dan segar.',
                'price' => 50000,
                'stock' => 100,
                'image' => 'blueberry-china.jpg',
            ],
            4 => [
                'name' => 'Jeruk Sunkist Valencia',
                'slug' => 'jeruk-sunkist-valencia',
                'description' => 'Jeruk Sunkist Valencia adalah jeruk sunkist yang berasal dari Valencia yang memiliki rasa yang manis dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'jeruk-sunkist-valencia.jpg',
            ],
            5 => [
                'name' => 'Jeruk Lemon',
                'slug' => 'jeruk-lemon',
                'description' => 'Jeruk Lemon adalah jeruk yang memiliki rasa yang asam dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'jeruk-lemon.jpg',
            ],
            6 => [
                'name' => 'Jeruk Malang',
                'slug' => 'jeruk-malang',
                'description' => 'Jeruk Malang adalah jeruk yang berasal dari Malang yang memiliki rasa yang manis dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'jeruk-malang.jpg',
            ],
            7 => [
                'name' => 'Pear Century China',
                'slug' => 'pear-century-china',
                'description' => 'Pear Century China adalah pear yang berasal dari China yang memiliki rasa yang manis dan segar.',
                'price' => 40000,
                'stock' => 100,
                'image' => 'pear-century-china.jpg',
            ],
            8 => [
                'name' => 'Kelengkeng Thailand',
                'slug' => 'kelengkeng-thailand',
                'description' => 'Kelengkeng Thailand adalah kelengkeng yang berasal dari Thailand yang memiliki rasa yang manis dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'kelengkeng-thailand.jpg',
            ],
            9 => [
                'name' => 'Kiwi',
                'slug' => 'kiwi',
                'description' => 'Kiwi adalah buah yang memiliki rasa yang manis dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'kiwi.jpg',
            ],
            10 => [
                'name' => 'Belimbing',
                'slug' => 'belimbing',
                'description' => 'Belimbing adalah buah yang memiliki rasa yang asam dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'belimbing.jpg',
            ],
            11 => [
                'name' => 'Semangka',
                'slug' => 'semangka',
                'description' => 'Semangka adalah buah yang memiliki rasa yang manis dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'semangka.jpg',
            ],
            12 => [
                'name' => 'Pepaya',
                'slug' => 'pepaya',
                'description' => 'Pepaya adalah buah yang memiliki rasa yang manis dan segar.',
                'price' => 30000,
                'stock' => 100,
                'image' => 'pepaya.jpg',
            ],
        ];
        $vegetableList = [
            0 => [
                'name' => 'Bawang Bombai',
                'slug' => 'bawang-bombai',
                'description' => 'Bawang Bombai adalah bawang yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'bawang-bombai.jpg',
            ],
            1 => [
                'name' => 'Bawang Merah',
                'slug' => 'bawang-merah',
                'description' => 'Bawang Merah adalah bawang yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'bawang-merah.jpg',
            ],
            2 => [
                'name' => 'Bawang Putih',
                'slug' => 'bawang-putih',
                'description' => 'Bawang Putih adalah bawang yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'bawang-putih.jpg',
            ],
            3 => [
                'name' => 'Jamur',
                'slug' => 'jamur',
                'description' => 'Jamur adalah jamur yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'jamur.jpg',
            ],
            4 => [
                'name' => 'Brokoli',
                'slug' => 'brokoli',
                'description' => 'Brokoli adalah brokoli yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'brokoli.jpg',
            ],
            5 => [
                'name' => 'Mentimun',
                'slug' => 'mentimun',
                'description' => 'Mentimun adalah mentimun yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'mentimun.jpg',
            ],
            6 => [
                'name' => 'Kentang',
                'slug' => 'kentang',
                'description' => 'Kentang adalah kentang yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'kentang.jpg',
            ],
            7 => [
                'name' => 'Oyong',
                'slug' => 'oyong',
                'description' => 'Oyong adalah oyong yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'oyong.jpg',
            ],
            8 => [
                'name' => 'Kol',
                'slug' => 'kol',
                'description' => 'Kol adalah kol yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'kol.jpg',
            ],
            9 => [
                'name' => 'Kol Ungu',
                'slug' => 'kol-ungu',
                'description' => 'Kol Ungu adalah kol ungu yang memiliki rasa yang pedas dan segar.',
                'price' => 20000,
                'stock' => 100,
                'image' => 'kol-ungu.jpg',
            ],
        ];

        foreach ($fruitList as $fruit)
        {
            Products::create([
                'category_id' => $categoryID[0],
                'name' => $fruit['name'],
                'slug' => $fruit['slug'],
                'description' => $fruit['description'],
                'price' => $fruit['price'],
                'stock' => $fruit['stock'],
                'image' => $fruit['image'],
            ]);
        }

        foreach ($vegetableList as $vegetable)
        {
            Products::create([
                'category_id' => $categoryID[1],
                'name' => $vegetable['name'],
                'slug' => $vegetable['slug'],
                'description' => $vegetable['description'],
                'price' => $vegetable['price'],
                'stock' => $vegetable['stock'],
                'image' => $vegetable['image'],
            ]);
        }
    }
}
