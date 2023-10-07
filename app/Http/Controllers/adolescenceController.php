<?php

namespace App\Http\Controllers;

use App\Models\adolescence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adolescenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adolescence = adolescence::selectRaw("id,
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
        return $adolescence;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Creamos un nuevo objeto del modelo
        $adolescence = new adolescence();
        $adolescence->weight = $data['weight'];
        $adolescence->size = $data['size'];
        $adolescence->imc = $data['imc'];
        $adolescence->systolicPressure = $data['systolicPressure'];
        $adolescence->diastolicPressure = $data['diastolicPressure'];
        $adolescence->medicalHistory = $data['medicalHistory'];
        $adolescence->completeVaccination = $data['completeVaccination'];
        $adolescence->chronicConditions = $data['chronicConditions'];
        $adolescence->disability = $data['disability'];
        $adolescence->promotionHealth = $data['promotionHealth'];
        $adolescence->oralHygiene = $data['oralHygiene'];
        $adolescence->referralOptometry = $data['referralOptometry'];
        $adolescence->consumptionTobacco = $data['consumptionTobacco'];
        $adolescence->consumptionAlcohol = $data['consumptionAlcohol'];
        $adolescence->psychoactiveSubstances = $data['psychoactiveSubstances'];
        $adolescence->developmentPubertal = $data['developmentPubertal'];
        $adolescence->homeLifeSexual = $data['homeLifeSexual'];
        $adolescence->its = $data['its'];
        $adolescence->chronicCough = $data['chronicCough'];
        $adolescence->identitySexual = $data['identitySexual'];
        $adolescence->psychosocialDevelopment = $data['psychosocialDevelopment'];
        $adolescence->suicidalBehavior = $data['suicidalBehavior'];
        $adolescence->ethnicGroups = $data['ethnicGroups'];
        $adolescence->nutritionalProblems = $data['nutritionalProblems'];
        $adolescence->malnutrition = $data['malnutrition'];
        $adolescence->overweightObesity = $data['overweightObesity'];
        $adolescence->signsDanger = $data['signsDanger'];
        $adolescence->rapePhysicalPsychological = $data['rapePhysicalPsychological'];
        $adolescence->rapeSexual = $data['rapeSexual'];
        $adolescence->unschooling = $data['unschooling'];
        $adolescence->schoolPerformance = $data['schoolPerformance'];
        $adolescence->tripZonesEndemic = $data['tripZonesEndemic'];
        $adolescence->userId = $data['userId'];
        $adolescence->personaId = $data['personaId'];
        $adolescence->viviendaId = $data['viviendaId'];
        // Guardamos el objeto en la base de datos
        $adolescence->save();

        // Retornamos una respuesta de éxito
        return response()->json(['message' => 'Datos insertados correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Accede a los datos de la solicitud POST
        $data = $request->all();
    
        // Valida que los parámetros requeridos estén presentes en la solicitud
        if (
            isset($data['userId']) &&
            isset($data['personaId']) &&
            isset($data['viviendaId'])
        ) {
            // Realiza una consulta en la base de datos para encontrar una coincidencia
            $result = DB::table('maite000003.adolescence')
                ->where([
                    ['userId', '=', $data['userId']],
                    ['personaId', '=', $data['personaId']],
                    ['viviendaId', '=', $data['viviendaId']]
                ]) ->first(); // Obtén la primera coincidencia
    
            if ($result) {
                // Envía la respuesta en un arreglo
                return response()->json(['data' => [$result]], 200);
            } else {
                // Si no se encuentra una coincidencia, devuelve una respuesta de error
                return response()->json(['message' => 'No se encontraron coincidencias'], 404);
            }
        } else {
            // Si falta alguno de los parámetros requeridos, devuelve una respuesta de error
            return response()->json(['message' => 'Parámetros faltantes'], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->json()->all();
        
        $id = $data['id'];
        $adolescence->weight= $data['weight'] ?? '';
        $adolescence->size= $data['size'] ?? '';
        $adolescence->imc= $data['imc'] ?? '';
        $adolescence->systolicpressure= $data['systolicpressure'] ?? '';
        $adolescence->diastolicpressure= $data['diastolicpressure'] ?? '';
        $adolescence->medicalHistory= $data['medicalHistory']  ?? 0;
        $adolescence->completeVaccination= $data['completeVaccination']  ?? 0;
        $adolescence->chronicConditions= $data['chronicConditions']  ?? 0;
        $adolescence->disability= $data['disability']  ?? 0;
        $adolescence->promotionHealth= $data['promotionHealth']  ?? 0;
        $adolescence->oralHygiene= $data['oralHygiene']  ?? 0;
        $adolescence->referralOptometry= $data['referralOptometry']  ?? 0;
        $adolescence->consumptionTobacco= $data['consumptionTobacco']  ?? 0;
        $adolescence->consumptionAlcohol= $data['consumptionAlcohol']  ?? 0;
        $adolescence->psychoactiveSubstances= $data['psychoactiveSubstances']  ?? 0;
        $adolescence->developmentPubertal= $data['developmentPubertal']  ?? 0;
        $adolescence->homeLifeSexual= $data['homeLifeSexual']  ?? 0;
        $adolescence->its= $data['its']  ?? 0;
        $adolescence->chronicCough= $data['chronicCough']  ?? 0;
        $adolescence->identitySexual= $data['identitySexual']  ?? 0;
        $adolescence->psychosocialDevelopment= $data['psychosocialDevelopment']  ?? 0;
        $adolescence->suicidalBehavior= $data['suicidalBehavior']  ?? 0;
        $adolescence->ethnicGroups= $data['ethnicGroups']  ?? 0;
        $adolescence->nutritionalProblems= $data['nutritionalProblems']  ?? 0;
        $adolescence->malnutrition= $data['malnutrition']  ?? 0;
        $adolescence->overweightObesity= $data['overweightObesity']  ?? 0;
        $adolescence->signsDanger= $data['signsDanger']  ?? 0;
        $adolescence->rapePhysicalPsychological= $data['rapePhysicalPsychological']  ?? 0;
        $adolescence->rapeSexual= $data['rapeSexual']  ?? 0;
        $adolescence->unschooling= $data['unschooling']  ?? 0;
        $adolescence->schoolPerformance= $data['schoolPerformance']  ?? 0;
        $adolescence->tripZonesEndemic= $data['tripZonesEndemic']  ?? 0;
        $adolescence->personaid= $data['personaId']  ?? 0;
        $adolescence->userid= $data['userId']  ?? 0;
        
        $tabla = adolescence::where('id', $id)->firstOrFail();

        $tabla->weight = $data['weight'];
        $tabla->size = $data['size'];
        $tabla->imc = $data['imc'];
        $tabla->systolicPressure = $data['systolicPressure'];
        $tabla->diastolicPressure = $data['diastolicPressure'];
        $tabla->medicalHistory = $data['medicalHistory'];
        $tabla->completeVaccination = $data['completeVaccination'];
        $tabla->chronicConditions = $data['chronicConditions'];
        $tabla->disability = $data['disability'];
        $tabla->promotionHealth = $data['promotionHealth'];
        $tabla->oralHygiene = $data['oralHygiene'];
        $tabla->referralOptometry = $data['referralOptometry'];
        $tabla->consumptionTobacco = $data['consumptionTobacco'];
        $tabla->consumptionAlcohol = $data['consumptionAlcohol'];
        $tabla->psychoactiveSubstances = $data['psychoactiveSubstances'];
        $tabla->developmentPubertal = $data['developmentPubertal'];
        $tabla->homeLifeSexual = $data['homeLifeSexual'];
        $tabla->its = $data['its'];
        $tabla->chronicCough = $data['chronicCough'];
        $tabla->identitySexual = $data['identitySexual'];
        $tabla->psychosocialDevelopment = $data['psychosocialDevelopment'];
        $tabla->suicidalBehavior = $data['suicidalBehavior'];
        $tabla->ethnicGroups = $data['ethnicGroups'];
        $tabla->nutritionalProblems = $data['nutritionalProblems'];
        $tabla->malnutrition = $data['malnutrition'];
        $tabla->overweightObesity = $data['overweightObesity'];
        $tabla->signsDanger = $data['signsDanger'];
        $tabla->rapePhysicalPsychological = $data['rapePhysicalPsychological'];
        $tabla->rapeSexual = $data['rapeSexual'];
        $tabla->unschooling = $data['unschooling'];
        $tabla->schoolPerformance = $data['schoolPerformance'];
        $tabla->tripZonesEndemic = $data['tripZonesEndemic'];
        $tabla->userId = $data['userId'];
        $tabla->personaId = $data['personaId'];
        $tabla->viviendaId = $data['viviendaId'];

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
        adolescence::where('id', $id)->where('id', $id)->delete();
    
        return response()->json(['message' => 'Dato borrado correctamente']);

    }
}
