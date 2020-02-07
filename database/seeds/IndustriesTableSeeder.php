<?php

use App\Domain\Industry\Entities\Industry;
use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industry::firstOrCreate([
            'name' => [
                'en' => 'Gold, silver jewellery',
                'ru' => 'Ювелирные изделия из золота, из серебра'
            ]
        ]);Industry::firstOrCreate([
            'name' => [
                'en' => 'Diamond jewellery',
                'ru' => 'Ювелирные изделия с бриллиантами'
            ]
        ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Antique jewelry, watches, wall clocks',
            'ru' => 'Ювелирные антикварные изделия, наручные и настенные часы'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Gems and gemstone jewelry',
            'ru' => 'Драгоценные камни и украшения с драгоценными камнями'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Pearls, pearl jewelry',
            'ru' => 'Жемчуг, ювелирные изделия из жемчуга'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Semiprecious stones and jewelry',
            'ru' => 'Полудрагоценные камни и украшения'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Synthetic jewellery',
            'ru' => 'Синтетические ювелирные камни'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Equipment and tools',
            'ru' => 'Оборудование и инструменты для производства, обработки ювелирных изделий'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Accessories, frames, parts for jewelry production',
            'ru' => 'Детали для производства ювелирных изделий, оправы, аксессуары'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Packing materials',
            'ru' => 'Упаковка, футляры'
        ]
    ]);Industry::firstOrCreate([
        'name' => [
            'en' => 'Security systems and technologies',
            'ru' => 'Системы и технологии безопасности'
        ]
    ]);
    }
}
