<?php

use Illuminate\Database\Seeder;
use App\Notification;
use App\Employee;
class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emp1 = Employee::find(1);
        $notification = new Notification();
        $notification->employee_id=$emp1->id;
        $notification->total=1;
        $notification->name=' new Request has been Approved';
        $notification->icon='fa-check-circle text-green';
        $notification->save();

        $notification = new Notification();
        $notification->employee_id=$emp1->id;
        $notification->total=2;
        $notification->name=' new Request has been Rejected';
        $notification->icon='fa-times-circle text-red';
        $notification->save();
    }
}
