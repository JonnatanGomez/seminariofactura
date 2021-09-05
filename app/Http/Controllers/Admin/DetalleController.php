<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Detalle\BulkDestroyDetalle;
use App\Http\Requests\Admin\Detalle\DestroyDetalle;
use App\Http\Requests\Admin\Detalle\IndexDetalle;
use App\Http\Requests\Admin\Detalle\StoreDetalle;
use App\Http\Requests\Admin\Detalle\UpdateDetalle;
use App\Models\Detalle;
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

class DetalleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDetalle $request
     * @return array|Factory|View
     */
    public function index(IndexDetalle $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Detalle::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'idoperacion', 'idproducto'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.detalle.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.detalle.create');

        return view('admin.detalle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDetalle $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDetalle $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Detalle
        $detalle = Detalle::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/detalles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/detalles');
    }

    /**
     * Display the specified resource.
     *
     * @param Detalle $detalle
     * @throws AuthorizationException
     * @return void
     */
    public function show(Detalle $detalle)
    {
        $this->authorize('admin.detalle.show', $detalle);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Detalle $detalle
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Detalle $detalle)
    {
        $this->authorize('admin.detalle.edit', $detalle);


        return view('admin.detalle.edit', [
            'detalle' => $detalle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDetalle $request
     * @param Detalle $detalle
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDetalle $request, Detalle $detalle)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Detalle
        $detalle->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/detalles'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/detalles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDetalle $request
     * @param Detalle $detalle
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDetalle $request, Detalle $detalle)
    {
        $detalle->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDetalle $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDetalle $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Detalle::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
