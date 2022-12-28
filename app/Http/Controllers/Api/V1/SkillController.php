<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SkillResource;
use App\Http\Resources\V1\SkillCollection;
use Illuminate\Http\Request;
use App\Http\Requests\SkillRequest;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        // return response()->json("Skill Index");
        return new SkillCollection(Skill::all());
    }

    public function store(SkillRequest $request)
    {
        $skill=Skill::create($request->validated());
        return response()->json('Created');
    }

    public function update(SkillRequest $request,Skill $skill)
    {
        $skill=$skill->update($request->validated());
        return response()->json('Updated');
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json('Deleted');
    }
}
