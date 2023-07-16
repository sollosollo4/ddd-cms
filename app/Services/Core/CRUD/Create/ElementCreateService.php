<?php

namespace App\Services\Core\CRUD\Create;

use App\Contracts\DataContract;
use App\Http\Request\Forms\BaseForm;
use App\Repositories\Core\Element\ElementRepositoryContract;
use App\Services\Core\CRUD\DataTransferObjects\ElementCreateData;
use App\Services\Core\CRUD\ServiceCrudExecuteContract;

class ElementCreateService implements ServiceCrudExecuteContract
{
    public function __construct(private ElementRepositoryContract $elementRepository)
    {

    }

    public function execute(BaseForm $request): DataContract
    {
        $data = $request->validate($request->rules());
        $model = $this->elementRepository->save($data);
        return new ElementCreateData(
            id: $model->id,
            created_at: $model->created_at,
            updated_at: $model->updated_at
        );
    }
}
