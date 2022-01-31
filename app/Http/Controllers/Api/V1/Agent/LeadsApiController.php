<?php

namespace App\Http\Controllers\Api\V1\Agent;

use App\Http\Controllers\Api\V1\Agent\BaseController;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Lead;
use App\Models\LeadSurvey;
use Exception;
use Gate;
use Illuminate\Http\Request;

class LeadsApiController extends BaseController
{
    use MediaUploadingTrait;

    public function index()
    {
        $leads = Lead::where('assigned_to_agent_id', auth()->user()->id)->get();
        $leads->load('status', 'category', 'comments', 'survey');
        $return = [];
        foreach ($leads as $lead) {
            $lead->questions = json_decode($lead->questions, 1);
            if (isset($lead->survey) && !empty($lead->survey->charger_installed_image)) {
                $lead->survey->charger_installed_image = asset('storage/uploads/leads/' . $lead->survey->charger_installed_image);
            }
            if (isset($lead->survey) && !empty($lead->survey->electrical_panel_image)) {
                $lead->survey->electrical_panel_image = asset('storage/uploads/leads/' . $lead->survey->electrical_panel_image);
            }
            if (isset($lead->survey) && !empty($lead->survey->exterior_property_image)) {
                $lead->survey->exterior_property_image = asset('storage/uploads/leads/' . $lead->survey->exterior_property_image);
            }
            if (isset($lead->survey) && !empty($lead->survey->permit_image)) {
                $lead->survey->permit_image = asset('storage/uploads/leads/' . $lead->survey->permit_image);
            }
            $return[] = $lead;
        }
        return $this->sendResponse($return, 'success');
    }

    public function deatil($id)
    {
        try {
            $lead = Lead::where('id', $id)->where('assigned_to_agent_id', auth()->user()->id)->firstOrFail();
            $lead->load('status', 'category', 'comments', 'survey');
            $lead->questions = json_decode($lead->questions, 1);
            if (isset($lead->survey) && !empty($lead->survey->charger_installed_image)) {
                $lead->survey->charger_installed_image = asset('storage/uploads/leads/' . $lead->survey->charger_installed_image);
            }
            if (isset($lead->survey) && !empty($lead->survey->electrical_panel_image)) {
                $lead->survey->electrical_panel_image = asset('storage/uploads/leads/' . $lead->survey->electrical_panel_image);
            }
            if (isset($lead->survey) && !empty($lead->survey->exterior_property_image)) {
                $lead->survey->exterior_property_image = asset('storage/uploads/leads/' . $lead->survey->exterior_property_image);
            }
            if (isset($lead->survey) && !empty($lead->survey->permit_image)) {
                $lead->survey->permit_image = asset('storage/uploads/leads/' . $lead->survey->permit_image);
            }

            return $this->sendResponse($lead, 'success');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function updatesurvey(Request $request, $id)
    {
        try {
            $lead = Lead::where('id', $id)->where('assigned_to_user_id', auth()->user()->id)->firstOrFail();
            $survey = LeadSurvey::where('lead_id', $id)->firstOrNew();
            $survey->lead_id = $id;
            if (isset($request->charger_completion_of_installation)) {
                $survey->charger_completion_of_installation = $request->charger_completion_of_installation;
            }
            if (isset($request->how_use_charger)) {
                $survey->how_use_charger = $request->how_use_charger;
            }
            if (isset($request->demonstrate_charger)) {
                $survey->demonstrate_charger = $request->demonstrate_charger;
            }
            if (isset($request->interested_service_contract)) {
                $survey->interested_service_contract = $request->interested_service_contract;
            }
            if (isset($request->surveyed_name)) {
                $survey->surveyed_name = $request->surveyed_name;
            }
            if (isset($request->phone)) {
                $survey->phone = $request->phone;
            }
            if (isset($request->email)) {
                $survey->email = $request->email;
            }
            if (isset($request->detail)) {
                $survey->detail = $request->detail;
            }
            if (isset($request->customer_name)) {
                $survey->customer_name = $request->customer_name;
            }
            if (isset($request->address)) {
                $survey->address = $request->address;
            }
            if (isset($request->permit_no)) {
                $survey->permit_no = $request->permit_no;
            }
            if (isset($request->inspection_date)) {
                $survey->inspection_date = $request->inspection_date;
            }
            if (isset($request->inspection_completed)) {
                $survey->inspection_completed = $request->inspection_completed;
            }
            if (isset($request->inspector_name)) {
                $survey->inspector_name = $request->inspector_name;
            }

            if (isset($request->permit_image)) {
                $img = $request->permit_image;
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $filename =  'survey_' . $id . '_permit_image.png';
                $file = public_path('storage/uploads/leads') . '/' . $filename;
                @file_put_contents($file, $data);
                $survey->permit_image = $filename;
            }
            if (isset($request->charger_installed_image)) {
                $img = $request->charger_installed_image;
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $filename =  'survey_' . $id . '_charger_installed_image.png';
                $file = public_path('storage/uploads/leads') . '/' . $filename;
                @file_put_contents($file, $data);
                $survey->charger_installed_image = $filename;
            }
            if (isset($request->electrical_panel_image)) {
                $img = $request->electrical_panel_image;
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $filename =  'survey_' . $id . '_electrical_panel_image.png';
                $file = public_path('storage/uploads/leads') . '/' . $filename;
                @file_put_contents($file, $data);
                $survey->electrical_panel_image = $filename;
            }
            if (isset($request->exterior_property_image)) {
                $img = $request->exterior_property_image;
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $filename =  'survey_' . $id . '_exterior_property_image.png';
                $file = public_path('storage/uploads/leads') . '/' . $filename;
                @file_put_contents($file, $data);
                $survey->exterior_property_image = $filename;
            }

            $survey->save();

            return $this->sendResponse($lead, 'success');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    /* public function store(StoreLeadRequest $request)
    {
        $lead = Lead::create($request->all());

        if ($request->input('attachments', false)) {
            $lead->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        return (new LeadResource($lead))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lead $lead)
    {
        abort_if(Gate::denies('lead_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeadResource($lead->load(['status', 'priority', 'category', 'assigned_to_user']));
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $lead->update($request->all());

        if ($request->input('attachments', false)) {
            if (!$lead->attachments || $request->input('attachments') !== $lead->attachments->file_name) {
                $lead->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($lead->attachments) {
            $lead->attachments->delete();
        }

        return (new LeadResource($lead))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lead $lead)
    {
        abort_if(Gate::denies('lead_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }*/
}
