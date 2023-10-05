<?php

namespace App\Http\Controllers;

use App\Models\earlychildhood;
use Illuminate\Http\Request;

class earlychildhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $earlychildhood = earlychildhood::selectRaw("id,
        weight,
        size,
        headcircunference,
        gillperimeter,
        perimeterwaist,
        perimeterHip,
        systolicPressure,
        diastolicPressure,
        antecedentprematurity,
        congenitalanomaly,
        consumptionsubstances,
        breastfeeding,
        chroniccondition,
        disability,
        promotionhealth,
        Completevaccination,
        deworming,
        oralhygiene,
        childdevelopment,
        signsera,
        Ancestralmedicine,
        signsera2,
        victimization,
        malnutrition,
        overweightobesity,
        dangerdeath,
        nutritionalproblems,
        dresserChronic,
        tripZonesEndemic,
        userid,
        personaid,
        viviendaid,
        created_at,
        updated_at")->get();
        return $earlychildhood;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // $validatedData = $request->validate($rules);
    
        // Creamos un nuevo objeto del modelo
        $earlychildhood = new earlychildhood();
        $earlychildhood->weight = $data['weight'];
        $earlychildhood->size = $data['size'];
        $earlychildhood->headcircunference = $data['headcircunference'];
        $earlychildhood->gillperimeter = $data['gillperimeter'];
        $earlychildhood->perimeterwaist = $data['perimeterwaist'];
        $earlychildhood->perimeterHip = $data['siperimeterHipze'];
        $earlychildhood->systolicPressure = $data['systolicPressure'];
        $earlychildhood->diastolicPressure = $data['diastolicPressure'];
        $earlychildhood->antecedentprematurity = $data['antecedentprematurity'];
        $earlychildhood->congenitalanomaly = $data['congenitalanomaly'];
        $earlychildhood->consumptionsubstances = $data['consumptionsubstances'];
        $earlychildhood->breastfeeding = $data['breastfeeding'];
        $earlychildhood->chroniccondition = $data['chroniccondition'];
        $earlychildhood->disability = $data['disability'];
        $earlychildhood->promotionhealth = $data['promotionhealth'];
        $earlychildhood->Completevaccination = $data['Completevaccination'];
        $earlychildhood->deworming = $data['deworming'];
        $earlychildhood->oralhygiene = $data['oralhygiene'];
        $earlychildhood->childdevelopment = $data['childdevelopment'];
        $earlychildhood->signsera = $data['signsera'];
        $earlychildhood->Ancestralmedicine = $data['Ancestralmedicine'];
        $earlychildhood->signsera2 = $data['signsera2'];
        $earlychildhood->victimization = $data['victimization'];
        $earlychildhood->malnutrition = $data['malnutrition'];
        $earlychildhood->overweightobesity = $data['overweightobesity'];
        $earlychildhood->dangerdeath = $data['dangerdeath'];
        $earlychildhood->nutritionalproblems = $data['nutritionalproblems'];
        $earlychildhood->dresserChronic = $data['dresserChronic'];
        $earlychildhood->tripZonesEndemic = $data['tripZonesEndemic'];
        $earlychildhood->userid = $data['userid'];
        $earlychildhood->personaid = $data['personaid'];
        $earlychildhood->viviendaid = $data['viviendaid'];

        //Guardamos el objeto en la base de datos
        $earlychildhood->save();
    
        // Retornamos una respuesta de éxito
        return response()->json(['message' => 'Datos insertados correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, earlychildhood $earlychildhood)
    {
        $data = $request->json()->all();
        //var_dump($data);exit();
        $userid = $data['userid'];
        // $fecha1 = $data['fecha1'];
        // $fecha2 = $data['fecha2'];
        $earlychildhood = earlychildhood::where('userid', $userid)
                         ->where(function($query) use ( $data) {
                            if (isset($data['id'])) {
                                $query->orWhere('id', $data['id']);
                            }
                            if (isset($data['personaid'])) {
                                $query->orWhere('personaid', $data['personaid']);
                            }
                            //$query->whereBetween(\DB::raw('DATE(created_at)'), [$fecha1, $fecha2]);
                         })
                         ->get();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'numeric',
            'size' => 'numeric',
            'headcircunference' => 'numeric',
            'gillperimeter' => 'numeric',
            'perimeterwaist' => 'numeric',
            'perimeterHip' => 'numeric',
            'systolicPressure' => 'numeric',
            'diastolicPressure' => 'numeric',
            'antecedentprematurity' => 'numeric',
            'congenitalanomaly' => 'numeric',
            'consumptionsubstances' => 'numeric',
            'breastfeeding' => 'numeric',
            'chroniccondition' => 'numeric',
            'disability' => 'numeric',
            'promotionhealth' => 'numeric',
            'Completevaccination' => 'numeric',
            'deworming' => 'numeric',
            'oralhygiene' => 'numeric',
            'childdevelopment' => 'numeric',
            'signsera' => 'numeric',
            'Ancestralmedicine' => 'numeric',
            'signsera2' => 'numeric',
            'victimization' => 'numeric',
            'malnutrition' => 'numeric',
            'overweightobesity' => 'numeric',
            'dangerdeath' => 'numeric',
            'nutritionalproblems' => 'numeric',
            'dresserChronic' => 'numeric',
            'tripZonesEndemic' => 'numeric',
            'userid' => 'numeric',
            'personaid' => 'numeric',
            'viviendaid' => 'numeric',
            'created_at' => 'date',
            'updated_at' => 'date',
        ]);
        

        // Buscar el registro por ID
        $registro = Registro::find($id);

        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        // Actualizar los campos
        $registro->fill($request->all());
        $registro->save();

        return response()->json(['message' => 'Registro actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $request->json()->all();
        //var_dump($data);exit();
        $id = $data['personid'];
        earlychildhood::where('', $id)->where('personid', $id)->delete();   
        return response()->json(['message' => 'Dato borrado correctamente']);

    }
}
