<?php

namespace App\Http\Controllers;

use App\Models\youth;
use Illuminate\Http\Request;

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
        $youth->viviendaId = $data['viviendaId'];      
        // Guardamos el objeto en la base de datos
        $youth->save();

        // Retornamos una respuesta de éxito
        return response()->json(['message' => 'Datos insertados correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, womenhealth $womenhealth)
    {
        //$data = $request->json()->all();  recibe por raw
        $data = $request->all();   //recibe por json
        //var_dump($data);exit();
        $userid = $data['userId'];
        $fecha1 = $data['fecha1'];
        $fecha2 = $data['fecha2'];
                
        
        $womenhealth = womenhealth::where('userId', $userid)->where(function($query) use ($fecha1, $fecha2, $data) {
            if (isset($data['id'])) {
                $query->orWhere('id', $data['id']);
            }
            // if (isset($data['territorio'])) {
            // $query->orWhere('territorio', $data['territorio']);
            // }
            $query->whereBetween(\DB::raw('DATE(created_at)'), [$fecha1, $fecha2]);
            })->get();     
        
        //$dataArray = array($womenhealth);
        $dataArray = ($womenhealth);   //CORRECCION DE MOSTREO DE EMPRESA 2023-10-06      OTRA VEZ                                                 
        return $dataArray;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['id'];
        $youth->size= $data['size'];
        $youth->imc= $data['imc'];
        $youth->systolicpressure= $data['systolicpressure'];
        $youth->diastolicpressure= $data['diastolicpressure'];
        $youth->medicalHistory= $data['medicalHistory'];
        $youth->completeVaccination= $data['completeVaccination'];
        $youth->chronicConditions= $data['chronicConditions'];
        $youth->disability= $data['disability'];
        $youth->promotionHealth= $data['promotionHealth'];
        $youth->oralHygiene= $data['oralHygiene'];
        $youth->referralOptometry= $data['referralOptometry'];
        $youth->periodoIntergeconsumptionTobacconesico= $data['consumptionTobacco'];
        $youth->consumptionAlcohol= $data['consumptionAlcohol'];
        $youth->psychoactiveSubstances= $data['psychoactiveSubstances'];
        $youth->developmentPubertal= $data['developmentPubertal'];
        $youth->homeLifeSexual= $data['homeLifeSexual'];
        $youth->its= $data['its'];
        $youth->chronicCough= $data['chronicCough'];
        $youth->identitySexual= $data['identitySexual'];
        $youth->psychosocialDevelopment= $data['psychosocialDevelopment'];
        $youth->suicidalBehavior= $data['suicidalBehavior'];
        $youth->ethnicGroups= $data['ethnicGroups'];
        $youth->nutritionalProblems= $data['nutritionalProblems'];
        $youth->malnutrition= $data['malnutrition'];
        $youth->overweightObesity= $data['overweightObesity'];
        $youth->signsDanger= $data['signsDanger'];
        $youth->rapePhysicalPsychological= $data['rapePhysicalPsychological'];
        $youth->rapeSexual= $data['rapeSexual'];
        $youth->unschooling= $data['unschooling'];
        $youth->schoolPerformance= $data['schoolPerformance'];
        $youth->tripZonesEndemic= $data['tripZonesEndemic'];
        $youth->personaid= $data['personaid'];
        $youth->userid= $data['userid'];
        $tabla = youth::where('id', $id)->firstOrFail();
        $tabla->peso = $peso;
        $tabla->save();

        // Puedes retornar una respuesta o redireccionar a otra página
        return response()->json(['message' => 'Datos Actualizado correctamente']);
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
