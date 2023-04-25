<?php

namespace HexGad\Domains\Http\Controllers;

use HexGad\Domains\Models\Domain;
use HexGad\Domains\Http\DataTables\DomainsDataTable;
use HexGad\Domains\Http\Requests\StoreDomainsRequest;
use HexGad\Domains\Http\Requests\UpdateDomainsRequest;
use App\Exceptions\ApiException;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param DomainsDataTable $datatable
     * @return Renderable|JsonResponse
     */
    public function index(DomainsDataTable $datatable): Renderable|JsonResponse
    {
        return $datatable->render('domains::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('domains::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDomainsRequest $request
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function store(StoreDomainsRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['zone_id'] = Str::random(60);
        $data['status'] = 'pending';

        if($domain = Domain::create($data))
            return response()->json($domain);

        throw new ApiException;
    }

    /**
     * Show the specified resource.
     *
     * @param Domain $domain
     *
     * @return Renderable
     */
    public function show(Domain $domain): Renderable
    {
        return view('domains::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Domain $domain
     *
     * @return Renderable
     */
    public function edit(Domain $domain): Renderable
    {
        return view('domains::edit', compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDomainsRequest $request
     * @param Domain $domain
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function update(UpdateDomainsRequest $request, Domain $domain): JsonResponse
    {
        $data = $request->validated();
        $data['zone_id'] = Str::random(60);
        $data['status'] = 'pending';


        if($domain->update($data))
            return response()->json($domain);

        throw new ApiException;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Domain $domain
     *
     * @return JsonResponse
     * @throws ApiException
     */
    public function destroy(Domain $domain): JsonResponse
    {
        if($domain->delete())
            return response()->json($domain);

        throw new ApiException;
    }
}
