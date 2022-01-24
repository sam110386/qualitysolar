<?php

namespace App\Http\Controllers\Dealer;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLeadRequest;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Lead;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LeadsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('assigned_to_user_id', auth()->user()->id)->where('status_id', 2)->with(['status', 'category', 'assigned_to_agent'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $acceptGate = false;
                $crudRoutePart = 'leads';

                return view('partials.dealer.leadActions', compact(
                    'viewGate',
                    'crudRoutePart',
                    'acceptGate',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });
            $table->addColumn('status_color', function ($row) {
                return $row->status ? $row->status->color : '#000000';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->addColumn('category_color', function ($row) {
                return $row->category ? $row->category->color : '#000000';
            });

            $table->editColumn('name', function ($row) {
                return $row->fname ? $row->fname . ' ' . $row->lname : "";
            });

            $table->addColumn('assigned_to_agent_name', function ($row) {
                return $row->assigned_to_agent ? $row->assigned_to_agent->name : '';
            });

            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_agent']);

            return $table->make(true);
        }

        $statuses = Status::all();
        $categories = Category::all();

        return view('dealer.leads.index', compact('statuses', 'categories'));
    }
    public function accepted(Request $request)
    {

        if ($request->ajax()) {
            $query = Lead::where('assigned_to_user_id', auth()->user()->id)->where('status_id', 3)->with(['status', 'category', 'assigned_to_agent'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = false;
                $rejectGate = 1;
                $activeGate = 1;
                $crudRoutePart = 'leads';

                return view('partials.dealer.leadActions', compact(
                    'viewGate',
                    'editGate',
                    'crudRoutePart',
                    'rejectGate',
                    'activeGate',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });
            $table->addColumn('status_color', function ($row) {
                return $row->status ? $row->status->color : '#000000';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->addColumn('category_color', function ($row) {
                return $row->category ? $row->category->color : '#000000';
            });

            $table->editColumn('name', function ($row) {
                return $row->fname ? $row->fname . ' ' . $row->lname : "";
            });

            $table->addColumn('assigned_to_agent_name', function ($row) {
                return $row->assigned_to_agent ? $row->assigned_to_agent->name : '';
            });

            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });
            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_agent']);
            return $table->make(true);
        }

        $statuses = Status::all();
        $categories = Category::all();

        return view('dealer.leads.accepted', compact('statuses', 'categories'));
    }
    public function active(Request $request)
    {

        if ($request->ajax()) {
            $query = Lead::where('assigned_to_user_id', auth()->user()->id)->where('status_id', 5)->with(['status', 'category', 'assigned_to_agent'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = false;
                $completeGate = 1;
                $crudRoutePart = 'leads';

                return view('partials.dealer.leadActions', compact(
                    'viewGate',
                    'editGate',
                    'crudRoutePart',
                    'completeGate',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });
            $table->addColumn('status_color', function ($row) {
                return $row->status ? $row->status->color : '#000000';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->addColumn('category_color', function ($row) {
                return $row->category ? $row->category->color : '#000000';
            });

            $table->editColumn('name', function ($row) {
                return $row->fname ? $row->fname . ' ' . $row->lname : "";
            });

            $table->addColumn('assigned_to_agent_name', function ($row) {
                return $row->assigned_to_agent ? $row->assigned_to_agent->name : '';
            });

            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });
            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_agent']);
            return $table->make(true);
        }

        $statuses = Status::all();
        $categories = Category::all();

        return view('dealer.leads.active', compact('statuses', 'categories'));
    }
    public function complete(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('assigned_to_user_id', Auth()->user()->id)->where('status_id', 6)->with(['status', 'category', 'assigned_to_agent'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = true;
                $editGate      = false;
                $deleteGate    = false;
                $crudRoutePart = 'leads';

                return view('partials.dealer.leadActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });
            $table->addColumn('status_color', function ($row) {
                return $row->status ? $row->status->color : '#000000';
            });


            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->addColumn('category_color', function ($row) {
                return $row->category ? $row->category->color : '#000000';
            });

            $table->editColumn('name', function ($row) {
                return $row->fname ? $row->fname . ' ' . $row->lname : "";
            });

            $table->addColumn('assigned_to_agent_name', function ($row) {
                return $row->assigned_to_agent ? $row->assigned_to_agent->name : '';
            });

            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_agent']);

            return $table->make(true);
        }

        $statuses = Status::all();
        $categories = Category::all();

        return view('dealer.leads.complete', compact('statuses', 'categories'));
    }


    public function edit(Lead $lead)
    {
        $statuses = Status::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $assigned_to_users = User::whereHas('roles', function ($query) {
            $query->whereId(2);
        })
            ->pluck('name', 'id')
            ->prepend(trans('global.pleaseSelect'), '');

        $lead->load('status',  'category', 'assigned_to_user');
        return view('dealer.leads.edit', compact('statuses',  'categories', 'assigned_to_users', 'lead'));
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $lead->update($request->all());
        if (count($lead->attachments) > 0) {
            foreach ($lead->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $lead->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $lead->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
            }
        }
        return redirect()->route('dealer.leads.index');
    }

    public function show(Lead $lead)
    {
        $lead->load('status', 'category', 'assigned_to_user', 'comments');

        $questions = json_decode($lead->questions, 1);
        $defindQuestions = $lead->category_id == 2 ? config('product.commercial_questions') : config('product.residential_questions');

        return view('dealer.leads.show', compact('lead', 'questions', 'defindQuestions'));
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return back();
    }

    public function massDestroy(MassDestroyLeadRequest $request)
    {
        Lead::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeComment(Request $request, Lead $lead)
    {
        $request->validate([
            'comment_text' => 'required'
        ]);
        $user = auth()->user();
        $comment = $lead->comments()->create([
            'author_name'   => $user->name,
            'author_email'  => $user->email,
            'user_id'       => $user->id,
            'comment_text'  => $request->comment_text
        ]);

        $lead->sendCommentNotification($comment);

        return redirect()->back()->withStatus('Your comment added successfully');
    }

    public function accept($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->assigned_to_user_id = auth()->user()->id;
        $lead->status_id = 3;
        $lead->save();
        return back();
    }
    public function reject($id)
    {
        $lead = Lead::findOrFail($id);
        //$lead->assigned_to_user_id = NULL;
        $lead->assigned_to_agent_id = NULL;
        $lead->status_id = 4;
        $lead->save();
        return back();
    }
    public function activate($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->status_id = 5;
        $lead->save();
        return back();
    }
    public function completelead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->status_id = 6;
        $lead->save();
        return back();
    }
}
