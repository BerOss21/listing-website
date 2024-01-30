<?php

namespace App\Http\Controllers\Admin;

use App\Models\Claim;
use App\DataTables\ClaimsDataTable;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ClaimController extends Controller
{
    public function index(ClaimsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.claims.index');
    }

    public function destroy(Claim $claim)
    {
        $claim->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Claim deleted successfully');

        return back();
    }
}
