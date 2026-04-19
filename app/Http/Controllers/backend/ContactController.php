<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        $query->select('id', 'name', 'email', 'phone', 'title', 'content', 'replay_id', 'status');
        $query->whereNull('deleted_at');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $contacts = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('layouts.backend.pages.contact.create');
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->replay_id = $request->replay_id;
        $contact->status = $request->status ?? 1;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->save();

        return redirect()->route('contact.index');
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('layouts.backend.pages.contact.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('layouts.backend.pages.contact.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->replay_id = $request->replay_id;
        $contact->status = $request->status ?? 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->save();

        return redirect()->route('contact.index');
    }

    public function restore(string $id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();

        return redirect()->route('contact.index');
    }

    public function delete(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.trash');
    }

    public function destroy(string $id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->forceDelete();

        return redirect()->route('contact.trash');
    }

    public function trash(Request $request)
    {
        $query = Contact::onlyTrashed();
        $query->select('id', 'name', 'email', 'phone', 'title', 'content', 'replay_id', 'status');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $contacts = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.contact.trash', compact('contacts'));
    }
}
