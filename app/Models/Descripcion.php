<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    /**
     * Defino el nombre de la migración para evitar problemas
     * con el plural en castellano.
     */
    protected $table = 'descripciones';

    // Campos rellenables
    protected $fillable = [
        'codigo', // Autorrellenable
        'texto', // Autorrellenable
    ];

    /**
     * Cada descripción pertenece a una naturaleza
     */
    public function descripcion()
    {
        return $this->belongsTo(Naturaleza::class);
    }

    /**
     * Códigos y textos de las descripciones según la naturaleza de la muestra
     */
     protected $biopsia_corazon_descripciones = [
        ['codigo' => '1.1', 'texto' => 'Se observa una arquitectura cardíaca conservada, con una adecuada distribución de miocitos y estructuras vasculares.'],
        ['codigo' => '1.2', 'texto' => 'No se observan signos evidentes de necrosis en el tejido cardíaco, lo que sugiere una integridad estructural relativamente normal.'],
        ['codigo' => '1.3', 'texto' => 'Identificación de células inflamatorias dispersas en el tejido, indicativas de una respuesta inflamatoria leve o moderada.'],
        ['codigo' => '1.4', 'texto' => 'Presencia de áreas de fibrosis en el miocardio, posiblemente como resultado de un proceso de cicatrización tras una lesión cardíaca previa.'],
        ['codigo' => '1.5', 'texto' => 'Se detecta una adecuada perfusión sanguínea en los vasos coronarios, indicativa de una circulación coronaria funcional.'],
        ['codigo' => '1.6', 'texto' => 'Observación de células cardíacas con una apariencia histológica normal, incluyendo la presencia de discos intercalares y estriaciones transversales.'],
        ['codigo' => '1.7', 'texto' => 'No se observan células tumorales ni signos de infiltración neoplásica en el tejido cardíaco.'],
        ['codigo' => '1.8', 'texto' => 'Identificación de células endoteliales íntegras en los vasos sanguíneos, sugiriendo una función endotelial adecuada.'],
        ['codigo' => '1.9', 'texto' => 'Se observa una distribución regular de fibras de colágeno en el miocardio, indicativo de una matriz extracelular bien organizada.'],
        ['codigo' => '1.10', 'texto' => 'No se identifican anomalías estructurales significativas en las válvulas cardíacas ni en las cámaras cardíacas.'],
    ];

    protected $biopsia_higado_descripciones = [
        ['codigo' => '2.1', 'texto' => 'Se observa una arquitectura hepática conservada, con cordones de hepatocitos bien definidos y distribución lobulillar normal.'],
        ['codigo' => '2.2', 'texto' => 'Hay presencia de infiltración celular en los sinusoides hepáticos, sugiriendo una respuesta inflamatoria o un proceso infiltrativo.'],
        ['codigo' => '2.3', 'texto' => 'Se identifica una acumulación de lípidos en los hepatocitos, indicativo de esteatosis hepática.'],
        ['codigo' => '2.4', 'texto' => 'Se observan signos de necrosis focal en el tejido, posiblemente debido a isquemia o daño tóxico.'],
        ['codigo' => '2.5', 'texto' => 'Existe una marcada fibrosis periportal, sugiriendo un proceso crónico de inflamación hepática.'],
        ['codigo' => '2.6', 'texto' => 'Se observan nódulos de regeneración, indicativos de un proceso de reparación hepática.'],
        ['codigo' => '2.7', 'texto' => 'Presencia de células de Kupffer activadas, sugiriendo una respuesta inmunitaria o inflamatoria.'],
        ['codigo' => '2.8', 'texto' => 'Se detectan células endoteliales anormales en los vasos sanguíneos hepáticos, lo que podría indicar un proceso neoplásico.'],
        ['codigo' => '2.9', 'texto' => 'Se observa una marcada congestión sinusoidal, posiblemente debido a una obstrucción del flujo sanguíneo hepático.'],
        ['codigo' => '2.10', 'texto' => 'Hay signos de colestasis intrahepática, indicando una obstrucción en el flujo de la bilis dentro del hígado.'],
    ];

    protected $biopsia_estomago_descripciones = [
        ['codigo' => '3.1', 'texto' => 'Se observa un epitelio gástrico intacto y bien conservado.'],
        ['codigo' => '3.2', 'texto' => 'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.'],
        ['codigo' => '3.3', 'texto' => 'Identificación de células caliciformes productoras de moco en las glándulas gástricas.'],
        ['codigo' => '3.4', 'texto' => 'Signos de erosión superficial de la mucosa gástrica, posiblemente debido a irritación crónica.'],
        ['codigo' => '3.5', 'texto' => 'Presencia de gastritis aguda, evidenciada por la infiltración de neutrófilos en la mucosa gástrica.'],
        ['codigo' => '3.6', 'texto' => 'Observación de cambios displásicos en el epitelio gástrico, sugiriendo un proceso preneoplásico.'],
        ['codigo' => '3.7', 'texto' => 'Detección de Helicobacter pylori en la mucosa gástrica, indicando una infección bacteriana.'],
        ['codigo' => '3.8', 'texto' => 'Presencia de metaplasia intestinal en la mucosa gástrica, sugiriendo una adaptación al ambiente ácido del estómago.'],
        ['codigo' => '3.9', 'texto' => 'Identificación de células neuroendocrinas en las glándulas gástricas, indicando una función endocrina.'],
        ['codigo' => '3.10', 'texto' => 'Signos de ulceración profunda en la mucosa gástrica, posiblemente relacionada con un proceso ulceroso crónico.'],
    ];

    protected $biopsia_rinon_descripciones = [
        ['codigo' => '4.1', 'texto' => 'Se observa una arquitectura renal conservada, con una adecuada distribución de los diferentes componentes histológicos.'],
        ['codigo' => '4.2', 'texto' => 'Presencia de infiltración de tejido adiposo perirrenal.'],
        ['codigo' => '4.3', 'texto' => 'Identificación de glóbulos rojos en los túbulos renales, indicativo de hematuria y posible lesión glomerular.'],
        ['codigo' => '4.4', 'texto' => 'Signos de esclerosis glomerular, evidenciada por la presencia de matriz extracelular aumentada y segmentos glomerulares colapsados.'],
        ['codigo' => '4.5', 'texto' => 'Presencia de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
        ['codigo' => '4.6', 'texto' => 'Observación de necrosis tubular aguda, caracterizada por la pérdida de la arquitectura tubular y la presencia de células necróticas en el lumen tubular.'],
        ['codigo' => '4.7', 'texto' => 'Detección de cilindros hialinos en los túbulos renales, indicando una posible proteinuria.'],
        ['codigo' => '4.8', 'texto' => 'Presencia de células inflamatorias en el intersticio renal, sugiriendo una respuesta inflamatoria crónica.'],
        ['codigo' => '4.9', 'texto' => 'Identificación de cuerpos ovales grasos en los túbulos renales, indicativos de daño renal crónico y degeneración lipídica.'],
        ['codigo' => '4.10', 'texto' => 'Signos de fibrosis intersticial, evidenciada por la presencia de tejido conectivo fibroso entre los túbulos renales y los glomérulos.'],
    ];

    protected $biopsia_utero_descripciones = [
        ['codigo' => '5.1', 'texto' => 'Se observa un endometrio bien conservado, con una adecuada proliferación glandular y estroma endometrial.'],
        ['codigo' => '5.2', 'texto' => 'Presencia de sangre en el espécimen, indicando la fase menstrual del ciclo uterino.'],
        ['codigo' => '5.3', 'texto' => 'Identificación de escaso tejido endometrial en el corte, sugiriendo una posible atrofia endometrial.'],
        ['codigo' => '5.4', 'texto' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
        ['codigo' => '5.5', 'texto' => 'Observación de células descamadas en el endometrio, indicativas de la fase de descamación menstrual.'],
        ['codigo' => '5.6', 'texto' => 'Detección de hiperplasia glandular endometrial, sugiriendo un desequilibrio hormonal.'],
        ['codigo' => '5.7', 'texto' => 'Presencia de infiltración de células inflamatorias en el estroma endometrial, indicando una respuesta inflamatoria crónica.'],
        ['codigo' => '5.8', 'texto' => 'Identificación de cuerpos de Arias-Stella en las células glandulares, sugiriendo cambios hormonales asociados con el embarazo o condiciones patológicas.'],
        ['codigo' => '5.9', 'texto' => 'Signos de adenomiosis, evidenciada por la presencia de glándulas endometriales dentro del miometrio.'],
        ['codigo' => '5.10', 'texto' => 'Presencia de células atípicas en las glándulas endometriales, sugiriendo una posible neoplasia endometrial.'],
    ];

    protected $biopsia_intestino_descripciones = [
        ['codigo' => '6.1', 'texto' => 'Se observa una mucosa intestinal con vellosidades bien conservadas y un epitelio columnar intacto.'],
        ['codigo' => '6.2', 'texto' => 'Presencia de contenido fecal en el lumen intestinal, indicando la fase digestiva del proceso.'],
        ['codigo' => '6.3', 'texto' => 'Identificación de escaso tejido mucoso en el corte, sugiriendo una posible atrofia de las glándulas mucosas.'],
        ['codigo' => '6.4', 'texto' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
        ['codigo' => '6.5', 'texto' => 'Observación de tejido adiposo perivisceral, indicativo de la ubicación anatómica de la muestra.'],
        ['codigo' => '6.6', 'texto' => 'Detección de células caliciformes en las criptas intestinales, indicativas de producción de moco.'],
        ['codigo' => '6.7', 'texto' => 'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.'],
        ['codigo' => '6.8', 'texto' => 'Identificación de placas de Peyer en la mucosa intestinal, indicativas de tejido linfoide asociado al intestino.'],
        ['codigo' => '6.9', 'texto' => 'Signos de metaplasia intestinal, evidenciada por la presencia de células caliciformes en áreas no habituales.'],
        ['codigo' => '6.10', 'texto' => 'Presencia de signos de regeneración epitelial, indicativos de un proceso de reparación tras una lesión o inflamación.'],
    ];

    protected $biopsia_esofago_descripciones = [
        ['codigo' => '7.1', 'texto' => 'Se observa un epitelio escamoso estratificado bien conservado en la mucosa esofágica.'],
        ['codigo' => '7.2', 'texto' => 'Presencia de contenido alimenticio en la luz esofágica, indicando la fase de tránsito del proceso digestivo.'],
        ['codigo' => '7.3', 'texto' => 'Identificación de escaso tejido epitelial en el corte, sugiriendo posible atrofia o adelgazamiento del epitelio.'],
        ['codigo' => '7.4', 'texto' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
        ['codigo' => '7.5', 'texto' => 'Observación de tejido conectivo periesofágico, indicativo de la ubicación anatómica de la muestra.'],
        ['codigo' => '7.6', 'texto' => 'Detección de células caliciformes dispersas en la mucosa esofágica, sugiriendo producción de moco.'],
        ['codigo' => '7.7', 'texto' => 'Presencia de infiltración de células inflamatorias en la lámina propia, indicando una respuesta inflamatoria.'],
        ['codigo' => '7.8', 'texto' => 'Identificación de vasos sanguíneos y nervios en la submucosa esofágica, componentes normales del tejido.'],
        ['codigo' => '7.9', 'texto' => 'Signos de hiperplasia epitelial, evidenciada por un aumento en el número de capas celulares.'],
        ['codigo' => '7.10', 'texto' => 'Presencia de células de Langerhans en la mucosa esofágica, indicativas de una función inmunológica local.'],
    ];

    protected $biopsia_testiculo_descripciones = [
        ['codigo' => '8.1', 'texto' => 'Se observa una arquitectura testicular conservada, con la presencia de túbulos seminíferos bien definidos.'],
        ['codigo' => '8.2', 'texto' => 'Presencia de células germinales escasas en los túbulos seminíferos, lo que puede indicar una disminución en la espermatogénesis.'],
        ['codigo' => '8.3', 'texto' => 'Identificación de tejido fibroso intersticial entre los túbulos seminíferos, sugiriendo una posible fibrosis testicular.'],
        ['codigo' => '8.4', 'texto' => 'Signos de artefactos de fijación en el tejido, lo que puede afectar la visualización precisa de algunas estructuras.'],
        ['codigo' => '8.5', 'texto' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
        ['codigo' => '8.6', 'texto' => 'Detección de células de Sertoli en los túbulos seminíferos, indicativas de su función de soporte para las células germinales.'],
        ['codigo' => '8.7', 'texto' => 'Presencia de células de Leydig en el tejido intersticial, responsables de la producción de testosterona.'],
        ['codigo' => '8.8', 'texto' => 'Identificación de células inmaduras o anormales en los túbulos seminíferos, sugiriendo un posible trastorno en la espermatogénesis.'],
        ['codigo' => '8.9', 'texto' => 'Signos de inflamación testicular, evidenciados por la presencia de células inflamatorias en el tejido.'],
        ['codigo' => '8.10', 'texto' => 'Presencia de células apoptóticas en los túbulos seminíferos, indicando un proceso de muerte celular programada, posiblemente relacionado con el daño testicular.'],
    ];

    protected $biopsia_pulmon_descripciones = [
        ['codigo' => '9.1', 'texto' => 'Se observa una arquitectura pulmonar conservada, con la presencia de alvéolos bien definidos y paredes alveolares íntegras.'],
        ['codigo' => '9.2', 'texto' => 'Presencia de tejido necrótico en el corte, sugiriendo un proceso de necrosis tisular, posiblemente debido a una lesión o enfermedad.'],
        ['codigo' => '9.3', 'texto' => 'Identificación de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
        ['codigo' => '9.4', 'texto' => 'Signos de inflamación pulmonar, indicados por la presencia de células inflamatorias abundantes en el tejido.'],
        ['codigo' => '9.5', 'texto' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
        ['codigo' => '9.6', 'texto' => 'Detección de tejido fibroso en los espacios alveolares, sugiriendo fibrosis pulmonar.'],
        ['codigo' => '9.7', 'texto' => 'Presencia de células de metaplasia escamosa en las vías respiratorias, indicativas de una respuesta adaptativa al daño crónico.'],
        ['codigo' => '9.8', 'texto' => 'Identificación de células neoplásicas en el tejido, sugiriendo un proceso tumoral pulmonar.'],
        ['codigo' => '9.9', 'texto' => 'Signos de edema pulmonar, evidenciados por la presencia de líquido en los espacios.'],
        ['codigo' => '9.10', 'texto' => 'Presencia de cuerpos extraños en el tejido, indicando inhalación de material extraño.'],
    ];

    protected $biopsia_bazo_descripciones = [
        ['codigo' => '10.1', 'texto' => 'Se observa una arquitectura esplénica conservada, con una adecuada distribución de la pulpa blanca y roja.'],
        ['codigo' => '10.2', 'texto' => 'Presencia de áreas de tejido hemorrágico en el corte, indicativo de hemorragia intraparenquimatosa reciente o traumática.'],
        ['codigo' => '10.3', 'texto' => 'Identificación de escaso tejido linfoide en la muestra, sugiriendo una posible atrofia o disminución de la actividad inmunológica.'],
        ['codigo' => '10.4', 'texto' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
        ['codigo' => '10.5', 'texto' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
        ['codigo' => '10.6', 'texto' => 'Se detecta un aumento en el tamaño de los folículos linfoides, indicativo de una respuesta inmunológica activa.'],
        ['codigo' => '10.7', 'texto' => 'Presencia de células plasmáticas en la pulpa blanca, sugiriendo una respuesta inmunitaria o inflamatoria.'],
        ['codigo' => '10.8', 'texto' => 'Identificación de células de la serie eritroide en la pulpa roja, indicando actividad hematopoyética.'],
        ['codigo' => '10.9', 'texto' => 'Se observa una marcada congestión vascular en la pulpa roja, posiblemente como respuesta a la hemorragia o a una estimulación inflamatoria.'],
        ['codigo' => '10.10', 'texto' => 'Presencia de células fagocíticas en la pulpa roja, indicativas de la función fagocítica del bazo en la eliminación de células sanguíneas viejas o anormales.'],
    ];

    protected $biopsia_feto_descripciones = [
        ['codigo' => '11.1', 'texto' => 'Presencia de tejido fetal bien desarrollado.'],
        ['codigo' => '11.2', 'texto' => 'Presencia de órganos internos correctamente formados.'],
        ['codigo' => '11.3', 'texto' => 'Presencia de tejido nervioso en desarrollo.'],
        ['codigo' => '11.4', 'texto' => 'Presencia de células sanguíneas en formación.'],
        ['codigo' => '11.5', 'texto' => 'Presencia de huesos en proceso de osificación.'],
        ['codigo' => '11.6', 'texto' => 'Presencia de tejido muscular en desarrollo.'],
        ['codigo' => '11.7', 'texto' => 'Presencia de membranas fetales intactas.'],
        ['codigo' => '11.8', 'texto' => 'Presencia de cordón umbilical sin anomalías evidentes.'],
        ['codigo' => '11.9', 'texto' => 'Presencia de estructuras faciales reconocibles.'],
        ['codigo' => '11.10', 'texto' => 'Presencia de extremidades bien formadas.'],
    ];

    protected $biopsia_cerebro_descripciones = [
        ['codigo' => '12.1', 'texto' => 'Presencia de neuronas.'],
        ['codigo' => '12.2', 'texto' => 'Presencia de células gliales.'],
        ['codigo' => '12.3', 'texto' => 'Presencia de fibras nerviosas mielinizadas.'],
        ['codigo' => '12.4', 'texto' => 'Presencia de fibras nerviosas no mielinizadas.'],
        ['codigo' => '12.5', 'texto' => 'Presencia de vasos sanguíneos.'],
        ['codigo' => '12.6', 'texto' => 'Presencia de células inflamatorias.'],
        ['codigo' => '12.7', 'texto' => 'Presencia de infiltración de células neoplásicas.'],
        ['codigo' => '12.8', 'texto' => 'Presencia de cuerpos de inclusión intracelulares.'],
        ['codigo' => '12.9', 'texto' => 'Presencia de placas de proteína beta-amiloide.'],
        ['codigo' => '12.10', 'texto' => 'Presencia de cuerpos de Lewy.'],
    ];

    protected $biopsia_lengua_descripciones = [
        ['codigo' => '13.1', 'texto' => 'Presencia de epitelio escamoso estratificado.'],
        ['codigo' => '13.2', 'texto' => 'Presencia de papilas gustativas filiformes.'],
        ['codigo' => '13.3', 'texto' => 'Presencia de papilas gustativas fungiformes.'],
        ['codigo' => '13.4', 'texto' => 'Presencia de papilas gustativas foliadas.'],
        ['codigo' => '13.5', 'texto' => 'Presencia de células caliciformes.'],
        ['codigo' => '13.6', 'texto' => 'Presencia de células basales.'],
        ['codigo' => '13.7', 'texto' => 'Presencia de células parabasales.'],
        ['codigo' => '13.8', 'texto' => 'Presencia de células intermedias.'],
        ['codigo' => '13.9', 'texto' => 'Presencia de células superficiales.'],
        ['codigo' => '13.10', 'texto' => 'Presencia de células inflamatorias.'],
        ['codigo' => '13.11', 'texto' => 'Presencia de células de Langerhans.'],
        ['codigo' => '13.12', 'texto' => 'Presencia de células glandulares.'],
        ['codigo' => '13.13', 'texto' => 'Presencia de células neoplásicas.'],
        ['codigo' => '13.14', 'texto' => 'Presencia de células con cambios atípicos.'],
        ['codigo' => '13.15', 'texto' => 'Presencia de cuerpos extraños.'],
    ];

    protected $biopsia_ovario_descripciones = [
        ['codigo' => '14.1', 'texto' => 'Presencia de folículos primordiales.'],
        ['codigo' => '14.2', 'texto' => 'Presencia de folículos primarios.'],
        ['codigo' => '14.3', 'texto' => 'Presencia de folículos secundarios.'],
        ['codigo' => '14.4', 'texto' => 'Presencia de folículos maduros.'],
        ['codigo' => '14.5', 'texto' => 'Presencia de células de la granulosa.'],
        ['codigo' => '14.6', 'texto' => 'Presencia de células de la teca.'],
        ['codigo' => '14.7', 'texto' => 'Presencia de células lúteas.'],
        ['codigo' => '14.8', 'texto' => 'Presencia de cuerpos albicans.'],
        ['codigo' => '14.9', 'texto' => 'Presencia de células intersticiales.'],
        ['codigo' => '14.10', 'texto' => 'Presencia de células estromales.'],
    ];

    protected $biopsia_trompas_falopio_descripciones = [
        ['codigo' => '15.1', 'texto' => 'Presencia de epitelio cilíndrico.'],
        ['codigo' => '15.2', 'texto' => 'Presencia de células ciliadas.'],
        ['codigo' => '15.3', 'texto' => 'Presencia de células secretoras.'],
        ['codigo' => '15.4', 'texto' => 'Presencia de células endometriales ectópicas.'],
        ['codigo' => '15.5', 'texto' => 'Presencia de células inflamatorias.'],
        ['codigo' => '15.6', 'texto' => 'Presencia de células escamosas metaplásicas.'],
        ['codigo' => '15.7', 'texto' => 'Presencia de células glandulares atípicas.'],
        ['codigo' => '15.8', 'texto' => 'Presencia de células endometriales.'],
        ['codigo' => '15.9', 'texto' => 'Presencia de células estromales.'],
        ['codigo' => '15.10', 'texto' => 'Presencia de cuerpos extraños.'],
    ];

    protected $biopsia_pancreas_descripciones = [
        ['codigo' => '16.1', 'texto' => 'Presencia de células acinares.'],
        ['codigo' => '16.2', 'texto' => 'Presencia de islotes de Langerhans.'],
        ['codigo' => '16.3', 'texto' => 'Presencia de células ductales.'],
        ['codigo' => '16.4', 'texto' => 'Presencia de infiltración de células inflamatorias.'],
        ['codigo' => '16.5', 'texto' => 'Presencia de necrosis focal.'],
        ['codigo' => '16.6', 'texto' => 'Presencia de fibrosis intersticial.'],
        ['codigo' => '16.7', 'texto' => 'Presencia de células neoplásicas.'],
        ['codigo' => '16.8', 'texto' => 'Presencia de cuerpos de inclusión eosinofílicos.'],
        ['codigo' => '16.9', 'texto' => 'Presencia de calcificación distrófica.'],
        ['codigo' => '16.10', 'texto' => 'Presencia de células adiposas en el estroma.'],
    ];

    protected $biopsia_piel_descripciones = [
        ['codigo' => '17.1', 'texto' => 'Predominio de células epiteliales escamosas superficiales.'],
        ['codigo' => '17.2', 'texto' => 'Predominio de células epiteliales escamosas intermedias.'],
        ['codigo' => '17.3', 'texto' => 'Predominio de células epiteliales escamosas parabasales.'],
        ['codigo' => '17.4', 'texto' => 'Poli nucleares neutrófilos.'],
        ['codigo' => '17.8', 'texto' => 'Células metaplásicas inmaduras.'],
        ['codigo' => '17.9', 'texto' => 'Células reactivas.'],
        ['codigo' => '17.11', 'texto' => 'Alteraciones celulares sugerentes de HPV.'],
        ['codigo' => '17.12', 'texto' => 'Alteraciones celulares sugerentes de Herpes.'],
        ['codigo' => '17.13', 'texto' => 'Células neoplásicas.'],
        ['codigo' => '17.14', 'texto' => 'Células superficiales e intermedias con cambios atípicos.'],
        ['codigo' => '17.15', 'texto' => 'Células intermedias y parabasales con algunos cambios atípicos.'],
        ['codigo' => '17.16', 'texto' => 'Células parabasales con algunos cambios atípicos.'],
        ['codigo' => '17.17', 'texto' => 'Células escamosas de significado incierto.'],
        ['codigo' => '17.18', 'texto' => 'Células epiteliales glandulares de significado incierto.'],
    ];

    protected $cervico_vaginal_descripciones = [
        ['codigo' => '1.1', 'texto' => 'Predominio de células epiteliales escamosas superficiales.'],
        ['codigo' => '1.2', 'texto' => 'Predominio de células epiteliales escamosas intermedias.'],
        ['codigo' => '1.3', 'texto' => 'Predominio de células epiteliales escamosas parabasales.'],
        ['codigo' => '1.4', 'texto' => 'Polinucleares neutrófilos.'],
        ['codigo' => '1.5', 'texto' => 'Hematíes.'],
        ['codigo' => '1.6', 'texto' => 'Células endocervicales en exocervix.'],
        ['codigo' => '1.7', 'texto' => 'Células metaplásicas en exocérvix.'],
        ['codigo' => '1.8', 'texto' => 'Células metaplásicas inmaduras.'],
        ['codigo' => '1.9', 'texto' => 'Células reactivas.'],
        ['codigo' => '1.10', 'texto' => 'Células endometriales en mujer ≥ de 40 años.'],
        ['codigo' => '1.11', 'texto' => 'Alteraciones celulares sugerentes con HPV.'],
        ['codigo' => '1.12', 'texto' => 'Alteraciones celulares sugerentes de Herpes.'],
        ['codigo' => '1.13', 'texto' => 'Células neoplásicas.'],
        ['codigo' => '1.14', 'texto' => 'Células superficiales e intermedias con cambios atípicos.'],
        ['codigo' => '1.15', 'texto' => 'Células intermedias y parabasales con algunos cambios atípicos.'],
        ['codigo' => '1.16', 'texto' => 'Células parabasales con algunos cambios atípicos.'],
        ['codigo' => '1.17', 'texto' => 'Células escamosas de significado incierto.'],
        ['codigo' => '1.18', 'texto' => 'Células epiteliales glandulares de significado incierto.'],
        ['codigo' => '1.19', 'texto' => 'Estructuras micóticas correspondientes a Candida albicans'],
        ['codigo' => '1.20', 'texto' => 'Estructuras micóticas correspondientes a Candida glabrata'],
        ['codigo' => '1.21', 'texto' => 'Estructuras bacterianas con disposición característica de actinomyces'],
        ['codigo' => '1.22', 'texto' => 'Estructuras bacterianas correspondiente de Gardnerella vaginalis'],
        ['codigo' => '1.23', 'texto' => 'Estructuras bacterianas de naturaleza cocácea'],
        ['codigo' => '1.24', 'texto' => 'Estructuras bacterianas sugerentes de Leptothrix'],
        ['codigo' => '1.25', 'texto' => 'Estructuras correspondientes a Trichomonas vaginalis'],
        ['codigo' => '1.26', 'texto' => 'Células histiocitarias multinucleadas'],
        ['codigo' => '1.27', 'texto' => 'Células epiteliales de tipo escamoso con intensos cambios atípicos'],
        ['codigo' => '1.28', 'texto' => 'Presencia de epitelio endometrial sin cambios atípicos'],
        ['codigo' => '1.29', 'texto' => 'Células epiteliales de apariencia glandular con núcleos amplios e irregulares'],
    ];

    protected $hematologico_descripciones = [
        ['codigo' => '2.1', 'texto' => 'Predominio de eritrocitos normocíticos normocrómicos.'],
        ['codigo' => '2.2', 'texto' => 'Predominio de eritrocitos microcíticos hipocrómicos.'],
        ['codigo' => '2.3', 'texto' => 'Presencia de esferocitos.'],
        ['codigo' => '2.4', 'texto' => 'Presencia de dianocitos (células en forma de lágrima).'],
        ['codigo' => '2.5', 'texto' => 'Leucocitos con predominio de neutrófilos.'],
        ['codigo' => '2.6', 'texto' => 'Leucocitos con predominio de linfocitos.'],
        ['codigo' => '2.7', 'texto' => 'Presencia de células blásticas.'],
        ['codigo' => '2.8', 'texto' => 'Presencia de eosinófilos aumentados.'],
        ['codigo' => '2.9', 'texto' => 'Presencia de basófilos aumentados.'],
        ['codigo' => '2.10', 'texto' => 'Trombocitosis (aumento de plaquetas).'],
        ['codigo' => '2.11', 'texto' => 'Trombocitopenia (disminución de plaquetas).'],
        ['codigo' => '2.12', 'texto' => 'Anomalías en la morfología plaquetaria.'],
        ['codigo' => '2.13', 'texto' => 'Presencia de células atípicas sugestivas de neoplasia.'],
        ['codigo' => '2.14', 'texto' => 'Presencia de células inmaduras del linaje mieloide.'],
        ['codigo' => '2.15', 'texto' => 'Presencia de células inmaduras del linaje linfático.'],
        ['codigo' => '2.16', 'texto' => 'Anisocitosis (variabilidad en el tamaño de los eritrocitos).'],
        ['codigo' => '2.17', 'texto' => 'Poiquilocitosis (variabilidad en la forma de los eritrocitos).'],
        ['codigo' => '2.18', 'texto' => 'Presencia de cuerpos de Howell-Jolly.'],
        ['codigo' => '2.19', 'texto' => 'Células con inclusiones de hierro (cuerpos de Pappenheimer).'],
        ['codigo' => '2.20', 'texto' => 'Presencia de parásitos intraeritrocitarios.'],
    ];

    protected $orina_descripciones = [
        ['codigo' => '3.1', 'texto' => 'pH normal.'],
        ['codigo' => '3.2', 'texto' => 'pH elevado.'],
        ['codigo' => '3.3', 'texto' => 'pH reducido.'],
        ['codigo' => '3.4', 'texto' => 'Presencia de proteínas.'],
        ['codigo' => '3.5', 'texto' => 'Negativo para proteínas.'],
        ['codigo' => '3.6', 'texto' => 'Glucosa presente.'],
        ['codigo' => '3.7', 'texto' => 'Negativo para la glucosa.'],
        ['codigo' => '3.8', 'texto' => 'Cetonas detectadas.'],
        ['codigo' => '3.9', 'texto' => 'Negativo para cetonas.'],
        ['codigo' => '3.10', 'texto' => 'Hemoglobina presente.'],
        ['codigo' => '3.11', 'texto' => 'Negativo para hemoglobina.'],
        ['codigo' => '3.12', 'texto' => 'Bilirrubina detectada.'],
        ['codigo' => '3.13', 'texto' => 'Negativo para bilirrubina.'],
        ['codigo' => '3.14', 'texto' => 'Urobilinógeno normal.'],
        ['codigo' => '3.15', 'texto' => 'Urobilinógeno elevado.'],
        ['codigo' => '3.16', 'texto' => 'Presencia de nitritos.'],
        ['codigo' => '3.17', 'texto' => 'Negativo para nitritos.'],
        ['codigo' => '3.18', 'texto' => 'Presencia de leucocitos.'],
        ['codigo' => '3.19', 'texto' => 'Ausencia de leucocitos.'],
        ['codigo' => '3.20', 'texto' => 'Presencia de eritrocitos.'],
        ['codigo' => '3.21', 'texto' => 'Ausencia de eritrocitos.'],
        ['codigo' => '3.22', 'texto' => 'Células epiteliales.'],
        ['codigo' => '3.23', 'texto' => 'Cilindros hialinos.'],
        ['codigo' => '3.24', 'texto' => 'Cilindros granulosos.'],
        ['codigo' => '3.25', 'texto' => 'Cristales (oxalato de calcio, ácido úrico, etc.).'],
        ['codigo' => '3.26', 'texto' => 'Bacterias.'],
        ['codigo' => '3.27', 'texto' => 'Levaduras.'],
        ['codigo' => '3.28', 'texto' => 'Parásitos.'],
    ];

    protected $esputo_descripciones = [
        ['codigo' => '4.1', 'texto' => 'Presencia de células epiteliales escamosas.'],
        ['codigo' => '4.2', 'texto' => 'Presencia de células epiteliales columnares.'],
        ['codigo' => '4.3', 'texto' => 'Presencia de células inflamatorias (neutrófilos, linfocitos, eosinófilos, macrófagos).'],
        ['codigo' => '4.4', 'texto' => 'Presencia de células metaplásicas.'],
        ['codigo' => '4.5', 'texto' => 'Presencia de células malignas.'],
        ['codigo' => '4.6', 'texto' => 'Presencia de células atípicas sugestivas de neoplasia.'],
        ['codigo' => '4.7', 'texto' => 'Presencia de microorganismos (bacterias, hongos, micobacterias).'],
        ['codigo' => '4.8', 'texto' => 'Presencia de células sanguíneas (eritrocitos, plaquetas).'],
        ['codigo' => '4.9', 'texto' => 'Presencia de material mucoso o mucopurulento.'],
        ['codigo' => '4.10', 'texto' => 'Presencia de cristales (de colesterol, calcio, etc.).'],
        ['codigo' => '4.11', 'texto' => 'Ausencia de células significativas para el análisis.'],
    ];

    protected $bucal_descripciones = [
        ['codigo' => '5.1', 'texto' => 'Presencia de células epiteliales escamosas.'],
        ['codigo' => '5.2', 'texto' => 'Presencia de células epiteliales cilíndricas.'],
        ['codigo' => '5.3', 'texto' => 'Presencia de células inflamatorias (neutrófilos, linfocitos, macrófagos).'],
        ['codigo' => '5.4', 'texto' => 'Presencia de células glandulares.'],
        ['codigo' => '5.5', 'texto' => 'Presencia de células metaplásicas.'],
        ['codigo' => '5.6', 'texto' => 'Presencia de células atípicas sugestivas de neoplasia.'],
        ['codigo' => '5.7', 'texto' => 'Presencia de microorganismos (bacterias, hongos, levaduras).'],
        ['codigo' => '5.8', 'texto' => 'Presencia de células anormales con cambios citológicos.'],
        ['codigo' => '5.9', 'texto' => 'Ausencia de células significativas para el análisis.'],
    ];

    /**
     * Devuelve el array con los códigos y textos asociados a las descripciones
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
    public function getDescripciones($codNaturaleza) {
        switch ($codNaturaleza) {
            case 'BB':
                return $this->biopsia_bazo_descripciones;
            case 'BCB':
                return $this->biopsia_cerebro_descripciones;
            case 'BC':
                return $this->biopsia_corazon_descripciones;
            case 'BEF':
                return $this->biopsia_esofago_descripciones;
            case 'BES':
                return $this->biopsia_estomago_descripciones;
            case 'BF':
                return $this->biopsia_feto_descripciones;
            case 'BH':
                return $this->biopsia_higado_descripciones;
            case 'BI':
                return $this->biopsia_intestino_descripciones;
            case 'BL':
                return $this->biopsia_lengua_descripciones;
            case 'BO':
                return $this->biopsia_ovario_descripciones;
            case 'BPA':
                return $this->biopsia_pancreas_descripciones;
            case 'BPI':
                return $this->biopsia_piel_descripciones;
            case 'BP':
                return $this->biopsia_pulmon_descripciones;
            case 'BR':
                return $this->biopsia_rinon_descripciones;
            case 'BT':
                return $this->biopsia_testiculo_descripciones;
            case 'BTF':
                return $this->biopsia_trompa_falopio_descripciones;
            case 'BU':
                return $this->biopsia_utero_descripciones;
            case 'CB':
                return $this->bucal_descripciones;
            case 'CV':
                return $this->cervico_vaginal_descripciones;
            case 'E':
                return $this->esputo_descripciones;
            case 'H':
                return $this->hematologico_descripciones;
            case 'O':
                return $this->orina_descripciones;
            default:
                return array(); // Retorna un array vacío si el tipo de muestra no es reconocido
        }
    }
}
