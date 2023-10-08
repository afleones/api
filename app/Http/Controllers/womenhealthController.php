<?php

namespace App\Http\Controllers;

use App\Models\womenhealth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class womenhealthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $womenhealth = womenhealth::selectRaw("
        id,
        weight,
        size,
        imc,
        systolicPressure,
        diastolicPressure,
        cervicalCytology,
        lastMammography,
        contraceptiveMethods,
        teenagerWithHistory,
        malBackground,
        abortionBackground,
        gynecologicalBackground,
        chronicDiseases,
        intergenicPeriod,
        vihItsBackground,
        newbornBackground,
        pregnancyHistory,
        womanInPuerperium,
        genderViolence,
        endemicZonesTravel,
        userId,
        personaId,
        viviendaId,
        created_at,
        updated_at")->get();
        return $womenhealth;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        
        // Creamos un nuevo objeto del modelo
        $womenhealth = new womenhealth();

        $womenhealth->weight = $data['weight'];
        $womenhealth->size = $data['size'];
        $womenhealth->imc = $data['imc'];
        $womenhealth->systolicPressure = $data['systolicPressure'];
        $womenhealth->diastolicPressure = $data['diastolicPressure'];
        $womenhealth->cervicalCytology = $data['cervicalCytology'];
        $womenhealth->lastMammography = $data['lastMammography'];
        $womenhealth->contraceptiveMethods = $data['contraceptiveMethods'];
        $womenhealth->teenagerWithHistory = $data['teenagerWithHistory'];
        $womenhealth->malBackground = $data['malBackground'];
        $womenhealth->abortionBackground = $data['abortionBackground'];
        $womenhealth->gynecologicalBackground = $data['gynecologicalBackground'];
        $womenhealth->chronicDiseases = $data['chronicDiseases'];
        $womenhealth->intergenicPeriod = $data['intergenicPeriod'];
        $womenhealth->vihItsBackground = $data['vihItsBackground'];
        $womenhealth->newbornBackground = $data['newbornBackground'];
        $womenhealth->pregnancyHistory = $data['pregnancyHistory'];
        $womenhealth->womanInPuerperium = $data['womanInPuerperium'];
        $womenhealth->genderViolence = $data['genderViolence'];
        $womenhealth->chronicCough = $data['chronicCough'];
        $womenhealth->endemicZonesTravel = $data['endemicZonesTravel'];
        $womenhealth->userId = $data['userId'];
        $womenhealth->personaId = $data['personaId'];
        $womenhealth->viviendaId = $data['viviendaId'];
                
        // Guardamos el objeto en la base de datos
        $womenhealth->save();

    
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
            $result = DB::table('maite000003.womenHealth')
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
    public function update(Request $request, $userId, $personaId, $viviendaId)
    {
        $data = $request->all();
    
        // Encuentra el registro que deseas actualizar basado en los criterios de consulta
        $womenhealth = womenhealth::where('userId', $userId)
            ->where('personaId', $personaId)
            ->where('viviendaId', $viviendaId)
            ->first();
    
        // Verifica si se encontró el registro
        if (!$womenhealth) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $womenhealth->weight = $data['weight'];
        $womenhealth->size = $data['size'];
        $womenhealth->imc = $data['imc'];
        $womenhealth->systolicPressure = $data['systolicPressure'];
        $womenhealth->diastolicPressure = $data['diastolicPressure'];
        $womenhealth->cervicalCytology = $data['cervicalCytology'];
        $womenhealth->lastMammography = $data['lastMammography'];
        $womenhealth->contraceptiveMethods = $data['contraceptiveMethods'];
        $womenhealth->teenagerWithHistory = $data['teenagerWithHistory'];
        $womenhealth->malBackground = $data['malBackground'];
        $womenhealth->abortionBackground = $data['abortionBackground'];
        $womenhealth->gynecologicalBackground = $data['gynecologicalBackground'];
        $womenhealth->chronicDiseases = $data['chronicDiseases'];
        $womenhealth->intergenicPeriod = $data['intergenicPeriod'];
        $womenhealth->vihItsBackground = $data['vihItsBackground'];
        $womenhealth->newbornBackground = $data['newbornBackground'];
        $womenhealth->pregnancyHistory = $data['pregnancyHistory'];
        $womenhealth->womanInPuerperium = $data['womanInPuerperium'];
        $womenhealth->genderViolence = $data['genderViolence'];
        $womenhealth->chronicCough = $data['chronicCough'];
        $womenhealth->endemicZonesTravel = $data['endemicZonesTravel'];
        $womenhealth->userId = $data['userId'];
        $womenhealth->personaId = $data['personaId'];
        $womenhealth->viviendaId = $data['viviendaId'];

        // Guarda los cambios en la base de datos
        $womenhealth->save();
    
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
        $userid = $data['userId'];
        $personaid = $data['personaId'];
        womenhealth::where('id', $id)->where('id', $id)
                                     ->where('userId', $userid)
                                     ->where('personaId', $personaid)
                                     ->delete();
    
        return response()->json(['message' => 'Dato borrado correctamente']);

    }
}
