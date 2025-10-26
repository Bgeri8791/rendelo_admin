<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        $query = Patients::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $terms = explode(' ', $search);

            $query->where(function ($q) use ($terms) {
                foreach ($terms as $word) {
                    $q->where(function ($sub) use ($word) {
                        $word = '%' . $word . '%';
                        $sub->where('first_name', 'LIKE', $word)
                            ->orWhere('last_name', 'LIKE', $word)
                            ->orWhere('email', 'LIKE', $word)
                            ->orWhere('phone', 'LIKE', $word)
                            ->orWhere('id_number', 'LIKE', $word);
                    });
                }
            });
        }

        $patients = $query
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->paginate(10);

        return view('patients.index', compact('patients'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientsRequest $request)
    {
        $data = $request->validated();
        Patients::create($data);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Páciens sikeresen létrehozva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patients $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patients $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patients $patient)
    {
        $data = $request->validated();
        $patient->update($data);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Páciens adatai frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patients $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Páciens sikeresen törölve.');
    }
    public function updateStatus(Request $request, Patients $patient)
    {
        $request->validate([
            'is_active' => 'required|boolean'
        ]);

        $patient->is_active = $request->is_active;
        $patient->save();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Státusz frissítve.');
    }
}
