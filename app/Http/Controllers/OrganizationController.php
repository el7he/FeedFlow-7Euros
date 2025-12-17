<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Organization\StoreOrganization;
use App\Models\Organization;
use App\DTOs\OrganizationDTO;
use App\Actions\Organization\StoreOrganizationAction;

class OrganizationController extends Controller
{
    public function index()
    {
        return view('organization.index');
    }

    public function formView()
    {
        return view('organization.create');
    }

    public function switch(Organization $organization)
    {
        session(['current_organization_id' => $organization->id]);

        return redirect()->route('dashboard');
    }

    public function store(StoreOrganization $request, StoreOrganizationAction $action)
    {
        $dto = OrganizationDTO::fromRequest($request);
        $action->handle($dto);
      
        return redirect()->route('organization.create');
    }
}
