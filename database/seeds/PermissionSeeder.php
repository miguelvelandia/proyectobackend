<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permisos = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'servicio-list',
            'servicio-create',
            'servicio-edit',
            'servicio-delete',
            'cliente-list',
            'cliente-create',
            'cliente-edit',
            'cliente-delete',
            'especial-list',
            'especial-create',
            'especial-edit',
            'especial-delete',
            'factura-list',
            'factura-create',
            'factura-edit',
            'factura-delete'
        ];

        foreach ($permisos as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
