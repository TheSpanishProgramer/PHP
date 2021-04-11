<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'test1(Admin)',
            'avatar' => '/images/default.jpg',
            'email' => 'test1@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test2',
            'avatar' => '/images/default.jpg',
            'email' => 'test2@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test3',
            'avatar' => '/images/default.jpg',
            'email' => 'test3@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test4',
            'avatar' => '/images/default.jpg',
            'email' => 'test4@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test5',
            'avatar' => '/images/default.jpg',
            'email' => 'test5@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test6',
            'avatar' => '/images/default.jpg',
            'email' => 'test6@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test7',
            'avatar' => '/images/default.jpg',
            'email' => 'test7@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test8',
            'avatar' => '/images/default.jpg',
            'email' => 'test8@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test9',
            'avatar' => '/images/default.jpg',
            'email' => 'test9@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test10',
            'avatar' => '/images/default.jpg',
            'email' => 'test10@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test11',
            'avatar' => '/images/default.jpg',
            'email' => 'test11@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test12',
            'avatar' => '/images/default.jpg',
            'email' => 'test12@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test13',
            'avatar' => '/images/default.jpg',
            'email' => 'test13@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test14',
            'avatar' => '/images/default.jpg',
            'email' => 'test14@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test15',
            'avatar' => '/images/default.jpg',
            'email' => 'test15@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test16',
            'avatar' => '/images/default.jpg',
            'email' => 'test16@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test17',
            'avatar' => '/images/default.jpg',
            'email' => 'test17@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test18',
            'avatar' => '/images/default.jpg',
            'email' => 'test18@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test19',
            'avatar' => '/images/default.jpg',
            'email' => 'test19@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test20',
            'avatar' => '/images/default.jpg',
            'email' => 'test20@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test21',
            'avatar' => '/images/default.jpg',
            'email' => 'test21@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test22',
            'avatar' => '/images/default.jpg',
            'email' => 'test22@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test23',
            'avatar' => '/images/default.jpg',
            'email' => 'test23@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test24',
            'avatar' => '/images/default.jpg',
            'email' => 'test24@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test25',
            'avatar' => '/images/default.jpg',
            'email' => 'test25@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test26',
            'avatar' => '/images/default.jpg',
            'email' => 'test26@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test27',
            'avatar' => '/images/default.jpg',
            'email' => 'test27@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test28',
            'avatar' => '/images/default.jpg',
            'email' => 'test28@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test29',
            'avatar' => '/images/default.jpg',
            'email' => 'test29@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            ['name' => 'test30',
            'avatar' => '/images/default.jpg',
            'email' => 'test30@test.com',
            'password' => Hash::make('hogehoge'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}