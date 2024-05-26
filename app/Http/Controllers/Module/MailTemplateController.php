<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Templates\StoreRequest;
use App\Http\Requests\Modules\Templates\UpdateRequest;
use App\Models\MailTemplate;
use Illuminate\Http\Request;

class MailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = $request->paginate ?? 10;
        $mailTemplates = MailTemplate::sortable()->filter($request->all())
            ->paginate($paginate);
        return view('modules.templates.index', compact('mailTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        MailTemplate::create($request->getData());

        return to_route('mailTemplates.index')->with('success', 'Mail Template created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MailTemplate $mailTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailTemplate $mailTemplate)
    {
        return view('modules.templates.edit', compact('mailTemplate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, MailTemplate $mailTemplate)
    {
        $mailTemplate->update($request->validated());

        return to_route('mailTemplates.index')->with('success', 'Mail Template updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailTemplate $mailTemplate)
    {
        $mailTemplate->delete();
        return to_route('mailTemplates.index')->with('success', 'Mail Template deleted successfully.');
    }
}
