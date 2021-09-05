<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Operacion\BulkDestroyOperacion;
use App\Http\Requests\Admin\Operacion\DestroyOperacion;
use App\Http\Requests\Admin\Operacion\IndexOperacion;
use App\Http\Requests\Admin\Operacion\StoreOperacion;
use App\Http\Requests\Admin\Operacion\UpdateOperacion;
use App\Models\Operacion;
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
use App\Models\Cliente;

class OperacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexOperacion $request
     * @return array|Factory|View
     */
    public function index(IndexOperacion $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Operacion::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idcliente', 'total'],

            // set columns to searchIn
            ['id', 'total'],

            function ($query) use ($request) {
                $query->with(['cliente']);
                if($request->has('cliente')){
                    $query->whereIn('idcliente', $request->get('cliente'));                    
                }
            }
        );


        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data,'clientes' => Cliente::all()];
        }

        return view('admin.operacion.index', [
            'data' => $data,
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.operacion.create');

        return view('admin.operacion.create',[ 'cliente' => Cliente::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOperacion $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreOperacion $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['idcliente'] = $request->getIdCliente();
        // Store the Operacion
        $operacion = Operacion::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/operacions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/operacions');
    }

    /**
     * Display the specified resource.
     *
     * @param Operacion $operacion
     * @throws AuthorizationException
     * @return void
     */
    public function show(Operacion $operacion)
    {
        $this->authorize('admin.operacion.show', $operacion);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Operacion $operacion
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Operacion $operacion)
    {
        $this->authorize('admin.operacion.edit', $operacion);


        return view('admin.operacion.edit', [
            'operacion' => $operacion,
            'cliente' => Cliente::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOperacion $request
     * @param Operacion $operacion
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateOperacion $request, Operacion $operacion)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['idcliente'] = $request->getIdCliente();
        // Update changed values Operacion
        $operacion->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/operacions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/operacions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyOperacion $request
     * @param Operacion $operacion
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyOperacion $request, Operacion $operacion)
    {
        $operacion->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyOperacion $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyOperacion $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Operacion::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
