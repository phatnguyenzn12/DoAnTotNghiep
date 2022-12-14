<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                'name' => 'lead',
                'guard_name' => 'mentor',
            ]
        );
        Role::create(
           [
                'name' => 'teacher',
                'guard_name' => 'mentor',
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
                'email' => 'backend@example.com',
                'password' => '$2a$12$7jg/HO6Q2c1.gxdxBNwKcur.IHdWRpsDARlgLM.LOPWcRnkc/R79m',
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => '012345678',
                'about_me' => fake()->text(100),
                'education' => 'cao đẳng fpt,trung tâm fpt',
                'location' => 'hà nội',
            ],
            [
                'name' => fake()->name(),
                'email' => 'frontend@example.com',
                'password' => '$2a$12$7jg/HO6Q2c1.gxdxBNwKcur.IHdWRpsDARlgLM.LOPWcRnkc/R79m',
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => '012345678',
                'about_me' => fake()->text(100),
                'education' => 'cao đẳng fpt,trung tâm fpt',
                'location' => 'hà nội',
            ],
            [
                'name' => fake()->name(),
                'email' => 'teacher@example.com',
                'password' => '$2a$12$7jg/HO6Q2c1.gxdxBNwKcur.IHdWRpsDARlgLM.LOPWcRnkc/R79m',
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => '012345678',
                'about_me' => fake()->text(100),
                'education' => 'cao đẳng fpt,trung tâm fpt',
                'location' => 'hà nội',
            ],
            [
                'name' => fake()->name(),
                'email' => 'student@example.com',
                'password' => '$2a$12$7jg/HO6Q2c1.gxdxBNwKcur.IHdWRpsDARlgLM.LOPWcRnkc/R79m',
                'avatar' => 'images/avatar_icon.jpg',
                'number_phone' => '012345678',
                'about_me' => fake()->text(100),
                'education' => 'cao đẳng fpt,trung tâm fpt',
                'location' => 'hà nội',
            ],
        ];
        DB::table('users')->insert($users);
        //    ---create roles for users---
        // foreach ($users as $userItem) {
        //     switch ($userItem['email']) {
        //         case 'manager@example.com':
        //             $mentorSetRole = Mentor::where('email', 'backend@example.com')->first();
        //             $mentorSetRole->assignRole('lead');
        //             break;
        //         case 'teacher@example.com':
        //             $mentorSetRole = Mentor::where('email', 'frontend@example.com')->first();
        //             $mentorSetRole->assignRole('teacher');
        //             break;
        //     }
        // }
    }
}
