<?php

namespace App\Http\Controllers;

use App\Constants\AuthenticationProvider;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return $this->sendResponse(
            auth(AuthenticationProvider::WEB)->user()
        );
    }
}
