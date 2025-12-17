<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Organization\StoreOrganization;
use App\Http\Requests\Organization\DeleteOrganization;
use App\Models\Organization;
use App\DTOs\OrganizationDTO;
use App\Actions\Organization\StoreOrganizationAction;
use App\Actions\Organization\DeleteOrganizationAction;
use App\Actions\Organization\UpdateOrganizationAction;
use App\Http\Requests\Organization\UpdateOrganization;


class OrganizationController extends Controller
{
    public function index()
    {
        // On récupère l'organisation ici, c'est plus poli 🙂
        $organization = null;

        foreach (auth()->user()->organizations as $org) {
            if ($org->id === session('current_organization_id')) {
                $organization = $org;
            }
        }

        $organizations = auth()->user()->organizations;

        // On envoie la variable à la vue via compact()
        return view('organization.index', compact('organization', 'organizations'));
    }

    public function formView()
    {
        return view('organization.create');
    }

    public function formRename()
    {
        return view('organization.rename');
    }

    public function switch(Organization $organization)
    {
        session(['current_organization_id' => $organization->id]);

        return redirect()->route('organization.index');
    }

    public function store(StoreOrganization $request, StoreOrganizationAction $action)
    {
        $dto = OrganizationDTO::fromRequest($request);
        $action->handle($dto);
      
        return redirect()->route('organization.create');
    }

    public function delete(Organization $organization, DeleteOrganizationAction $action)
    {
        $action->handle($organization);
    
        return redirect()->route('organization.index');
    }

    public function rename(UpdateOrganization $request, UpdateOrganizationAction $action)
    {
        $dto = OrganizationDTO::fromRequest($request);
        $action->handle($dto);
      
        return redirect()->route('organization.rename');
    }
}
