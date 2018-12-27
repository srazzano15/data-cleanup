<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CsvData;
use App\ImportData;
use App\CompData;
use App\Http\Requests\CsvImportRequest;
use Redirect;

class ImportController extends Controller
{
    /**
     * First set of functions for "Control file" parse & import
     */

    public function getControl()
    {
        return view('control.index');
    }

    public function parseControl(CsvImportRequest $request)
    {
        $path = $request->file('control_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        $csv_data_file = CsvData::create([
            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
            'csv_header' => $request->has('header'),
            'csv_data' => json_encode($data)
        ]);

        $csv_data = array_slice($data, 0, 2);
        return view('import.import_fields', compact('csv_data', 'csv_data_file'));
    }

    public function processControl(Request $request)
    {
    $data = CsvData::find($request->csv_data_file_id);
    $csv_data = json_decode($data->csv_data, true);
    foreach ($csv_data as $row) {
        $import = new ImportData();
        foreach (config('app.db_fields') as $index => $field) {
            $import->$field = $row[$request->fields[$index]];
        }
        $import->save();
    }

    return redirect('/home');
    }

    /**
     * Second set of functions for "Compare file" parse & import
     */

    public function getImport()
    {
        return view('import.index');
    }

    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        $csv_data_file = CsvData::create([
            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
            'csv_header' => $request->has('header'),
            'csv_data' => json_encode($data)
        ]);

        $csv_data = array_slice($data, 0, 2);
        return view('import.import_fields', compact('csv_data', 'csv_data_file'));
    }

    public function processImport(Request $request)
    {
    $data = CsvData::find($request->csv_data_file_id);
    $csv_data = json_decode($data->csv_data, true);
    foreach ($csv_data as $row) {
        $import = new ImportData();
        foreach (config('app.db_fields') as $index => $field) {
            $import->$field = $row[$request->fields[$index]];
        }
        $import->save();
    }

    return redirect('/home');
    }


}

