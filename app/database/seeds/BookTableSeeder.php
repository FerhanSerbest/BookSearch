<?php
 
class BookTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('books')->insert(
 
            array (
                array(
                    'id' => 1,
                    'title' => 'Murder on the Orient Express',
                    'description' => 'The mysterious Mr. Ratchett is found
                      stabbed in his compartment and untrodden snow shows that the killer is
                       still on board.',
                    'date_published' => '1934-01-01',
                    'ISBN' => '9784896845570',
                    'author_id' => 1
                ),
                array(
                    'id' => 2,
                    'title' => 'And then there were none',
                    'description' => 'Ten people are invited to an island for the weekend.
                     Although they all harbour a secret, they remain unsuspecting until they begin to die,
                      one by one, until eventually there are none.',
                    'date_published' => '1939-11-06',
                    'ISBN' => '9780573819070',
                    'author_id' => 1
                ),
                array(
                    'id' => 3,
                    'title' => 'A Game of Thrones',
                    'description' => 'The cold is returning,
                      and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond
                       the kingdom’s protective Wall',
                    'date_published' => '1996-08-06',
                    'ISBN' => '9780553386790',
                    'author_id' => 2
                ),
                array(
                    'id' => 4,
                    'title' => 'A Clash of Kings',
                    'description' => 'Six factions struggle for control of a divided land
                      and the Iron Throne of the Seven Kingdoms, preparing to stake their claims through tempest, turmoil, and war.',
                    'date_published' => '1999-01-01',
                    'ISBN' => '9780007447831',
                    'author_id' => 2
                ),
                array(
                    'id' => 5,
                    'title' => 'Moby Dick',
                    'description' => 'The story tells the adventures of wandering sailor Ishmael and his voyage on the whaleship Pequod.
                      Ishmael soon learns that Ahab has one purpose on this voyage: to seek out Moby Dick.',
                    'date_published' => '1851-10-18',
                    'ISBN' => '9788176630054',
                    'author_id' => 3
                )
            )
        );
    }
 
}