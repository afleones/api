<?php

namespace App\Http\Controllers;

use App\Models\youth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class youthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $youth = youth::selectRaw("id,
        weight,
        size,
        imc,
        systolicPressure,
        diastolicPressure,
        medicalHistory,
        completeVaccination,
        chronicConditions,
        disability,
        promotionHealth,
        oralHygiene,
        referralOptometry,
        consumptionTobacco,
        consumptionAlcohol,
        psychoactiveSubstances,
        developmentPubertal,
        homeLifeSexual,
        its,
        chronicCough,
        identitySexual,
        psychosocialDevelopment,
        suicidalBehavior,
        ethnicGroups,
        nutritionalProblems,
        malnutrition,
        overweightObesity,
        signsDanger,
        rapePhysicalPsychological,
        rapeSexual,
        unschooling,
        schoolPerformance,
        tripZonesEndemic,
        userId,
        personaId,
        viviendaId,
        created_at,
		updated_at")->get();
        return $youth;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Creamos un nuevo objeto del modelo
        $youth = new youth();
        $youth->weight = $data['weight'];
        $youth->size = $data['size'];
        $youth->imc = $data['imc'];
        $youth->systolicPressure = $data['systolicPressure'];
        $youth->diastolicPressure = $data['diastolicPressure'];
        $youth->medicalHistory = $data['medicalHistory'];
        $youth->completeVaccination = $data['completeVaccination'];
        $youth->chronicConditions = $data['chronicConditions'];
        $youth->disability = $data['disability'];
        $youth->promotionHealth = $data['promotionHealth'];
        $youth->oralHygiene = $data['oralHygiene'];
        $youth->referralOptometry = $data['referralOptometry'];
        $youth->consumptionTobacco = $data['consumptionTobacco'];
        $youth->consumptionAlcohol = $data['consumptionAlcohol'];
        $youth->psychoactiveSubstances = $data['psychoactiveSubstances'];
        $youth->developmentPubertal = $data['developmentPubertal'];
        $youth->homeLifeSexual = $data['homeLifeSexual'];
        $youth->its = $data['its'];
        $youth->chronicCough = $data['chronicCough'];
        $youth->identitySexual = $data['identitySexual'];
        $youth->psychosocialDevelopment = $data['psychosocialDevelopment'];
        $youth->suicidalBehavior = $data['suicidalBehavior'];
        $youth->ethnicGroups = $data['ethnicGroups'];
        $youth->nutritionalProblems = $data['nutritionalProblems'];
        $youth->malnutrition = $data['malnutrition'];
        $youth->overweightObesity = $data['overweightObesity'];
        $youth->signsDanger = $data['signsDanger'];
        $youth->rapePhysicalPsychological = $data['rapePhysicalPsychological'];
        $youth->rapeSexual = $data['rapeSexual'];
        $youth->unschooling = $data['unschooling'];
        $youth->schoolPerformance = $data['schoolPerformance'];
        $youth->tripZonesEndemic = $data['tripZonesEndemic'];
        $youth->userId = $data['userId'];
        $youth->personaId = $data['personaId'];
        //Hacer el campo "viviendaId" nullable
        $adolescence->viviendaId = $data['viviendaId'] ?? null; // Usamos operador null coalesce
        
        // Guardamos el objeto en la base de datos
        $youth->save();

        // Retornamos una respuesta de éxito
        return response()->json(['message' => 'Datos insertados correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,youth $youth )
    {
        $data = $request->all(); 
        $userId = $data['userId'];

        $youth = youth::where('userId', $userId)->where(function($query) use ($data) {  
            if (isset($data['id'])) {
                $query->Where('id', $data['id']);
            }
            if (isset($data['personaId'])) {
                $query->Where('personaId', $data['personaId']);
            }
            if (isset($data['viviendaId'])) {
                $query->Where('viviendaId', $data['viviendaId']);
            }
        })->get();

        $dataArray = $youth;             
        return $dataArray;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId, $personaId, $viviendaId)
    {
        $data = $request->all();
    
        // Encuentra el registro que deseas actualizar basado en los criterios de consulta
        $youth = youth::where('userId', $userId)
            ->where('personaId', $personaId)
            ->where('viviendaId', $viviendaId)
            ->first();
    
        // Verifica si se encontró el registro
        if (!$youth) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $youth->weight = $data['weight'];
        $youth->size = $data['size'];
        $youth->imc = $data['imc'];
        $youth->systolicPressure = $data['systolicPressure'];
        $youth->diastolicPressure = $data['diastolicPressure'];
        $youth->medicalHistory = $data['medicalHistory'];
        $youth->completeVaccination = $data['completeVaccination'];
        $youth->chronicConditions = $data['chronicConditions'];
        $youth->disability = $data['disability'];
        $youth->promotionHealth = $data['promotionHealth'];
        $youth->oralHygiene = $data['oralHygiene'];
        $youth->referralOptometry = $data['referralOptometry'];
        $youth->consumptionTobacco = $data['consumptionTobacco'];
        $youth->consumptionAlcohol = $data['consumptionAlcohol'];
        $youth->psychoactiveSubstances = $data['psychoactiveSubstances'];
        $youth->developmentPubertal = $data['developmentPubertal'];
        $youth->homeLifeSexual = $data['homeLifeSexual'];
        $youth->its = $data['its'];
        $youth->chronicCough = $data['chronicCough'];
        $youth->identitySexual = $data['identitySexual'];
        $youth->psychosocialDevelopment = $data['psychosocialDevelopment'];
        $youth->suicidalBehavior = $data['suicidalBehavior'];
        $youth->ethnicGroups = $data['ethnicGroups'];
        $youth->nutritionalProblems = $data['nutritionalProblems'];
        $youth->malnutrition = $data['malnutrition'];
        $youth->overweightObesity = $data['overweightObesity'];
        $youth->signsDanger = $data['signsDanger'];
        $youth->rapePhysicalPsychological = $data['rapePhysicalPsychological'];
        $youth->rapeSexual = $data['rapeSexual'];
        $youth->unschooling = $data['unschooling'];
        $youth->schoolPerformance = $data['schoolPerformance'];
        $youth->tripZonesEndemic = $data['tripZonesEndemic'];
        $youth->userId = $data['userId'];
        $youth->personaId = $data['personaId'];
        $youth->viviendaId = $data['viviendaId'];      

        // Guarda los cambios en la base de datos
        $youth->save();
    
        return response()->json(['message' => 'Registro actualizado con éxito']);
        

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $request->json()->all();
        //var_dump($data);exit();
        $id = $data['id'];
        youth::where('id', $id)->where('id', $id)->delete();
    
        return response()->json(['message' => 'Dato borrado correctamente']);

    }
}
