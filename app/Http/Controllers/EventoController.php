<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos=Contacto::all();
        $con=["en", "af", "ar-dz", "ar-kw", "ar-ly", "ar-ma", "ar-sa", "ar-tn", "ar", "az", "bg", "bs", "ca", "cs", "da", "de", "el", "en-au", "en-gb", "en-nz", "es", "et", "eu", "fa", "fi", "fr", "fr-ch", "gl", "he", "hi", "hr", "hu", "id", "is", "it", "ja", "ka", "kk", "ko", "lb", "lt", "lv", "mk", "ms", "nb", "ne", "nl", "nn", "pl", "pt-br", "pt", "ro", "ru", "sk", "sl", "sq", "sr-cyrl", "sr", "sv", "th", "tr", "ug", "uk", "uz", "vi", "zh-cn", "zh-tw"];
        $nom=["ab"=>"abjaso (o abjasiano)","aa"=>"afar","af"=>"afrikaans","ay"=>"aimara","ak"=>"akano","sq"=>"albanés","de"=>"alemán","am"=>"amárico","ar"=>"árabe","an"=>"aragonés","hy"=>"armenio","as"=>"asamés","av"=>"avar","ae"=>"avéstico","az"=>"azerí","bm"=>"bambara","ba"=>"baskir","bn"=>"bengalí","bh"=>"bhojpurí","be"=>"bielorruso","my"=>"birmano","bi"=>"bislama","bs"=>"bosnio","br"=>"bretón","bg"=>"búlgaro","ks"=>"cachemiro","km"=>"camboyano (o jemer)","kn"=>"canarés","ca"=>"catalán","ch"=>"chamorro","ce"=>"checheno","cs"=>"checo","ny"=>"chichewa","zh"=>"chino","za"=>"chuan (o zhuang)","cv"=>"chuvasio","si"=>"cingalés","ko"=>"coreano","kw"=>"córnico","co"=>"corso","cr"=>"cree","hr"=>"croata","da"=>"danés","dz"=>"dzongkha","cu"=>"eslavo eclesiástico antiguo","sk"=>"eslovaco","sl"=>"esloveno","es"=>"español (o castellano)","eo"=>"esperanto","et"=>"estonio","ee"=>"ewe","fo"=>"feroés","fj"=>"fijiano (o fidji)","fi"=>"finés (o finlandés)","fr"=>"francés","fy"=>"frisón (o frisio)","ff"=>"fula","gd"=>"gaélico escocés","cy"=>"galés","gl"=>"gallego","ka"=>"georgiano","el"=>"griego (moderno)","kl"=>"groenlandés (o kalaallisut)","gn"=>"guaraní","gu"=>"guyaratí (o guyaratí)","ht"=>"haitiano","ha"=>"hausa","he"=>"hebreo","hz"=>"herero","hi"=>"hindi (o hindú)","ho"=>"hiri motu","hu"=>"húngaro","io"=>"ido","ig"=>"igbo","id"=>"indonesio","en"=>"inglés","ia"=>"interlingua","iu"=>"inuktitut","ik"=>"inupiaq","ga"=>"irlandés (o gaélico)","is"=>"islandés","it"=>"italiano","ja"=>"japonés","jv"=>"javanés","kr"=>"kanuri","kk"=>"kazajo (o kazajio)","ki"=>"kikuyu","ky"=>"kirguís","rn"=>"kirundi","kv"=>"komi","kg"=>"kongo","kj"=>"kuanyama","ku"=>"kurdo","lo"=>"lao","la"=>"latín","lv"=>"letón","li"=>"limburgués","ln"=>"lingala","lt"=>"lituano","lu"=>"luba-katanga","lg"=>"luganda","lb"=>"luxemburgués","mk"=>"macedonio","ml"=>"malayalam","ms"=>"malayo","dv"=>"maldivo","mg"=>"malgache (o malagasy)","mt"=>"maltés","gv"=>"manés (gaélico manés o de Isla de Man)","mi"=>"maorí","mr"=>"maratí","mh"=>"marshalés","mo"=>"moldavo","mn"=>"mongol","na"=>"nauruano","nv"=>"navajo","nd"=>"ndebele del norte","nr"=>"ndebele del sur","ng"=>"ndonga","nl"=>"neerlandés (u holandés)","ne"=>"nepalí","no"=>"noruego","nb"=>"noruego bokmål","nn"=>"nynorsk","ie"=>"occidental","oc"=>"occitano","oj"=>"ojibwa","or"=>"oriya","om"=>"oromo","os"=>"osético","pi"=>"pali","pa"=>"panyabí (o penyabi)","ps"=>"pastú (o pashto)","fa"=>"persa","pl"=>"polaco","pt"=>"portugués","qu"=>"quechua","rm"=>"retorrománico","rw"=>"ruandés","ro"=>"rumano","ru"=>"ruso","se"=>"sami septentrional","sm"=>"samoano","sg"=>"sango","sa"=>"sánscrito","sc"=>"sardo","sr"=>"serbio","st"=>"sesotho","tn"=>"setsuana","sn"=>"shona","sd"=>"sindhi","so"=>"somalí","sw"=>"suajili","ss"=>"suazi (swati o siSwati)","sv"=>"sueco","su"=>"sundanés","tl"=>"tagalo","ty"=>"tahitiano","th"=>"tailandés","ta"=>"tamil","tt"=>"tártaro","tg"=>"tayiko","te"=>"telugú","bo"=>"tibetano","ti"=>"tigriña","to"=>"tongano","ts"=>"tsonga","tr"=>"turco","tk"=>"turcomano","tw"=>"twi","uk"=>"ucraniano","ug"=>"uigur","ur"=>"urdu","uz"=>"uzbeko","wa"=>"valón","eu"=>"vascuence (o euskera)","ve"=>"venda","vi"=>"vietnamita","vo"=>"volapük","wo"=>"wolof","xh"=>"xhosa","ii"=>"yi de Sichuán","yi"=>"yídish (o yiddish)","yo"=>"yoruba","zu"=>"zulú"];
        return view('eventos.index',compact('con', 'nom', 'contactos'));
    }

    


    public function load()
    {
        $data = [];
        $result=Evento::all();
        foreach($result as $row) {
            if($row->allday){

            $allday='true';

            } else{
                $allday='false'; 
            }

            $s=explode(" ", $row->start_event);
            if($s[1]=='00:00:00'){
                $start = date('Y-m-d', strtotime($row->start_event));
            } else {
                $start = date('Y-m-d H:i:s', strtotime($row->start_event));
            }

            $e=explode(" ", $row->end_event);
            if($row->end_event==null){
                $end = null;
            } else {
            if($e[1]=='00:00:00'){
                $end = date('Y-m-d', strtotime($row->end_event));
            } else {
                $end = date('Y-m-d H:i:s', strtotime($row->end_event));
            }
        }
            
            
            $data[] = [
                'id'              => $row->id,
                'title'           => $row->contacto->nombres." ".$row->contacto->apellidos,
                'start'           => $start,
                'end'             => $end,
                'backgroundColor' => $row->color,
                'textColor'       => $row->text_color,
                'allday'          => $row->allday==1? true:false,
                'description' => 'This is a cool event'
            ];
        }
        $datos=json_encode($data);
        return  $datos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    



        $evento = new Evento;

        $evento->contacto_id = $request->title;
        $evento->start_event = $request->startDate;
        $evento->end_event = $request->endDate;
        $evento->color = $request->color;
        $evento->text_color = $request->text_color;
        $evento->allday = $request->allday;

        $evento->save();  
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $eve=Evento::where('id',$id)->first();
        return $eve->contacto_id;
    }

    public function drop()
    {
        
        $start = date('Y-m-d H:i:s', strtotime($_POST['start_event']));
        $end = date('Y-m-d H:i:s', strtotime($_POST['end_event']));
        $id         = $_POST['id'];

        $evento=Evento::find($id);
        $evento->start_event=$start;
        $evento->end_event=$end;
        
        $evento->save();
        return $start;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=Evento::findOrFail($id); 
        $data = [
            'id'        => $row->id,
            'title'     => $row->title,
            'start'     => $row->start_event,
            'end'       => $row->end_event,
            'color'     => $row->color,
            'textColor' => $row->text_color,
            'allday' => $row->allday
        ];
        echo json_encode($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'start_event' => 'nullable',
            'end_event' => 'nullable',
            'color' => 'nullable',
            'text_color' => 'nullable',
        ], [
            'title.required' => 'El campo nombre es obligatorio',
            'title.unique'  => 'Ya se Encuentra registrado en la Base de datos'
        ]);
    
            $evento=Evento::find($request->editEventId);
            $evento->title=$request->title;
            $evento->start_event=$request->start_event;
            $evento->end_event=$request->end_event;
            $evento->color=$request->color;
            $evento->text_color=$request->text_color;
            
            $evento->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $evento=Evento::findOrFail($_POST['id']);
        $evento->delete();
        
    }
}
