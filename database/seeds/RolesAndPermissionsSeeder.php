<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use HasRoles;


    public function run()
    {
        // Reset cached roles and permissions
        //Cache::forget('spatie.permission.cache');
        app()['cache']->forget('spatie.permission.cache');

        //Création des Permissions

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-create',
            'user-list',
            'user-edit',
            'user-delete',


            'dpostequai-list',
            'dpostequai-create',
            'dpostequai-edit',
            'dpostequai-delete',

            'dmisequai-list',
            'dmisequai-create',
            'dmisequai-edit',
            'dmisequai-delete',

            'cpn-list',
            'cpn-create',
            'cpn-edit',
            'cpn-delete',

            'manifest-list',
            'manifest-create',
            'manifest-edit',
            'manifest-delete',


            'bonCommande-list',
            'bonCommande-create',
            'bonCommande-edit',
            'bonCommande-delete',

            'bonEnlever-list',
            'bonEnlever-create',
            'bonEnlever-edit',
            'bonEnlever-delete',

            'bondelivrer-list',
            'bondelivrer-create',
            'bondelivrer-edit',
            'bondelivrer-delete',

            'annonceNav-list',
            'annonceNav-create',
            'annonceNav-edit',
            'annonceNav-delete'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }



//Création des Roles et utilisateurs

        // création de role pour l'administrateur

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($permissions);

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('admin');




        // création de role et permission pour Chef de service de sécurité maritime et mouvement
        $role = Role::create(['name' => 'CSSMM']);
        $role->syncPermissions('annonceNav-list','annonceNav-edit','dpostequai-list','annonceNav-delete');

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'CSSMM',
            'email' => 'cssmm@example.com',
        ]);

        $admin->assignRole('CSSMM');



        // création de role et permission pour Préséednt de la CPN
        $role = Role::create(['name' => 'PCPN']);
        $role->syncPermissions('dpostequai-list',
            'dpostequai-edit',
            'dpostequai-delete',
            'cpn-list',
            'cpn-create',
            'cpn-edit',
            'cpn-delete');

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'PCPN',
            'email' => 'pcpn@example.com',
        ]);

        $admin->assignRole('PCPN');



        // création de role et permission pour Chef de section traitement navire
        $role = Role::create(['name' => 'CSTN']);
        $role->syncPermissions('manifest-list',
            'manifest-edit',
            'bonCommande-list',
            'bonCommande-edit'
            );

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'CSTN',
            'email' => 'cstn@example.com',
        ]);

        $admin->assignRole('CSTN');



        // création de role et permission pour Chef de section de pointage
        $role = Role::create(['name' => 'CSP']);
        $role->syncPermissions('bonEnlever-list',
            'bonEnlever-create',
            'bonEnlever-edit',
            'bonEnlever-delete',

            'bondelivrer-list',
            'bondelivrer-edit',

            'dmisequai-list',
            'dmisequai-edit');


        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'CSP',
            'email' => 'csp@example.com',
        ]);

        $admin->assignRole('CSP');



        // création de role et permission pour le Transitaire
        $role = Role::create(['name' => 'Transitaire']);
        $role->syncPermissions('dpostequai-list',
            'dpostequai-create',
            'dpostequai-edit',
            'dpostequai-delete',

            'cpn-list',

            'bonCommande-list',
            'bonCommande-create',
            'bonCommande-edit',
            'bonCommande-delete',

            'bonEnlever-list',

            'bondelivrer-list',
            'bondelivrer-create',
            'bondelivrer-edit',
            'bondelivrer-delete',


            'dmisequai-list',
            'dmisequai-create',
            'dmisequai-edit',
            'dmisequai-delete');
        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'Transitaire',
            'email' => 'transitaire@example.com',
        ]);

        $admin->assignRole('Transitaire');



        // création de role et permission pour le Consignatiare
        $role = Role::create(['name' => 'Consignataire']);
        $role->syncPermissions('annonceNav-list',
            'annonceNav-create',
            'annonceNav-edit',
            'annonceNav-delete');

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'Consignataire',
            'email' => 'consignataire@example.com',
        ]);

        $admin->assignRole('Consignataire');







    }
}
