<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\LeadSurvey;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Admin\AssignToVendorLeadNotification;
use Exception;

class LeadsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 1)->with(['status', 'category'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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



            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category']);

            return $table->make(true);
        }

        $statuses = Status::all();
        $categories = Category::all();

        return view('admin.leads.index', compact('statuses', 'categories'));
    }

    public function assigned(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 2)->with(['status', 'category', 'assigned_to_user'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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

            $table->addColumn('assigned_to_user_name', function ($row) {
                return  $row->assigned_to_user ? $row->assigned_to_user->name : '';
            });


            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_user']);

            return $table->make(true);
        }

        $categories = Category::all();
        return view('admin.leads.assigned', compact('categories'));
    }

    public function accepted(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 3)->with(['status', 'category', 'assigned_to_user'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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

            $table->addColumn('assigned_to_user_name', function ($row) {
                return  $row->assigned_to_user ? $row->assigned_to_user->name : '';
            });


            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_user']);

            return $table->make(true);
        }

        $categories = Category::all();
        return view('admin.leads.accepted', compact('categories'));
    }
    public function rejected(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 4)->with(['status', 'category', 'assigned_to_user'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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

            $table->addColumn('assigned_to_user_name', function ($row) {
                return  $row->assigned_to_user ? $row->assigned_to_user->name : '';
            });


            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_user']);

            return $table->make(true);
        }

        $categories = Category::all();
        return view('admin.leads.rejected', compact('categories'));
    }
    public function active(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 5)->with(['status', 'category', 'assigned_to_user'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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

            $table->addColumn('assigned_to_user_name', function ($row) {
                return  $row->assigned_to_user ? $row->assigned_to_user->name : '';
            });


            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_user']);

            return $table->make(true);
        }

        $categories = Category::all();
        return view('admin.leads.active', compact('categories'));
    }

    public function completed(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 6)->with(['status', 'category', 'assigned_to_user'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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

            $table->addColumn('assigned_to_user_name', function ($row) {
                return  $row->assigned_to_user ? $row->assigned_to_user->name : '';
            });


            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_user']);

            return $table->make(true);
        }

        $categories = Category::all();
        return view('admin.leads.completed', compact('categories'));
    }
    public function canceled(Request $request)
    {
        if ($request->ajax()) {
            $query = Lead::where('status_id', 7)->with(['status', 'category', 'assigned_to_user'])
                ->filterLeads($request)
                ->select(sprintf('%s.*', (new Lead)->table))->orderBy('id', 'DESC');

            $table = Datatables::of($query);
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

                return view('partials.datatablesActions', compact(
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

            $table->addColumn('assigned_to_user_name', function ($row) {
                return  $row->assigned_to_user ? $row->assigned_to_user->name : '';
            });


            $table->addColumn('view_link', function ($row) {
                return route('admin.leads.show', $row->id);
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'category', 'assigned_to_user']);

            return $table->make(true);
        }

        $categories = Category::all();
        return view('admin.leads.canceled', compact('categories'));
    }

    public function createresidential()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $makemodel = config('product.makemodel');
        $make = array_keys($makemodel);
        $usstates = config('product.usstates');
        $residentialquestions = config('product.residential_questions');
        $action = 'Add';
        return view('admin.leads.createresidential', compact('action', "make", "makemodel", 'usstates', 'residentialquestions'));
    }

    public  function saveresidential(Request $request)
    {
        if (!empty($request->id)) {
            $lead = $leadObj = Lead::where('id', $request->id)->firstOrNew();
        } else {
            $lead = new Lead();
        }
        $lead->fname = $request->contact_info_first_name;
        $lead->lname = $request->contact_info_last_name;
        $lead->email = $request->contact_info_email;
        $lead->phone = $request->contact_info_phone;
        $lead->make = $request->Brand;
        $lead->model = $request->Modal;
        $lead->ev_charger_type = $request->ev_chargers_type;
        $lead->expected_install_days = $request->looking_to_install_your_EV_charger;
        $lead->address = $request->address;
        $lead->state = $request->state;
        $lead->quote = $request->quote;
        $lead->installation_date = $request->installation_date;
        $lead->questions = json_encode($request->all());
        $lead->category_id = 1;
        $lead->status_id = isset($leadObj) ? $leadObj->status_id : 1;
        $lead->save();
        return redirect('/admin/leads')->with("status", "Lead created successfully");
    }

    public function savecomercial(Request $request)
    {
        if (!empty($request->id)) {
            $lead = $leadObj = Lead::where('id', $request->id)->firstOrNew();
        } else {
            $lead = new Lead();
        }
        $lead->fname = $request->contact_info_first_name;
        $lead->lname = $request->contact_info_last_name;
        $lead->email = $request->contact_info_email;
        $lead->phone = $request->contact_info_phone;
        $lead->address = $request->address;
        $lead->state = $request->state;
        $lead->expected_install_days = $request->looking_to_install_your_EV_charger;
        $lead->quote = $request->quote;
        $lead->installation_date = $request->installation_date;
        $lead->questions = json_encode($request->all());
        $lead->category_id = 2;
        $lead->status_id = isset($leadObj) ? $leadObj->status_id : 1;
        $lead->save();

        return redirect('/admin/leads')->with("status", "Lead created successfully");
    }



    public function createcomercial()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $usstates = config('product.usstates');
        $commercialquestions = config('product.commercial_questions');
        $action = 'Add';
        return view('admin.leads.createcomercial', compact('action', 'usstates', 'commercialquestions'));
    }

    public function store(StoreLeadRequest $request)
    {
        /* $dataToSave = $request->all();
        $dataToSave['questions'] = json_encode($dataToSave['questions']);
        $lead = Lead::create($dataToSave);
        foreach ($request->input('attachments', []) as $file) {
            $lead->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return redirect()->route('admin.leads.index');*/
    }

    public function edit(Lead $lead)
    {
        abort_if(Gate::denies('lead_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $action = 'Edit';
        if ($lead->category_id == 2) {
            $usstates = config('product.usstates');
            $commercialquestions = config('product.commercial_questions');
            $quesns = json_decode($lead->questions, 1);
            return view('admin.leads.createcomercial', compact('action', 'lead', 'usstates', 'commercialquestions', 'quesns'));
        }
        if ($lead->category_id == 1) {
            $makemodel = config('product.makemodel');
            $make = array_keys($makemodel);
            $usstates = config('product.usstates');
            $residentialquestions = config('product.residential_questions');
            $quesns = json_decode($lead->questions, 1);
            return view('admin.leads.createresidential', compact('action', 'lead', "make", "makemodel", 'usstates', 'residentialquestions', 'quesns'));
        }
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        /* $lead->update($request->all());

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

        return redirect()->route('admin.leads.index');*/
    }

    public function show(Lead $lead)
    {
        abort_if(Gate::denies('lead_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $lead->load('status', 'category', 'assigned_to_user', 'comments');

        $questions = json_decode($lead->questions, 1);
        $defindQuestions = $lead->category_id == 2 ? config('product.commercial_questions') : config('product.residential_questions');
        $vendors = User::where('is_approved', 1)->whereHas("roles", function ($q) {
            $q->where("id", 2);
        })->pluck('name', 'id');
        $leadid = $lead->id;
        return view('admin.leads.show', compact('lead', 'questions', 'defindQuestions', 'vendors', 'leadid'));
    }

    public function destroy(Lead $lead)
    {
        abort_if(Gate::denies('lead_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

    public function assignvendor(Request $request)
    {
        try {
            $lead = Lead::where('id', $request->leadid)->firstOrFail();
            if (!empty($request->vendorid)) {
                $vendor = User::where('id', $request->vendorid)->whereHas("roles", function ($q) {
                    $q->where("id", 2);
                })->firstOrFail();
                $lead->status_id = 2;
                $lead->assigned_to_user_id = $vendor->id;
                $lead->assigned_to_agent_id = NULL;
                $lead->save();
                Notification::route(
                    'mail',
                    [
                        'address' => $vendor->email,
                        'name' => $vendor->name
                    ]
                )->notify(new AssignToVendorLeadNotification($lead));
            } else {
                $lead->status_id = 1;
                $lead->assigned_to_user_id = null;
                $lead->save();
            }
            return ["status" => true, "message" => "Your request processed successfully."];
        } catch (Exception $e) {
            return ["status" => false, "message" => $e->getMessage()];
        }
    }

    public function updatelead(Request $request, $id)
    {
        $lead = Lead::where('id', $id)->firstOrFail();
        $lead->installation_date = $request->installation_date;
        $lead->online_assessment_completed = $request->online_assessment_completed;
        $lead->quote = $request->quote;
        $lead->save();
        return redirect()->back()->with('status', 'Updated successfully');
    }
    public function permitupdate(Request $request, $id)
    {
        $lead = Lead::where('id', $id)->firstOrFail();
        $survey = LeadSurvey::where('lead_id', $id)->firstOrNew();
        $survey->lead_id = $id;
        $survey->customer_name = $request->customer_name;
        $survey->address = $request->address;
        $survey->permit_no = $request->permit_no;
        $survey->inspection_date = $request->inspection_date;
        $survey->inspection_completed = $request->inspection_completed;
        $survey->inspector_name = $request->inspector_name;
        $survey->save();
        return redirect()->back()->with('status', 'Updated successfully');
    }

    public function surveyupdate(Request $request, $id)
    {

        $lead = Lead::where('id', $id)->firstOrFail();
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
            $survey->charger_installed_image = $fileName;
        }
        if ($request->file('electrical_panel_image')) {
            $fileName = time() . '_' . $request->file('electrical_panel_image')->getClientOriginalName();
            $filePath = $request->file('electrical_panel_image')->storeAs('uploads/leads', $fileName, 'public');
            $survey->electrical_panel_image = $fileName;
        }
        if ($request->file('exterior_property_image')) {
            $fileName = time() . '_' . $request->file('exterior_property_image')->getClientOriginalName();
            $filePath = $request->file('exterior_property_image')->storeAs('uploads/leads', $fileName, 'public');
            $survey->exterior_property_image = $fileName;
        }

        $survey->save();
        return redirect()->back()->with('status', 'Updated successfully');
    }

    public function inspectionsave(Request $request, $id)
    {
        $lead = Lead::where('id', $id)->firstOrFail();
        $lead->inspection_status = $request->inspection_status;
        $lead->inspection_date = $request->inspection_date;
        $lead->inspection_faild_reason = $request->inspection_faild_reason;
        $lead->status_id = 6;
        $lead->save();
        return redirect()->back()->with('status', 'Updated successfully');
    }
}
