<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DeletedRecordController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::onlyTrashed()->get();
        return view('deleted_records.index', compact('patients'));
    }

    public function restore($id)
    {
        $patient = Patient::onlyTrashed()->find($id);
        $patient->restore();
        return redirect()->route('deleted_records');
    }

    public function force_delete($id)
    {
        $patient = Patient::onlyTrashed()->find($id);
        $patient->forceDelete();
        return redirect()->route('deleted_records');
    }
}
