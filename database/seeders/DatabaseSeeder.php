<?php

namespace Database\Seeders;

use App\Models\{ActiveIngredient, Address, Attachment, AttachmentMeta, Category, Manufacturer, ManufacturerAddress, Medicine, MedicineAttachment, MedicineCategory, MedicineDescription, MedicineMeta, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        Manufacturer::factory(120)->create()
            ->has(ManufacturerAddress::factory()
                ->has(Address::factory()->count(1))->count(1));
        Medicine::factory(150)->create()
            ->has(ActiveIngredient::factory()->count(1))
            ->has(MedicineAttachment::factory()
                ->has(Attachment::factory()->count(1))->count(1))
            ->has(MedicineCategory::factory()
                ->has(Category::factory()->count(1))->count(1))
            ->has(MedicineDescription::factory()->count(1))
            ->has(MedicineMeta::factory()->count(1))
            ->has(AttachmentMeta::factory()->count(1));
    }
}
