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
use App\Models\OrganizationUser;
use App\Actions\Organization\StoreOrganizationMemberAction;
use App\DTOs\OrganizationMemberDTO;
use App\Models\User;
use App\Actions\Organization\AddUserInOrganization;
use App\DTOs\AddUserDTO;


class OrganizationController extends Controller
{
    public function index()
    {
        // On récupère l'organisation ici, c'est plus poli 🙂
        $organization = null;

        // foreach (auth()->user()->organizations as $org) {
        foreach (Organization::all() as $org) {
            if ($org->id === session('current_organization_id')) {
                $organization = $org;
            }
        }

        $organizations = auth()->user()->organizations;

        // On envoie la variable à la vue via compact()
        return view('organization.index', compact('organization', 'organizations'));
    }

    public function all()
    {
        // On récupère l'organisation ici, c'est plus poli 🙂
        $organization = null;
        $joinedOrganizations    = auth()->user()->getOrganizations();
        $availableOrganizations = [];

        // On enlève les organisations de l'utilisateur courant pour les afficher séparément
        foreach (Organization::all() as $key => $org) {
            $searchOrg = $joinedOrganizations->where('id', $org->id)->first();

            if(!$searchOrg) $availableOrganizations[] = $org;
        }

        // On envoie la variable à la vue via compact()
        return view('organization.all', compact('organization', 'joinedOrganizations', 'availableOrganizations'));
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
    
    public function join(Organization $organization, StoreOrganizationMemberAction $action)
    {
        $dto = new OrganizationMemberDTO(organization_id: (int) $organization->id);
        $action->handle($dto);

        return redirect()->route('organization.all');
    }

    public function store(StoreOrganization $request, StoreOrganizationAction $action)
    {
        $dto = OrganizationDTO::fromRequest($request);
        $action->handle($dto);
      
        return redirect()->route('organization.create');
    }

    public function add_user_in_organization(Request $request, AddUserInOrganization $action)
    {
        $dto = AddUserDTO::fromRequest($request);
        $action->handle($dto);
      
        return redirect()->route('organization.index');
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
