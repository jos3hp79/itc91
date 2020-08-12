<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Consulta\BulkDestroyConsulta;
use App\Http\Requests\Admin\Consulta\DestroyConsulta;
use App\Http\Requests\Admin\Consulta\IndexConsulta;
use App\Http\Requests\Admin\Consulta\StoreConsulta;
use App\Http\Requests\Admin\Consulta\UpdateConsulta;
use App\Models\Consulta;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ConsultasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexConsulta $request
     * @return array|Factory|View
     */
    public function index(IndexConsulta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Consulta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'Nombre', 'Telefono', 'edad', 'Fechadecita'],

            // set columns to searchIn
            ['id', 'Nombre', 'Telefono']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.consulta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.consulta.create');

        return view('admin.consulta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConsulta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreConsulta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Consulta
        $consultum = Consulta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/consultas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/consultas');
    }

    /**
     * Display the specified resource.
     *
     * @param Consulta $consultum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Consulta $consultum)
    {
        $this->authorize('admin.consulta.show', $consultum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Consulta $consultum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Consulta $consultum)
    {
        $this->authorize('admin.consulta.edit', $consultum);


        return view('admin.consulta.edit', [
            'consultum' => $consultum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConsulta $request
     * @param Consulta $consultum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateConsulta $request, Consulta $consultum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Consulta
        $consultum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/consultas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/consultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyConsulta $request
     * @param Consulta $consultum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyConsulta $request, Consulta $consultum)
    {
        $consultum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyConsulta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyConsulta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Consulta::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
