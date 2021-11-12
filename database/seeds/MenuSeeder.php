<?php

use App\MappingMenu;
use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder {
    public function run() {
        $menu = [
            [
                'id' => 1,
                'name' => 'Dashboard',
                'url' => 'dashboard',
                'icon' => 'fa-igloo'
            ],
            [
                'id' => 2,
                'name' => 'Manage Chat',
                'url' =>  'chats',
                'icon' => 'fa-certificate'
            ],
            [
                'id' => 3,
                'name' => 'Manage Psikolog',
                'url' =>  'psikologs',
                'icon' => 'fa-tools'
            ],
        ];

        Menu::insert($menu);

        $mapping_menu = [
            [
                'menus' => [
                    1, 2, 3
                ],
                'roles' => [1, 2]
            ],
        ];

        foreach ($mapping_menu as $i => $val) {
            foreach ($val['roles'] as $x => $role) {
                foreach ($val['menus'] as $y => $menu) {
                    MappingMenu::create([
                        'role_id' => $role,
                        'menu_id' => $menu
                    ]);
                }
            }
        }
    }
}
