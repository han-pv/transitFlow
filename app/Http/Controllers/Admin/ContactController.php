<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admin.contacts.index')
            ->with([
                'contacts' => $contacts,
            ]);
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show')
            ->with(['contact' => $contact]);
    }

    public function destroy($id)
    {
        $obj = Contact::findOrFail($id);

        $obj->delete();

        return to_route('admin.contacts.index')
            ->with([
                'success' => trans('app.contact') . " " . trans('app.deleted'),
            ]);
    }

    public function updateResponded(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:contacts,id',
            'is_responded' => 'required|boolean',
        ]);

        try {
            $contact = Contact::findOrFail($request->id);
            $contact->is_responded = $request->is_responded;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => trans('app.contact') . ' ' . trans('app.updated'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('app.error_occurred') . ': ' . $e->getMessage(),
            ], 500);
        }
    }
}
