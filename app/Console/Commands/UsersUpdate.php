<?php

namespace Myjob\Console\Commands;

use Illuminate\Console\Command;

class UsersUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usersupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $uid = 223744;

        $host = 'ldaps://ldap.epfl.ch';
        $port = 636;
        $base = 'o=epfl,c=ch';

        $connection = ldap_connect($host, $port);

        // Authentification
        $bind = ldap_bind($connection);

        $searchResults = ldap_search($connection, $base, "uid=" . $uid,
            [
                'sn', // Surname
                'givenName', // First name
                'uid', // Sciper ??
                'ou', // LDAP path
                'uniqueidentifier', // Sciper
                'edupersonaffiliation', // eg: student
                'mail'
            ]);

        $entries = ldap_get_entries($connection, $searchResults);

        print_r($entries);
    }
}
