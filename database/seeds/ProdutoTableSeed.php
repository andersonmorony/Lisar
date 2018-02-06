<?php

use Illuminate\Database\Seeder;

class ProdutoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Lisar\Model\Produto::class, 50)->create();
    }
}
