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
            'role-validate',
            'role-delete',

            'user-create',
            'user-list',
            'user-validate',
            'user-delete',


            'demande_de_poste_a_quai-list',
            'demande_de_poste_a_quai-create',
            'demande_de_poste_a_quai-validate',
            'demande_de_poste_a_quai-delete',

            'demande_de_mise_a_quai-list',
            'demande_de_mise_a_quai-create',
            'demande_de_mise_a_quai-validate',
            'demande_de_mise_a_quai-delete',

            'cpn-list',
            'cpn-create',
            'cpn-validate',
            'cpn-delete',

            'manifeste-list',
            'manifeste-create',
            'manifeste-validate',
            'manifeste-delete',


            'bon_de_commande-list',
            'bon_de_commande-create',
            'bon_de_commande-validate',
            'bon_de_commande-delete',

            'bon_a_enlever-list',
            'bon_a_enlever-create',
            'bon_a_enlever-validate',
            'bon_a_enlever-delete',

            'bon_a_delivrer-list',
            'bon_a_delivrer-create',
            'bon_a_delivrer-validate',
            'bon_a_delivrer-delete',

            'annonce_navire-list',
            'annonce_navire-create',
            'annonce_navire-validate',
            'annonce_navire-delete'
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
        $role->syncPermissions('annonce_navire-list','annonce_navire-validate','demande_de_poste_a_quai-list','annonce_navire-delete');

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'CSSMM',
            'email' => 'cssmm@example.com',
        ]);

        $admin->assignRole('CSSMM');



        // création de role et permission pour Préséednt de la CPN
        $role = Role::create(['name' => 'PCPN']);
        $role->syncPermissions('demande_de_poste_a_quai-list',
            'demande_de_poste_a_quai-validate',
            'demande_de_poste_a_quai-delete',
            'cpn-list',
            'cpn-create',
            'cpn-validate',
            'cpn-delete');

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'PCPN',
            'email' => 'pcpn@example.com',
        ]);

        $admin->assignRole('PCPN');



        // création de role et permission pour Chef de section traitement navire
        $role = Role::create(['name' => 'CSTN']);
        $role->syncPermissions('manifeste-list',
            'manifeste-validate',
            'bon_de_commande-list',
            'bon_de_commande-validate'
            );

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'CSTN',
            'email' => 'cstn@example.com',
        ]);

        $admin->assignRole('CSTN');



        // création de role et permission pour Chef de section de pointage
        $role = Role::create(['name' => 'CSP']);
        $role->syncPermissions('bon_a_enlever-list',
            'bon_a_enlever-validate',
            'bon_a_enlever-delete',

            'bon_a_delivrer-list',
            'bon_a_delivrer-validate',

            'demande_de_mise_a_quai-list',
            'demande_de_mise_a_quai-validate');


        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'CSP',
            'email' => 'csp@example.com',
        ]);

        $admin->assignRole('CSP');



        // création de role et permission pour le Transitaire
        $role = Role::create(['name' => 'Transitaire']);
        $role->syncPermissions('demande_de_poste_a_quai-list',
            'demande_de_poste_a_quai-create',
            'demande_de_poste_a_quai-delete',

            'cpn-list',

            'bon_de_commande-list',
            'bon_de_commande-create',
            'bon_de_commande-delete',

            'bon_a_enlever-list',

            'bon_a_delivrer-list',
            'bon_a_delivrer-create',
            'bon_a_delivrer-delete',


            'demande_de_mise_a_quai-list',
            'demande_de_mise_a_quai-create',
            'demande_de_mise_a_quai-delete');
        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'Transitaire',
            'email' => 'transitaire@example.com',
        ]);

        $admin->assignRole('Transitaire');



        // création de role et permission pour le Consignatiare
        $role = Role::create(['name' => 'Consignataire']);
        $role->syncPermissions('annonce_navire-list',
            'annonce_navire-create',
            'annonce_navire-delete',
            'manifeste-list',
            'manifeste-create',
            'manifeste-delete'
        );

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'Consignataire',
            'email' => 'consignataire@example.com',
        ]);

        $admin->assignRole('Consignataire');







    }
}
