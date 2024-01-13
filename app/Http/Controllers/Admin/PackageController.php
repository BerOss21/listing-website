<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Http\Controllers\Controller;
use App\DataTables\PackagesDataTable;
use App\Enums\PackageType;
use App\Http\Requests\Admin\PackageRequest;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\returnSelf;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Package::class, 'package');
    }

    public function index(PackagesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.packages.index');
    }

    public function create()
    {
        $types=PackageType::cases();

        return view('admin.dashboard.sections.packages.create',compact('types'));
    }

    public function store(PackageRequest $request)
    {
        Package::create($request->validated());

        toastr()->success('Package has been created successfully!');

         return to_route('admin.sections.packages.index');

    }

    public function edit(Package $package)
    {
        $types=PackageType::cases();

        return view('admin.dashboard.sections.packages.edit',compact('package','types'));
    }

    public function update(PackageRequest $request, Package $package)
    {
        $package->update($request->validated());

        toastr()->success('Package has been updated successfully!');

         return to_route('admin.sections.packages.index');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Package has been updated successfully!');

         return to_route('admin.sections.packages.index');
    }
}
