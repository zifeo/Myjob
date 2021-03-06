<?php

namespace Myjob\Console\Commands;

use Illuminate\Console\Command;
use Myjob\Agepinfo\LDAP;
use Myjob\Models\User;

use Log;

class SyncLDAPStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncstudents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronise the student list stored in the '.
        'database with the students found in the LDAP.';

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
        // Get students from LDAP
        try {
            $LDAPStudents = LDAP::getAllStudents();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return;
        }

        $totalStudentsCount = count($LDAPStudents);

        if ($totalStudentsCount == 0) {
            Log::error("LDAP student query returned zero students");
        }

        $newUsersCount = 0;
        $UserBecomeStudentCount = 0;
        $UserUnbecomeStudentCount = 0;


        // Process existing users by chunk, to sync the DB with the LDAP
        User::chunk(200, function($users) use (
            &$LDAPStudents,
            &$UserBecomeStudentCount,
            &$UserUnbecomeStudentCount) {

            foreach ($users as $user) {
                // If user is a student in LDAP
                if (isset($LDAPStudents[$user->sciper])) {
                    // Update student infos
                    $LDAPUser = $LDAPStudents[$user->sciper];

                    $user->first_name = $LDAPUser->first_name;
                    $user->last_name = $LDAPUser->last_name;
                    $user->email = $LDAPUser->email;

                    // If user is not a student in DB
                    if (!$user->is_student) {
                        $user->is_student = TRUE;
                        $UserBecomeStudentCount += 1;
                    }

                    /* Remove student from the LDAPStudents list
                    to only keep the new students */
                    unset($LDAPStudents[$user->sciper]);
                }
                // If user is not a student in LDAP
                else {
                    // If user is a student in DB
                    if ($user->is_student) {
                        $user->is_student = FALSE;
                        $UserUnbecomeStudentCount += 1;
                    }
                }

                $user->save();
            }
        });

        /* Now LDAPStudents only contains the new students.
        Add them to the database */
        foreach ($LDAPStudents as $sciper => $newUser) {
            // Create a new entry in the DB
            Log::info('New student ' . $sciper);
            $newUser->save();
            $newUsersCount += 1;
        }

        // Log debug informations
        Log::info('Total number of students found in LDAP: ' . $totalStudentsCount);
        Log::info('Number of new users (students): ' . $newUsersCount);
        Log::info('Number of students unbecoming students: ' . $UserUnbecomeStudentCount);
        Log::info('Number of non-students becoming students ' . $UserBecomeStudentCount);

    }
}
