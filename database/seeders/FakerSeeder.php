<?php

namespace Database\Seeders;

use App\Models\ActiveIngredient;
use App\Models\Address;
use App\Models\Attachment;
use App\Models\AttachmentMeta;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\ManufacturerAddress;
use App\Models\Medicine;
use App\Models\MedicineAttachment;
use App\Models\MedicineCategory;
use App\Models\MedicineDescription;
use App\Models\MedicineMeta;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * To run: php artisan db:seed --class=FakerSeeder
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        Address::factory(10)->create()->each(function ($address) {
            $faker = Faker::create();
            $Manufacturer = new Manufacturer();
            $Manufacturer->name = $faker->catchPhrase;
            $Manufacturer->page = $faker->url;
            $Manufacturer->email = $faker->email;
            $Manufacturer->phone = $faker->tollFreePhoneNumber;
            $Manufacturer->save();

            $ManufacturerAddress = new ManufacturerAddress();
            $ManufacturerAddress->manufacturer_id = $Manufacturer->id;
            $ManufacturerAddress->address_id = $address->id;
            $ManufacturerAddress->save();
        });
        ActiveIngredient::factory(20)->create();
        Category::factory(20)->create();
        Medicine::factory(20)->create()->each(function ($medicine) {
            $faker = Faker::create();
            $Indications = new MedicineDescription();
            $Indications->medicine_id= $medicine->id;
            $Indications->title= 'Para o que é indicado e para o que serve?';
            $Indications->description = $faker->sentence(500, true);
            $Indications->save();
            $Contraindications = new MedicineDescription();
            $Contraindications->medicine_id= $medicine->id;
            $Contraindications->title= 'Quais as contraindicações?';
            $Contraindications->description = $faker->sentence(500, true);
            $Contraindications->save();
            $HowToUse = new MedicineDescription();
            $HowToUse->medicine_id= $medicine->id;
            $HowToUse->title= 'Como usar?';
            $HowToUse->description = $faker->sentence(500, true);
            $HowToUse->save();
            $Care = new MedicineDescription();
            $Care->medicine_id= $medicine->id;
            $Care->title= 'Quais cuidados devo ter ao usar?';
            $Care->description = $faker->sentence(500, true);
            $Care->save();
            $Reactions = new MedicineDescription();
            $Reactions->medicine_id= $medicine->id;
            $Reactions->title= 'Quais as reações adversas e os efeitos colaterais?';
            $Reactions->description = $faker->sentence(500, true);
            $Reactions->save();
            $Composition = new MedicineDescription();
            $Composition->medicine_id= $medicine->id;
            $Composition->title= 'Qual a composição?';
            $Composition->description = $faker->sentence(500, true);
            $Composition->save();
            $Overdose = new MedicineDescription();
            $Overdose->medicine_id= $medicine->id;
            $Overdose->title= 'Superdose: o que acontece se tomar uma dose maior do que a recomendada?';
            $Overdose->description = $faker->sentence(500, true);
            $Overdose->save();
            $DrugInteraction = new MedicineDescription();
            $DrugInteraction->medicine_id= $medicine->id;
            $DrugInteraction->title= 'Interação medicamentosa: quais os efeitos de tomar com outros remédios?';
            $DrugInteraction->description = $faker->sentence(500, true);
            $DrugInteraction->save();
            $Action = new MedicineDescription();
            $Action->medicine_id= $medicine->id;
            $Action->title= 'Qual a ação da substância?';
            $Action->description = $faker->sentence(500, true);
            $Action->save();
            $Storage = new MedicineDescription();
            $Storage->medicine_id= $medicine->id;
            $Storage->title= 'Como devo armazenar?';
            $Storage->description = $faker->sentence(500, true);
            $Storage->save();
            $Sayings = new MedicineDescription();
            $Sayings->medicine_id= $medicine->id;
            $Sayings->title= 'Dizeres Legais';
            $Sayings->description = $faker->sentence(500, true);
            $Sayings->save();

            $sku = new MedicineMeta();
            $sku->medicine_id = $medicine->id;
            $sku->key = 'SKU';
            $sku->value = $faker->numberBetween($nbDigits = 10000000000, 99999999999);
            $sku->save();
            $tipo = new MedicineMeta();
            $tipo->medicine_id = $medicine->id;
            $tipo->key = 'Tipo do Medicamento';
            $tipo->value = $faker->sentence(20, true);
            $tipo->save();
            $receita = new MedicineMeta();
            $receita->medicine_id = $medicine->id;
            $receita->key = 'Necessita de Receita';
            $receita->value = $faker->sentence(20, true);
            $receita->save();
            $classe = new MedicineMeta();
            $classe->medicine_id = $medicine->id;
            $classe->key = 'Classe Terapêutica';
            $classe->value = $faker->sentence(20, true);
            $classe->save();
            $especialidades = new MedicineMeta();
            $especialidades->medicine_id = $medicine->id;
            $especialidades->key = 'Especialidades';
            $especialidades->value = $faker->sentence(20, true);
            $especialidades->save();

            $MedicineCategory = new MedicineCategory();
            $MedicineCategory->medicine_id = $medicine->id;
            $MedicineCategory->category_id = Category::inRandomOrder()->first()->id;
            $MedicineCategory->save();

            $folder = 'storage/app/public/medicines/'.$medicine->id;
            if(!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            foreach(range(0, 5) as $item){
                $Attachment = new Attachment();
                $Attachment->name = $faker->sentence(6, true);
                $Attachment->type = 'image/jpeg';
                $Attachment->save();

                $images = [
                    'title' => $faker->sentence(15, true),
                    'alt' => $faker->sentence(10, true),
                    'file' => $faker->image($folder, 1900, 1267, 'Medicine', true, false, $medicine->id),
                    'width' => 1900,
                    'height' => 1267,
                    'large' => [
                        'file' => $faker->image($folder, 1024, 768, 'Medicine', true, false, $medicine->id),
                        'width' => 1024,
                        'height' => 768
                    ],
                    'medium' => [
                        'file' => $faker->image($folder, 800, 534, 'Medicine', true, false, $medicine->id),
                        'width' => 800,
                        'height' => 534
                    ],
                    'thumbnail' => [
                        'file' => $faker->image($folder, 500, 333, 'Medicine', true, false, $medicine->id),
                        'width' => 500,
                        'height' => 333
                    ],
                ];
                $AttachmentMeta = new AttachmentMeta();
                $AttachmentMeta->attachment_id = $Attachment->id;
                $AttachmentMeta->key = 'file_info';
                $AttachmentMeta->value = json_encode($images);
                $AttachmentMeta->save();

                $MedicineAttachment = new MedicineAttachment();
                $MedicineAttachment->medicine_id = $medicine->id;
                $MedicineAttachment->attachment_id = $Attachment->id;
                $MedicineAttachment->save();
            }
        });
    }
}
