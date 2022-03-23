<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleDemoRequest;
use App\Repositories\IndustryTypeRepository;
use App\Repositories\ScheduleDemoRepository;
use Illuminate\Http\Request;

class ScheduleDemoController extends Controller
{
    /**
     * @var ScheduleDemoRepository
     */
    public $scheduleDemoRepository;

    public function __construct(ScheduleDemoRepository $scheduleDemoRepository)
    {
        $this->scheduleDemoRepository = $scheduleDemoRepository;
    }


    public function index(IndustryTypeRepository $industryTypeRepository)
    {
        $industryTypes = $industryTypeRepository->getIndustryTypes()->get(['id', 'name']);

        $employee_size = config('constant.EMPLOYEE_SIZE');

        return view('web.client.demo_request', compact('industryTypes','employee_size'));
    }


    public function store(ScheduleDemoRequest $scheduleDemoRequest)
    {
        $store = $this->scheduleDemoRepository->store($scheduleDemoRequest);

        if ($store) {
            return redirect()
                ->route('web.home')
                ->with('success', 'Your Schedule Request Submitted Successfully. Notify By Email Or Contact No');
        }
        return redirect()
            ->route('web.home')
            ->with('failed', 'Something Went Wrong');

    }
}
