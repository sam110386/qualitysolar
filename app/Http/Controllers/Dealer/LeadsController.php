<?php

namespace App\Http\Controllers\Dealer;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLeadRequest;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Status;
use App\Models\Lead;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\AssignToAgentLeadNotification;
use App\Notifications\AcceptLeadNotification;
use App\Notifications\RejectLeadNotification;
use App\Notifications\LeadActivateNotification;
use App\Notifications\LeadCompleteNotification;
use App\Notifications\InspectionSaveNotification;
use Exception;
use Illuminate\Support\Facades\Notification;
use App\Models\LeadSurvey;

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
                $displayGate      = true;
                $acceptGate = true;
                $rejectGate = 1;
                $crudRoutePart = 'leads';

                return view('partials.dealer.leadActions', compact(
                    'displayGate',
                    'crudRoutePart',
                    'acceptGate',
                    'rejectGate',
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
    public function rejected(Request $request)
    {

        if ($request->ajax()) {
            $query = Lead::where('assigned_to_user_id', auth()->user()->id)->where('status_id', 4)->with(['status', 'category', 'assigned_to_agent'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $displayGate  = true;
                $acceptGate = 1;
                $activeGate = false;
                $crudRoutePart = 'leads';

                return view('partials.dealer.leadActions', compact(
                    'displayGate',
                    'crudRoutePart',
                    'acceptGate',
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

        return view('dealer.leads.rejected', compact('statuses', 'categories'));
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
        dd("Not Allowed");
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
    public function display($leadid)
    {
        $lead = Lead::where('id', $leadid)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $lead->load('status', 'category');

        $questions = json_decode($lead->questions, 1);
        $defindQuestions = $lead->category_id == 2 ? config('product.commercial_questions') : config('product.residential_questions');

        return view('dealer.leads.display', compact('lead', 'questions', 'defindQuestions'));
    }
    public function show($leadid)
    {
        $lead = Lead::where('id', $leadid)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $lead->load('status', 'category', 'comments', 'survey');

        $questions = json_decode($lead->questions, 1);
        $defindQuestions = $lead->category_id == 2 ? config('product.commercial_questions') : config('product.residential_questions');

        $agents = User::where('parent_id', auth()->user()->id)->whereHas("roles", function ($q) {
            $q->where("title", "Agent");
        })->pluck('name', 'id');

        return view('dealer.leads.show', compact('lead', 'leadid', 'questions', 'defindQuestions', 'agents'));
    }

    public function destroy(Lead $lead)
    {
        // $lead->delete();
        return back();
    }

    public function massDestroy(MassDestroyLeadRequest $request)
    {
        // Lead::whereIn('id', request('ids'))->delete();
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
        $lead->status_id = 5;
        $lead->save();
        /*Notification::route('mail', [
            env('ADMIN_EMAIL') => 'Vehya',
        ])->notify(new AcceptLeadNotification($lead));*/
        Notification::route('mail', config('email.adminto'))->notify(new LeadActivateNotification($lead));
        return back();
    }
    public function reject($id)
    {
        $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $lead->assigned_to_agent_id = NULL;
        $lead->status_id = 4;
        $lead->save();
        Notification::route('mail', config('email.adminto'))->notify(new RejectLeadNotification($lead));
        return back();
    }
    public function activate($id)
    {
        $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $lead->status_id = 5;
        $lead->save();
        Notification::route('mail', config('email.adminto'))->notify(new LeadActivateNotification($lead));
        return back();
    }
    public function completelead($id)
    {
        $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $lead->status_id = 6;
        $lead->save();
        Notification::route('mail', config('email.adminto'))->notify(new LeadCompleteNotification($lead));
        return back();
    }

    public function assignagent(Request $request)
    {
        try {
            $lead = Lead::where('id', $request->leadid)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
            if (!empty($request->agentid)) {
                $agent = User::where('id', $request->agentid)->where('parent_id', auth()->user()->id)->whereHas("roles", function ($q) {
                    $q->where("title", "Agent");
                })->firstOrFail();
                $lead->assigned_to_agent_id = $agent->id;
                $lead->save();
                Notification::route('mail', [
                    'address' => $agent->email,
                    'name' => $agent->name
                ])->notify(new AssignToAgentLeadNotification($lead));
            } else {
                $lead->assigned_to_agent_id = null;
                $lead->save();
            }
            return ["status" => true, "message" => "Your request processed successfully."];
        } catch (Exception $e) {
            return ["status" => false, "message" => $e->getMessage()];
        }
    }

    public function permitupdate(Request $request, $id)
    {
        $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $survey = LeadSurvey::where('lead_id', $id)->firstOrNew();
        $survey->lead_id = $id;
        $survey->customer_name = $request->customer_name;
        $survey->address = $request->address;
        $survey->permit_no = $request->permit_no;
        $survey->inspection_date = $request->inspection_date;
        $survey->inspection_completed = $request->inspection_completed;
        $survey->inspector_name = $request->inspector_name;
        if ($request->file('permit_image')) {
            $fileName = time() . '_' . $request->file('permit_image')->getClientOriginalName();
            $filePath = $request->file('permit_image')->storeAs('uploads/leads', $fileName, 'public');
            $survey->permit_image = time() . '_' . $request->file('permit_image')->getClientOriginalName();
        }
        $survey->save();
        return redirect()->back()->with('status', 'Updated successfully');
    }

    public function surveyupdate(Request $request, $id)
    {

        $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $survey = LeadSurvey::where('lead_id', $id)->firstOrNew();
        $survey->lead_id = $id;
        $survey->charger_completion_of_installation = $request->charger_completion_of_installation;
        $survey->how_use_charger = $request->how_use_charger;
        $survey->demonstrate_charger = $request->demonstrate_charger;
        $survey->interested_service_contract = $request->interested_service_contract;
        $survey->surveyed_name = $request->surveyed_name;
        $survey->phone = $request->phone;
        $survey->email = $request->email;
        $survey->detail = $request->detail;
        if ($request->file('charger_installed_image')) {
            $fileName = time() . '_' . $request->file('charger_installed_image')->getClientOriginalName();
            $filePath = $request->file('charger_installed_image')->storeAs('uploads/leads', $fileName, 'public');
            $survey->charger_installed_image = time() . '_' . $request->file('charger_installed_image')->getClientOriginalName();
        }
        if ($request->file('electrical_panel_image')) {
            $fileName = time() . '_' . $request->file('electrical_panel_image')->getClientOriginalName();
            $filePath = $request->file('electrical_panel_image')->storeAs('uploads/leads', $fileName, 'public');
            $survey->electrical_panel_image = time() . '_' . $request->file('electrical_panel_image')->getClientOriginalName();
        }
        if ($request->file('exterior_property_image')) {
            $fileName = time() . '_' . $request->file('exterior_property_image')->getClientOriginalName();
            $filePath = $request->file('exterior_property_image')->storeAs('uploads/leads', $fileName, 'public');
            $survey->exterior_property_image = time() . '_' . $request->file('exterior_property_image')->getClientOriginalName();
        }

        $survey->save();
        return redirect()->back()->with('status', 'Updated successfully');
    }
    public function inspectionsave(Request $request, $id)
    {
        $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
        $lead->inspection_status = $request->inspection_status;
        $lead->inspection_date = $request->inspection_date;
        $lead->inspection_faild_reason = $request->inspection_faild_reason;
        $lead->status_id = 6;
        $lead->save();
        Notification::route('mail', config('mail.adminto'))->notify(new InspectionSaveNotification($lead));
        return redirect()->back()->with('status', 'Updated successfully');
    }
}
