<?php

use Illuminate\Database\Seeder;
use App\AspirationCategory;

class AspirationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category' => 'Pendidikan',
                'image' => 'pendidikan.jpg',
                'email_address' => 'pengaduan@kemdikbud.go.id',
            ],
            [
                'category' => 'Teknologi',
                'image' => 'teknologi.jpg',
                'email_address' => 'teknologi@gmail.com',
            ],
            [
                'category' => 'Infrastruktur',
                'image' => 'infrastruktur.jpg',
                'email_address' => 'infrastruktur@gmail.com',
            ],
            [
                'category' => 'Keuangan',
                'image' => 'keuangan.jpg',
                'email_address' => 'keuangan@gmail.com',
            ],
        ];

        foreach ($categories as $category) {
            AspirationCategory::create($category);
        }
    }
}
