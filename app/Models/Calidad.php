<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    /**
     * Defino el nombre de la migración para evitar problemas
     * con el plural en castellano.
     */
    protected $table = 'calidades';

    // Campos rellenables
    protected $fillable = [
        'codigo', // Autorrellenable
        'texto', // Autorrellenable
    ];

    /**
     * Cada calidad pertenece a una naturaleza
     */
    public function naturaleza()
    {
        return $this->belongsTo(Naturaleza::class);
    }

    /**
     * Cada descripción pertenece a una naturaleza
     */
    public function descripcion()
    {
        return $this->belongsTo(Naturaleza::class);
    }

    /**
     * Códigos y textos de las calidades según la naturaleza de la muestra
     */
    protected $biopsia_corazon_calidades = [
        ['codigo' => 'BC.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BC.2.', 'texto' => 'Toma válida para examen aunque limitada por ausencia de células endocárdicas/zona de transición.'],
        ['codigo' => 'BC.3.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BC.4.', 'texto' => 'Toma válida para examen aunque limitada por escasez de células.'],
        ['codigo' => 'BC.5.', 'texto' => 'Toma válida para examen aunque limitada por intensa citólisis.'],
        ['codigo' => 'BC.6.', 'texto' => 'Toma válida para examen aunque limitada por...'],
        ['codigo' => 'BC.7.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BC.8.', 'texto' => 'Toma no valorable por ausencia de células...'],
        ['codigo' => 'BC.9.', 'texto' => 'Toma no valorable por...'],
    ];

    protected $biopsia_higado_calidades = [
        ['codigo' => 'BH.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BH.2.', 'texto' => 'Aunque válida, la muestra está limitada por la ausencia de células endoteliales/hepatocitos periportales.'],
        ['codigo' => 'BH.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de hemorragia.'],
        ['codigo' => 'BH.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de células.'],
        ['codigo' => 'BH.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por una intensa citolisis.'],
        ['codigo' => 'BH.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BH.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BH.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de células...'],
        ['codigo' => 'BH.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_estomago_calidades = [
        ['codigo' => 'BES.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BES.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de contenido gástrico residual.'],
        ['codigo' => 'BES.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de sangre.'],
        ['codigo' => 'BES.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de células.'],
        ['codigo' => 'BES.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la presencia de moco.'],
        ['codigo' => 'BES.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BES.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BES.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido gástrico...'],
        ['codigo' => 'BES.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_rinon_calidades = [
        ['codigo' => 'BR.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BR.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de tejido adiposo perirrenal.'],
        ['codigo' => 'BR.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de sangre en el espécimen.'],
        ['codigo' => 'BR.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de glomérulos en el corte.'],
        ['codigo' => 'BR.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BR.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BR.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BR.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido renal...'],
        ['codigo' => 'BR.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_utero_calidades = [
        ['codigo' => 'BU.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BU.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de sangre menstrual en el espécimen.'],
        ['codigo' => 'BU.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido endometrial en el corte.'],
        ['codigo' => 'BU.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BU.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la presencia de células descamadas en el endometrio.'],
        ['codigo' => 'BU.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BU.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BU.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido uterino...'],
        ['codigo' => 'BU.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_intestino_calidades = [
        ['codigo' => 'BI.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BI.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de contenido fecal en el lumen intestinal.'],
        ['codigo' => 'BI.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido mucoso en el corte.'],
        ['codigo' => 'BI.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BI.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la presencia de tejido adiposo perivisceral.'],
        ['codigo' => 'BI.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BI.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BI.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido intestinal...'],
        ['codigo' => 'BI.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_esofago_calidades = [
        ['codigo' => 'BEF.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BEF.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de contenido alimenticio en la luz esofágica.'],
        ['codigo' => 'BEF.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido epitelial en el corte.'],
        ['codigo' => 'BEF.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BEF.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la presencia de tejido conectivo periesofágico.'],
        ['codigo' => 'BEF.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BEF.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BEF.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido esofágico...'],
        ['codigo' => 'BEF.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_testiculo_calidades = [
        ['codigo' => 'BT.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BT.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de células germinales escasas.'],
        ['codigo' => 'BT.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de tejido fibroso intersticial.'],
        ['codigo' => 'BT.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BT.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la deshidratación del tejido.'],
        ['codigo' => 'BT.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BT.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BT.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido testicular...'],
        ['codigo' => 'BT.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_pulmon_calidades = [
        ['codigo' => 'BP.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BP.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de tejido necrótico en el corte.'],
        ['codigo' => 'BP.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BP.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de células inflamatorias abundantes.'],
        ['codigo' => 'BP.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la deshidratación del tejido.'],
        ['codigo' => 'BP.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BP.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BP.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido pulmonar...'],
        ['codigo' => 'BP.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_bazo_calidades = [
        ['codigo' => 'BB.1.', 'texto' => 'La muestra es válida para el examen.'],
        ['codigo' => 'BB.2.', 'texto' => 'Aunque válida, la muestra está limitada por la presencia de tejido hemorrágico en el corte.'],
        ['codigo' => 'BB.3.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido linfoide en la muestra.'],
        ['codigo' => 'BB.4.', 'texto' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.'],
        ['codigo' => 'BB.5.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por la deshidratación del tejido.'],
        ['codigo' => 'BB.6.', 'texto' => 'La muestra es válida para el examen, aunque está limitada por...'],
        ['codigo' => 'BB.7.', 'texto' => 'La muestra no es valorable debido a la desecación.'],
        ['codigo' => 'BB.8.', 'texto' => 'La muestra no es valorable debido a la ausencia de tejido esplénico...'],
        ['codigo' => 'BB.9.', 'texto' => 'La muestra no es valorable debido a...'],
    ];

    protected $biopsia_feto_calidades = [
        ['codigo' => 'BF.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BF.2.', 'texto' => 'Toma válida para examen aunque limitada por tamaño del feto.'],
        ['codigo' => 'BF.3.', 'texto' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.'],
        ['codigo' => 'BF.4.', 'texto' => 'Toma válida para examen aunque limitada por deterioro del tejido fetal.'],
        ['codigo' => 'BF.5.', 'texto' => 'Toma válida para examen aunque limitada por presencia de líquido amniótico.'],
        ['codigo' => 'BF.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BF.7.', 'texto' => 'Toma no valorable por ausencia de tejido fetal.'],
    ];

    protected $biopsia_cerebro_calidades = [
        ['codigo' => 'BCB.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BCB.2.', 'texto' => 'Toma válida para examen aunque limitada por escasez de tejido cerebral.'],
        ['codigo' => 'BCB.3.', 'texto' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.'],
        ['codigo' => 'BCB.4.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BCB.5.', 'texto' => 'Toma válida para examen aunque limitada por necrosis extensa.'],
        ['codigo' => 'BCB.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BCB.7.', 'texto' => 'Toma no valorable por ausencia de tejido cerebral.'],
    ];

    protected $biopsia_lengua_calidades = [
        ['codigo' => 'BL.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BL.2.', 'texto' => 'Toma válida para examen aunque limitada por escasez de tejido lingual.'],
        ['codigo' => 'BL.3.', 'texto' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.'],
        ['codigo' => 'BL.4.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BL.5.', 'texto' => 'Toma válida para examen aunque limitada por presencia de saliva.'],
        ['codigo' => 'BL.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BL.7.', 'texto' => 'Toma no valorable por ausencia de tejido lingual.'],
    ];

    protected $biopsia_ovario_calidades = [
        ['codigo' => 'BO.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BO.2.', 'texto' => 'Toma válida para examen aunque limitada por escasez de tejido ovárico.'],
        ['codigo' => 'BO.3.', 'texto' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.'],
        ['codigo' => 'BO.4.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BO.5.', 'texto' => 'Toma válida para examen aunque limitada por necrosis extensa.'],
        ['codigo' => 'BO.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BO.7.', 'texto' => 'Toma no valorable por ausencia de tejido ovárico.'],
    ];

    protected $biopsia_trompa_falopio_calidades = [
        ['codigo' => 'BTF.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BTF.2.', 'texto' => 'Toma válida para examen aunque limitada por escasez de tejido tubárico.'],
        ['codigo' => 'BTF.3.', 'texto' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.'],
        ['codigo' => 'BTF.4.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BTF.5.', 'texto' => 'Toma válida para examen aunque limitada por presencia de moco cervical.'],
        ['codigo' => 'BTF.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BTF.7.', 'texto' => 'Toma no valorable por ausencia de tejido tubárico.'],
    ];

    protected $biopsia_pancreas_calidades = [
        ['codigo' => 'BPA.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BPA.2.', 'texto' => 'Toma válida para examen aunque limitada por escasez de tejido pancreático.'],
        ['codigo' => 'BPA.3.', 'texto' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.'],
        ['codigo' => 'BPA.4.', 'texto' => 'Toma válida para examen aunque limitada por necrosis extensa.'],
        ['codigo' => 'BPA.5.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BPA.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BPA.7.', 'texto' => 'Toma no valorable por ausencia de tejido pancreático.'],
    ];

    protected $biopsia_piel_calidades = [
        ['codigo' => 'BPI.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'BPI.2.', 'texto' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.'],
        ['codigo' => 'BPI.3.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'BPI.4.', 'texto' => 'Toma válida para examen aunque limitada por escasez de células.'],
        ['codigo' => 'BPI.5.', 'texto' => 'Toma válida para examen aunque limitada por intensa citólisis.'],
        ['codigo' => 'BPI.6.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'BPI.7.', 'texto' => 'Toma no valorable por ausencia de células.'],
    ];

    protected $cervico_vaginal_calidades = [
        ['codigo' => 'C.1.', 'texto' => 'Toma válida para examen.'],
        ['codigo' => 'C.2.', 'texto' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales / zona de transición.'],
        ['codigo' => 'C.3.', 'texto' => 'Toma válida para examen aunque limitada por hemorragia.'],
        ['codigo' => 'C.4.', 'texto' => 'Toma válida para examen aunque limitada por escasez de células.'],
        ['codigo' => 'C.5.', 'texto' => 'Toma válida para examen aunque limitada por intensa citolisis.'],
        ['codigo' => 'C.6.', 'texto' => 'Toma válida para examen aunque limitada por...'],
        ['codigo' => 'C.7.', 'texto' => 'Toma no valorable por desecación.'],
        ['codigo' => 'C.8.', 'texto' => 'Toma no valorable por ausencia de células...'],
        ['codigo' => 'C.9.', 'texto' => 'Toma no valorable por...'],
    ];

    protected $hematologico_calidades = [
        ['codigo' => 'H.1.', 'texto' => 'Muestra válida para examen.'],
        ['codigo' => 'H.2.', 'texto' => 'Muestra válida para examen aunque limitada por lipemia.'],
        ['codigo' => 'H.3.', 'texto' => 'Muestra válida para examen aunque limitada por hemólisis.'],
        ['codigo' => 'H.4.', 'texto' => 'Muestra válida para examen aunque limitada por aglutinación.'],
        ['codigo' => 'H.5.', 'texto' => 'Muestra válida para examen aunque limitada por coagulación.'],
        ['codigo' => 'H.6.', 'texto' => 'Muestra válida para examen aunque limitada por...'],
        ['codigo' => 'H.7.', 'texto' => 'Muestra no valorable por desnaturalización de proteínas.'],
        ['codigo' => 'H.8.', 'texto' => 'Muestra no valorable por contaminación bacteriana.'],
        ['codigo' => 'H.9.', 'texto' => 'Muestra no valorable por...'],
    ];

    protected $orina_calidades = [
        ['codigo' => 'U.1.', 'texto' => 'Muestra válida para examen.'],
        ['codigo' => 'U.2.', 'texto' => 'Muestra válida para examen aunque limitada por turbidez.'],
        ['codigo' => 'U.3.', 'texto' => 'Muestra válida para examen aunque limitada por coloración anormal.'],
        ['codigo' => 'U.4.', 'texto' => 'Muestra válida para examen aunque limitada por contaminación fecal.'],
        ['codigo' => 'U.5.', 'texto' => 'Muestra válida para examen aunque limitada por preservación inadecuada.'],
        ['codigo' => 'U.6.', 'texto' => 'Muestra válida para examen aunque limitada por volumen insuficiente.'],
        ['codigo' => 'U.7.', 'texto' => 'Muestra no valorable por deterioro.'],
        ['codigo' => 'U.8.', 'texto' => 'Muestra no valorable por contaminación con agentes externos.'],
        ['codigo' => 'U.9.', 'texto' => 'Muestra no valorable por...'],
    ];

    protected $esputo_calidades = [
        ['codigo' => 'E.1.', 'texto' => 'Muestra válida para examen.'],
        ['codigo' => 'E.2.', 'texto' => 'Muestra válida para examen aunque limitada por volumen insuficiente.'],
        ['codigo' => 'E.3.', 'texto' => 'Muestra válida para examen aunque limitada por presencia de sangre.'],
        ['codigo' => 'E.4.', 'texto' => 'Muestra válida para examen aunque limitada por contaminación con saliva.'],
        ['codigo' => 'E.5.', 'texto' => 'Muestra válida para examen aunque limitada por contaminación con secreciones nasales.'],
        ['codigo' => 'E.6.', 'texto' => 'Muestra válida para examen aunque limitada por presencia de alimentos.'],
        ['codigo' => 'E.7.', 'texto' => 'Muestra no valorable por descomposición.'],
        ['codigo' => 'E.8.', 'texto' => 'Muestra no valorable por...'],
        ['codigo' => 'E.9.', 'texto' => 'Muestra no valorable por...'],
    ];

    protected $bucal_calidades = [
        ['codigo' => 'B.1.', 'texto' => 'Muestra válida para examen.'],
        ['codigo' => 'B.2.', 'texto' => 'Muestra válida para examen aunque limitada por cantidad insuficiente de células.'],
        ['codigo' => 'B.3.', 'texto' => 'Muestra válida para examen aunque limitada por presencia de sangre.'],
        ['codigo' => 'B.4.', 'texto' => 'Muestra válida para examen aunque limitada por contaminación con alimentos.'],
        ['codigo' => 'B.5.', 'texto' => 'Muestra válida para examen aunque limitada por contaminación con saliva.'],
        ['codigo' => 'B.6.', 'texto' => 'Muestra válida para examen aunque limitada por...'],
        ['codigo' => 'B.7.', 'texto' => 'Muestra no valorable por deshidratación.'],
        ['codigo' => 'B.8.', 'texto' => 'Muestra no valorable por contaminación con microorganismos.'],
        ['codigo' => 'B.9.', 'texto' => 'Muestra no valorable por...'],
    ];

    /**
     * Devuelve el array con los códigos y textos asociados a las calidades
     * de una determinada naturaleza.
     *
     * EJEMPLO DE USO:
     * Para una determinada naturaleza, queremos saber su código:
     * $naturaleza->codigo nos devuelve el código de la naturaleza en cuestión.
     * Este es el código que hay que pasar como argumento a la función para que
     * devuelva el array con las descripciones de esa naturaleza.
     *
     * EJEMPLO DE PRUEBA CON TINKER:
     * 1º - Tener todas las naturalezas en la base de datos.
     * 2º - Ejecutar php artisan tinker
     * 3º - Para capturar por ejemplo el código de la primera naturaleza presente en
     * la base de datos, ejecutar:
     * $naturaleza = App\Models\Naturaleza::first()
     * $naturaleza->codigo
     *
     * Más información:
     * https://www.youtube.com/watch?v=yqwZ0URKjcc
     */
    public function getCalidades($codNaturaleza) {
        switch ($codNaturaleza) {
            case 'BB':
                return $this->biopsia_bazo_calidades;
            case 'BCB':
                return $this->biopsia_cerebro_calidades;
            case 'BC':
                return $this->biopsia_corazon_calidades;
            case 'BEF':
                return $this->biopsia_esofago_calidades;
            case 'BES':
                return $this->biopsia_estomago_calidades;
            case 'BF':
                return $this->biopsia_feto_calidades;
            case 'BH':
                return $this->biopsia_higado_calidades;
            case 'BI':
                return $this->biopsia_intestino_calidades;
            case 'BL':
                return $this->biopsia_lengua_calidades;
            case 'BO':
                return $this->biopsia_ovario_calidades;
            case 'BPA':
                return $this->biopsia_pancreas_calidades;
            case 'BPI':
                return $this->biopsia_piel_calidades;
            case 'BP':
                return $this->biopsia_pulmon_calidades;
            case 'BR':
                return $this->biopsia_rinon_calidades;
            case 'BT':
                return $this->biopsia_testiculo_calidades;
            case 'BTF':
                return $this->biopsia_trompa_falopio_calidades;
            case 'BU':
                return $this->biopsia_utero_calidades;
            case 'CB':
                return $this->bucal_calidades;
            case 'CV':
                return $this->cervico_vaginal_calidades;
            case 'E':
                return $this->esputo_calidades;
            case 'H':
                return $this->hematologico_calidades;
            case 'O':
                return $this->orina_calidades;
            default:
                return array(); // Retorna un array vacío si el tipo de muestra no es reconocido
        }
    }
}
