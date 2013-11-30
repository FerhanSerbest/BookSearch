<?php
 
class AuthorTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('authors')->insert(
 
            array (
                array(
                    'id' => 1,
                    'firstname' => 'Agatha',
                    'lastname' => 'Christie',
                ),
                array(
                    'id' => 2,
                    'firstname' => 'George',
                    'lastname' => 'Martin'
                ),
                array(
                    'id' => 3,
                    'firstname' => 'Herman',
                    'lastname' => 'Melville'
                )
            )
        );
    }
 
}