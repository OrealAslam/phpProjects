<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 5,
            ],
            [
                'name'        => 'User',
                'slug'        => 'user',
                'description' => 'User Role',
                'level'       => 1,
            ],
            [
                'name'        => 'Unverified',
                'slug'        => 'unverified',
                'description' => 'Unverified Role',
                'level'       => 0,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name'          => $RoleItem['name'],
                    'slug'          => $RoleItem['slug'],
                    'description'   => $RoleItem['description'],
                    'level'         => $RoleItem['level'],
                ]);
            }
        }

        $adminRole = config('roles.models.role')::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '',
            'level' => 5,
        ]);
        
        $moderatorRole = config('roles.models.role')::create([
            'name' => 'Forum Moderator',
            'slug' => 'forum.moderator',
        ]);

        $user = config('roles.defaultUserModel')::find($id);

        $user->attachRole($adminRole); // you can pass whole object, or just an id
        $user->detachRole($adminRole); // in case you want to detach role
        $user->detachAllRoles(); // in case you want to detach all roles
        $user->syncRoles($roles); // you can pass Eloquent collection, or just an array of ids
            }
}
