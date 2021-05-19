<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            
            ['id' => 1, 'title' => 'Natuur'],
            ['id' => 2, 'title' => 'Politiek'],
            ['id' => 3, 'title' => 'Economie'], 
            ['id' => 4, 'title' => 'Sport'], 

            
         ]);

         
         DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Delger',
                'email' => 'jeroen_delger@hotmail.com',
                'password' => Hash::make('Test1234'),
                 'roles' => '"ROLE_WRITER"',
            ],

            [
                'id' => 2,
                'name' => 'Delgertje',
                'email' => 'delgertje@gmail.com',
                'password' => Hash::make('Test4321'),
                'roles' => '"ROLE_PREMIUM"',
                ]
         ]);
            
            DB::table('weblogblogs')->insert([
                [
                    'id' => 1,
                    'title' => 'Lorem Ipsum Economie',
                    'blog' => 'De economie heeft nu een blog',
                    'comment' => 'Een blog over de economie',
                //    'categories' => 'Economie',
                    'premium' => 1,
                    'writer_id' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
    
                [
                    'id' => 2,
                    'title' => 'Lorem Ipsum Natuur',
                    'blog' => 'De natuur heeft nu ook een blog',
                    'comment' => 'Een blog over natuur',
             //       'categories' => 'Natuur',
                    'premium' => 1,
                    'writer_id' => 2,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id' => 3,
                    'title' => 'Lorem Ipsum Politiek',
                    'blog' => 'Den Politiek heeft nu ook een blog',
                    'comment' => 'Een blog over politiek',
            //        'categories' => 'Politiek',
                    'premium' => 1,
                    'writer_id' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id' => 4,
                    'title' => 'Lorem Ipsum Sport',
                    'blog' => 'Sport heeft nu een blog',
                    'comment' => 'Een blog over sport',
             //       'categories' => 'Sport',
                    'premium' => 1,
                    'writer_id' => 2,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id' => 5,
                    'title' => 'Lorem Ipsum Idem Natuur',
                    'blog' => 'De natuur heeft nu een 2e blog',
                    'comment' => 'Een natuurlijke comment van de schrijver',
             //       'categories' => 'Natuur',
                    'premium' => 0,
                    'writer_id' => 2,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id' => 6,
                    'title' => 'Lorem Ipsum Idem Economie',
                    'blog' => 'De economie heeft nu een 2e blog',
                    'comment' => 'Een economische comment van de schrijver',
            //        'categories' => 'Economie',
                    'premium' => 0,
                    'writer_id' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id' => 7,
                    'title' => 'Lorem Ipsum Idem Politiek',
                    'blog' => 'De Politiek heeft nu een 2e blog',
                    'comment' => 'Een politieke comment van de schrijver',
           //         'categories' => 'Politiek',
                    'premium' => 0,
                    'writer_id' => 2,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'id' => 8,
                    'title' => 'Lorem Ipsum Idem Sport',
                    'blog' => 'Sport heeft nu een 2e blog',
                    'comment' => 'Een sportieve comment van de schrijver',
            //        'categories' => 'Sport',
                    'premium' => 0,
                    'writer_id' => 1,
                    'created_at' => date("Y-m-d H:i:s")                ]
            
            ]
            
            ); 
        DB::table('comments')->insert([
        [
            'id' => 1,
            'user_id' => 1,
            'blog_id' => 1,
            'commentbody' => 'Hi',
        ],
        [
            'id' => 2,
            'user_id' => 1,
            'blog_id' => 2,
            'commentbody' => 'Hoi',
        ],
        [
            'id' => 3,
            'user_id' => 2,
            'blog_id' => 1,
            'commentbody' => 'Hoi2',
        ],
        [
            'id' => 4,
            'user_id' => 2,
            'blog_id' => 2,
            'commentbody' => 'Hi2',
        ]
    ]);


    DB::table('categorie_weblog')->insert([
        [
            'weblog_id' => 1,
            'categorie_id' => 3,
        ],

        [
            'weblog_id' => 2,
            'categorie_id' => 1,
        ], 
        [
            'weblog_id' => 3,
            'categorie_id' => 2,
        ],
        [
            'weblog_id' => 4,
            'categorie_id' => 4,
        ],
        [
            'weblog_id' => 5,
            'categorie_id' => 1,
        ],
        [
            'weblog_id' => 6,
            'categorie_id' => 3,
        ],
        [
            'weblog_id' => 7,
            'categorie_id' => 2,
        ],
        [
            'weblog_id' => 8,
            'categorie_id' => 4,
        ],
    ]);
    }
}
