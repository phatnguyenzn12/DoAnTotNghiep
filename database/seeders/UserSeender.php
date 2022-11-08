<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Role::create(
            [
                'name' => 'admin',
            ]
        );
        Role::create(
            [
                'name' => 'manager',
            ]
        );
        Role::create(
            [
                'name' => 'teacher',
            ]
        );
        Role::create(
            [
                'name' => 'student',
            ]
        );

        //---Permission chưa cần đến phân quyền---

        $users = [
            [
                'name' => fake()->name(),
                'email' => 'admin@example.com',
                'password' => '$2a$12$9ao3yF8jT0qVbBKhHayYYONJiXbv/JOpeMcMoLJqdUtZFQz9r7geu',
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
            ],
            [
                'name' => fake()->name(),
                'email' => 'manager@example.com',
                'password' => '$2a$12$9ao3yF8jT0qVbBKhHayYYONJiXbv/JOpeMcMoLJqdUtZFQz9r7geu',
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
            ],
            [
                'name' => fake()->name(),
                'email' => 'teacher@example.com',
                'password' => '$2a$12$9ao3yF8jT0qVbBKhHayYYONJiXbv/JOpeMcMoLJqdUtZFQz9r7geu',
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
            ],
            [
                'name' => fake()->name(),
                'email' => 'student@example.com',
                'password' => '$2a$12$9ao3yF8jT0qVbBKhHayYYONJiXbv/JOpeMcMoLJqdUtZFQz9r7geu',
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
            ],
        ];

        //---create roles for users---
        foreach ($users as $userItem) {
            $user = User::create($userItem);
            switch ($userItem['email']) {
                case 'admin@example.com':
                    $userSetRole = User::where('email', 'admin@example.com')->first();
                    $userSetRole->assignRole('admin');
                    break;
                case 'manager@example.com':
                    $userSetRole = User::where('email', 'manager@example.com')->first();
                    $userSetRole->assignRole('manager');
                    break;
                case 'teacher@example.com':
                    $userSetRole = User::where('email', 'teacher@example.com')->first();
                    $userSetRole->assignRole('teacher');
                    break;
                case 'student@example.com':
                    $userSetRole = User::where('email', 'student@example.com')->first();
                    $userSetRole->assignRole('student');
                    break;
            }
        }

        
    }
}
