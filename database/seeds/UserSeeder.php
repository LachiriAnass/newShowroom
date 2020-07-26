<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "Anass",
                'email' => 'anass@gmail.com',
                'password' => bcrypt('anass'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "imad",
                'email' => 'imad@gmail.com',
                'password' => bcrypt('imad'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "yassir",
                'email' => 'yassir@gmail.com',
                'password' => bcrypt('yassir'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],[
                'name' => "mohamed",
                'email' => 'mohamed@gmail.com',
                'password' => bcrypt('mohamed'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "fatima",
                'email' => 'fatima@gmail.com',
                'password' => bcrypt('fatima'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "alaa",
                'email' => 'alaa@gmail.com',
                'password' => bcrypt('alaa'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "achraf",
                'email' => 'achraf@gmail.com',
                'password' => bcrypt('achraf'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "marwan",
                'email' => 'marwan@gmail.com',
                'password' => bcrypt('marwan'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "morad",
                'email' => 'morad@gmail.com',
                'password' => bcrypt('morad'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "said",
                'email' => 'said@gmail.com',
                'password' => bcrypt('said'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "kamal",
                'email' => 'kamal@gmail.com',
                'password' => bcrypt('kamal'),
                'created_at' => new DateTime,
                'updated_at' => null,
                'votes_average' => 0
            ],[
                'name' => "ahmed",
                'email' => 'ahmed@gmail.com',
                'password' => bcrypt('ahmed'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "zakaria",
                'email' => 'zakaria@gmail.com',
                'password' => bcrypt('zakaria'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "abdelah",
                'email' => 'zakabdelaharia@gmail.com',
                'password' => bcrypt('abdelah'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],[
                'name' => "walid",
                'email' => 'walid@gmail.com',
                'password' => bcrypt('walid'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'votes_average' => 0
            ],
        ];

        //DB::table('users')->insert($users);

        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
            'votes_average' => 0,
            'created_at' => new DateTime,
            'updated_at' => null,
        ]);

        for($i=0; $i<=20; $i++):

                DB::table('users')->insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' => Hash::make('password'),
                    'votes_average' => 0,
                    'created_at' => new DateTime,
                    'updated_at' => null,
                ]);
        endfor;
    }
}
