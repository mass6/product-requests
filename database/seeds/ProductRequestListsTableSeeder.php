<?php

use Illuminate\Database\Seeder;

class ProductRequestListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productLists = ['Electronics','Cleaning','Construction', 'MEP'];

        for ($i = 0, $c = count($productLists); $i < $c; $i++) {
            factory(App\ProductRequestList::class)->create([
                'name' => $productLists[$i],
            ]);
        }
    }
}
