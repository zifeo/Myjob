<?php

namespace Myjob\Console\Commands;

use Illuminate\Console\Command;
use Myjob\Agepinfo\LDAP;
use Myjob\Models\User;

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
        $LDAPStudents = LDAP::getAllStudents();

        //TODO Test the code

        $users = User::all();

        $totalStudentsCount = count($LDAPStudents);

        $newUsersCount = 0;
        $UserBecomeStudentCount = 0;
        $UserUnbecomeStudentCount = 0;


        // Process existing users by chunk, to sync the DB with the LDAP
        $users->chunk(200, function($users) use(
            $UserBecomeStudentCount,
            $UserUnbecomeStudentCount) {

            foreach ($users as $user) {
                // If user is a student in LDAP
                if(isset($LDAPStudents[$user->sciper])) {
                    // Update student infos
                    $LDAPUser = $LDAPStudents[$user->sciper];

                    // TODO Better to check if different before assigning? Same cost?
                    $user->first_name = $LDAPUser->first_name;
                    $user->last_name = $LDAPUser->last_name;
                    $user->email = $LDAPUser->email;

                    // If user is not a student in DB
                    if (!$user->isStudent) {
                        $user->isStudent = TRUE;
                        $UserBecomeStudentCount += 1;
                    }

                    /* Remove student from the LDAPStudents list
                    to only keep the new students */
                    unset($LDAPStudents[$user->sciper]);
                }
                // If user is not a student in LDAP
                else {
                    // If user is a student in DB
                    if($user->isStudent) {
                        $user->isStudent = FALSE;
                        $UserUnbecomeStudentCount += 1;
                    }
                }

                // TODO Should check if value changed first? More efficient?
                $user->save();
            }
        }

        /* Now LDAPStudents only contains the new students.
        Add them to the database */
        foreach ($LDAPStudents as $sciper => $newUser) {
            // Create a new entry in the DB
            $newUser->save();
            $newUsersCount += 1;
        }

        // Print debug informations
        echo 'Total number of students found in LDAP: ' . $totalStudentsCount . '\n';
        echo 'Number of new users(students): ' . $newUsersCount . '\n';
        echo 'Number of students unbecoming students: ' . $UserUnbecomeStudentCount . '\n';
        echo 'Number of non-students becoming students ' . $UserBecomeStudentCount . '\n

    }
}
