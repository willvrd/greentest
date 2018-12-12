<?php

namespace Modules\Greentest\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Greentest\Entities\business;
use Modules\Greentest\Http\Requests\CreatebusinessRequest;
use Modules\Greentest\Http\Requests\UpdatebusinessRequest;
use Modules\Greentest\Repositories\businessRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class businessController extends AdminBaseController
{
    /**
     * @var businessRepository
     */
    private $business;

    public function __construct(businessRepository $business)
    {
        parent::__construct();

        $this->business = $business;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $businesses = $this->business->all();
        return view('greentest::admin.businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('greentest::admin.businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatebusinessRequest $request
     * @return Response
     */
    public function store(CreatebusinessRequest $request)
    {
        $this->business->create($request->all());

        return redirect()->route('admin.greentest.business.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('greentest::businesses.title.businesses')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  business $business
     * @return Response
     */
    public function edit(business $business)
    {
        return view('greentest::admin.businesses.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  business $business
     * @param  UpdatebusinessRequest $request
     * @return Response
     */
    public function update(business $business, UpdatebusinessRequest $request)
    {
        $this->business->update($business, $request->all());

        return redirect()->route('admin.greentest.business.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('greentest::businesses.title.businesses')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  business $business
     * @return Response
     */
    public function destroy(business $business)
    {
        $this->business->destroy($business);

        return redirect()->route('admin.greentest.business.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('greentest::businesses.title.businesses')]));
    }
}
