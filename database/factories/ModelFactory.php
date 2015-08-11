<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\ProductRequest::class, function ($faker) {
    return [
        'user_id' => 2,
//        'list_id' => $faker->boolean($chanceOfGettingTrue = 80) ? rand(1,5) : null,
        'product_description' => ucwords(str_replace('.','',$faker->sentence(rand(1,3)))),
        'category' => 'Construction',
        'sku' => $faker->boolean($chanceOfGettingTrue = 70) ? $faker->ean8 : null,
        'uom' => $faker->boolean($chanceOfGettingTrue = 50) ? 'Each' : 'Box (50 Pcs)',
        'purchase_recurrence' => $faker->boolean($chanceOfGettingTrue = 70) ? 'Monthly' : 'single-purchase',
        'volume_requested' => $faker->randomDigitNotNull(),
        'current_price' => $faker->boolean($chanceOfGettingTrue = 70) ? ($faker->randomDigitNotNull() * $faker->randomDigitNotNull()) : null,
        'current_supplier' => $faker->boolean($chanceOfGettingTrue = 70) ? $faker->company : null,
        'remarks' => $faker->boolean($chanceOfGettingTrue = 40) ? $faker->sentence(8) : null,
        'state' => $faker->randomElement($array = array ('draft','in review','pending-input', 'sourcing', 'drafing proposal', 'pending approval', 'complete', 'closed')),
    ];
});

$factory->define(App\ProductRequestList::class, function ($faker) {
    return [
        'user_id' => 2,
        'name' => $faker->randomElement($array = array ('Electronics','Cleaning','Construction', 'MEP')),
        'description' => $faker->sentence(6),
    ];
});

$factory->define(App\ProductProposal::class, function ($faker) {
    return [
        'product_name' => ucwords(str_replace('.','',$faker->sentence(rand(1,3)))),
        'product_description' => $faker->sentence(6),
        'sku' => $faker->boolean($chanceOfGettingTrue = 70) ? $faker->ean8 : null,
        'uom' => $faker->boolean($chanceOfGettingTrue = 50) ? 'Each' : 'Box (50 Pcs)',
        'price' => $faker->randomNumber(2),
        'supplier' => $faker->company,
        'state' => $faker->randomElement($array = array ('draft','pending approval', 'approved', 'rejected', 'closed')),
        'created_by_id' => 1,
        'updated_by_id' => 1,
        'assigned_to_id' => rand(2,50),
    ];
});