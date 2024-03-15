<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CampaignRepository;
use App\Repositories\DashboardRepository;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
     /**
     * @var CampaignRepository
     */
    public CampaignRepository $campaignRepo;
       /* @var DashboardRepository */
       private DashboardRepository $dashboardRepository;
       /**
        * UserController constructor.
        *
        * @param  CampaignRepository  $campaignRepository
        * @param  DashboardRepository  $dashboardRepo
        */
       public function __construct(CampaignRepository $campaignRepository,DashboardRepository $dashboardRepo)
       {
           $this->campaignRepo = $campaignRepository;
           $this->dashboardRepository = $dashboardRepo;
       }
    //
    public function index()
    {
        $users = User::role('user')->latest()
                        ->take(4)
                        ->get();
        $data = $this->dashboardRepository->getUserDashboardData();
        return view('user.home.index',compact('data','users'));
    }

    public function store(Request $request){}

    public function show($id){}
}
