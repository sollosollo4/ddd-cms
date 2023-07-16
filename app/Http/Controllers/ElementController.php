<?php

namespace App\Http\Controllers;

use App\Http\Request\Forms\BaseForm;
use App\Http\Request\Forms\Element\ElementCreateForm;
use App\Services\Core\CRUD\Create\ElementCreateService;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function __construct(private ElementCreateService $elementCreateService)
    {

    }
    public function store(ElementCreateForm $request)
    {
        return $this->sendResponse(
            $this->elementCreateService->execute($request)
        );
    }
}
