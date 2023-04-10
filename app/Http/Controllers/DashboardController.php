<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\JenisPembayaran;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:dashboard', ['only'=> 'dashboard']);
    // }

    public function home(Request $request)
    {
        $data['title'] = 'Rental Mobil Indramayu';
        $data['header'] = 'Siffa World';
        $data['mobil'] = Mobil::get();
        $data['jenis'] = JenisPembayaran::get();
      
        return view('home.home', $data);
    }
    public function dashboard(Request $request)
    {
        $data['page_title'] = 'Dashboard';
        $data['breadcumb'] = 'Dashboard';

      
        return view('dashboard.index', $data);
    }


  
}
