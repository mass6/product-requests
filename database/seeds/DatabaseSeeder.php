<?php

use App\ProductRequestList;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    protected $tables = ['users', 'product_requests', 'product_request_lists', 'product_proposals'];

    protected $seeders = [
        'UserTableSeeder',
        'ProductRequestListsTableSeeder',
//        'ProductRequestsTableSeeder',
//        'ProductProposalsTableSeeder',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        $this->seedDatabase();

        factory('App\ProductRequest', 50)->create()->each(function($req) {
            // associate with product list
            $requestIsMemberOfProductList = rand(0,4);
            if ($requestIsMemberOfProductList) {
                $productList = ProductRequestList::findOrFail(rand(1,4));
                $productList->productRequests()->save($req);
            }

            // attach proposals
            $numProposals = rand(0,2);
            if($numProposals) {
                if($numProposals > 1) {
                    $req->proposals()->saveMany(factory('App\ProductProposal',$numProposals)->make());
                }
                $req->proposals()->save(factory('App\ProductProposal')->make());
            }
        });

        Model::reguard();
    }




    public function disableForeignKeyConstraints($databaseType)
    {
        $databaseType === 'sqlite'
            ? DB::statement("PRAGMA foreign_keys = OFF")
            : DB::statement("SET foreign_key_checks = 0");
    }

    public function enableForeignKeyConstraints($databaseType)
    {
        $databaseType === 'sqlite'
            ? DB::statement("PRAGMA foreign_keys = ON")
            : DB::statement("SET foreign_key_checks = 1");
    }

    /**
     *
     */
    public function cleanDatabase()
    {
//        $this->disableForeignKeyConstraints(getenv('DB_TYPE'));

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }
    }

    /**
     *
     */
    public function seedDatabase()
    {
        foreach ($this->seeders as $seed)
        {
            $this->call($seed);
        }
    }
}
