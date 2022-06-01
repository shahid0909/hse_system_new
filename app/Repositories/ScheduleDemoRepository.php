<?php

namespace App\Repositories;

use App\Http\Requests\ScheduleDemoRequest;
use App\Models\ScheduleDemo;
use Illuminate\Support\Carbon;


class ScheduleDemoRepository
{

    public function scheduleDemos($company_name = null,$industry_type_id = null,$meeting_date = null)
    {
        $demoRequests = ScheduleDemo::query();

        $demoRequests->when(!empty($company_name), function ($demoRequests) use ($company_name) {
            $demoRequests->where('company_name', 'LIKE', "%{$company_name}%");
        });

        $demoRequests->when(!empty($industry_type_id), function ($demoRequests) use ($industry_type_id) {
            $demoRequests->where('$industry_type_id', $industry_type_id);
        });

        $demoRequests->when(!empty($meeting_date), function ($demoRequests) use ($meeting_date) {
            $demoRequests->wherDate('meeting_date', $meeting_date);
        });

        return $demoRequests;
    }



    public function store($request)
    {
        return ScheduleDemo::firstOrCreate([
            'email_address' => $request->email_address,
            'contact_no' => $request->contact_no
        ], [
            'industry_type_id' => $request->industry_type_id,
            'company_name' => $request->company_name,
            'number_of_employees' => $request->number_of_employees,
            'person_incharge' => $request->person_incharge,
            'designation' => $request->designation,
            'meeting_date' => $request->meeting_date,
            'meeting_time' => $request->meeting_time
        ]);
    }
}