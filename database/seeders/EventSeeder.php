<?php
# @Date:   2020-11-30T11:43:14+00:00
# @Last modified time: 2020-11-30T12:14:52+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //monday
        $event = new Event();
        $event->title = "Meeting with supervisor";
        $event->start = "2020-11-30T09:30:00";
        $event->end = "2020-11-30T10:30:00";
        $event->status = "ongoing";
        $event->save();

        $event = new Event();
        $event->title = "Interim Presentation";
        $event->start = "2020-11-30T15:30:00";
        $event->end = "2020-11-30T16:30:00";
        $event->status = "ongoing";
        $event->save();

        //tuesday
        $event = new Event();
        $event->title = "WAF";
        $event->start = "2020-12-01T09:00:00";
        $event->end = "2020-12-01T11:00:00";
        $event->status = "ongoing";
        $event->save();

        $event = new Event();
        $event->title = "Interactice Graphics";
        $event->start = "2020-12-01T11:00:00";
        $event->end = "2020-12-01T13:00:00";
        $event->status = "ongoing";
        $event->save();

        $event = new Event();
        $event->title = "Business & Entrepreneurship";
        $event->start = "2020-12-01T14:00:00";
        $event->end = "2020-12-01T15:00:00";
        $event->status = "ongoing";
        $event->save();

        //wednesday
        $event = new Event();
        $event->title = "Interactice Graphics";
        $event->start = "2020-12-02T12:00:00";
        $event->end = "2020-12-02T13:00:00";
        $event->status = "ongoing";
        $event->save();

        //thursday
        $event = new Event();
        $event->title = "Interaction Design";
        $event->start = "2020-12-03T09:00:00";
        $event->end = "2020-12-03T10:00:00";
        $event->status = "ongoing";
        $event->save();

        $event = new Event();
        $event->title = "Computer Networks";
        $event->start = "2020-12-03T11:00:00";
        $event->end = "2020-12-03T12:00:00";
        $event->status = "ongoing";
        $event->save();

        $event = new Event();
        $event->title = "Business & Entrepreneurship";
        $event->start = "2020-12-03T14:00:00";
        $event->end = "2020-12-03T15:00:00";
        $event->status = "ongoing";
        $event->save();

        //friday
        $event = new Event();
        $event->title = "Computer Networks";
        $event->start = "2020-12-04T12:00:00";
        $event->end = "2020-12-04T14:00:00";
        $event->status = "ongoing";
        $event->save();

        $event = new Event();
        $event->title = "Interaction Design";
        $event->start = "2020-12-04T14:30:00";
        $event->end = "2020-12-04T16:30:00";
        $event->status = "ongoing";
        $event->save();
    }
}
