<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Certificate;
class CertificateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.myhr.certificate');
    }
    public function create(){
        return view('user.myhr.certificate-new');
    }
    public function detail(Certificate $certificate){
        return view('user.myhr.certificate-detail',compact('certificate'));
    }
}
