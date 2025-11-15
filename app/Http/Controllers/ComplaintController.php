<?php 
namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        return response()->json(Complaint::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'transaction_id' => 'required|unique:complaints',
            'last_name' => 'required',
            'first_name' => 'required',
            'complaint_type' => 'required',
            'description' => 'nullable|string',
            'date_filed' => 'required|date',
            'status' => 'required',
        ]);

        $complaint = Complaint::create($data);

        return response()->json($complaint, 201);
    }

    public function show($id)
    {
        return response()->json(Complaint::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->all());
        return response()->json($complaint);
    }

    public function destroy($id)
    {
        Complaint::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
