{{-- <div class="dropdown">
    <a class="  float-right " type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-expanded="false">
     <i style="font-size: 20px" class="fa fa-ellipsis-v text-white"></i>
    </a>
</div>  --}}

  @php
      

    $jsonobj = '{
        "1":"أدرار",
        "2":"الشلف",
        "3":"الأغواط",
        "4":"أم البواقي",
        "5":"باتنة",
        "6":"بجاية",
        "7":"بسكرة",
        "8":"بشار",
        "9":"البليدة",
    "01":"أدرار",
    "33":"إليزي",
    "04":"أم البواقي",
    "03":"الأغواط",
    "09":"البليدة",
    "10":"البويرة",
    "32":"البيض",
    "16":"الجزائر",
    "17":"الجلفة",
    "02":"الشلف",
    "36":"الطارف",
    "26":"المدية",
    "28":"المسيلة",
    "45":"النعامة",
    "39":"الوادي",
    "05":"باتنة",
    "06":"بجاية",
    "34":"برج بوعريريج",
    "07":"بسكرة",
    "08":"بشار",
    "35":"بومرداس",
    "12":"تبسة",
    "13":"تلمسان",
    "11":"تمنراست",
    "14":"تيارت",
    "42":"تيبازة",
    "15":"تيزي وزو",
    "38":"تيسمسيلت",
    "37":"تيندوف",
    "18":"جيجل",
    "40":"خنشلة",
    "19":"سطيف",
    "20":"سعيدة",
    "21":"سكيكدة",
    "41":"سوق أهراس",
    "22":"سيدي بلعباس",
    "23":"عنابة",
    "44":"عين الدفلى",
    "46":"عين تيموشنت",
    "47":"غرداية",
    "48":"غليزان",
    "24":"قالمة",
    "25":"قسنطينة",
    "27":"مستغانم",
    "29":"معسكر",
    "43":"ميلة",
    "30":"ورقلة",
    "31":"وهران"
    }';
    
    $obj = json_decode($jsonobj);



    $key = array_search($commande->client->wilaya, get_object_vars($obj));

    $WilayaNumber= substr($key, 0);





    




    $url = "https://api.yalidine.com/v1/communes/?has_stop_desk=true&wilaya_id=".$WilayaNumber; // the communes endpoint
    $api_id = "58955441267299948423"; // your api ID
    $api_token = "f8GCfYr6yNNE8Exk1vIv34OFSjSoJ7oTRulGDVR52PgcmQ035jKJetdAqet9IhWp"; // your api token
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'X-API-ID: '. $api_id,
            'X-API-TOKEN: '. $api_token
        ),
    ));
    
    $response_json = curl_exec($curl);
    curl_close($curl);
    
  $response_array = json_decode($response_json); // converting the json to a php array

 

  @endphp
<hr class="bg-white ">
        @if ($commande->type=="1" OR $commande->type=="2"  OR $commande->type=="6" )
        <a class="btn btn-danger  btn-circle float-left   mr-1" href="{{route('commandes.annuler',$commande->id)}}"  >
            <span class="     fa fa-remove  "></span>
        </a>
        @endif
        
        @if ($commande->type=="2")
        <a class="btn btn-success btn-circle float-left    mr-1" href="{{route('commandes.delivration',$commande->id) }}">
            <span class="  fa fa-truck   "></span>
          
        </a> 

      
        
        <a class="btn btn-warning btn-circle float-left  mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh    "></span>
        </a>
        @endif
        
        @if ($commande->type=="1")
    {{--     <a class="btn btn-primary btn-circle float-left mb-3   mr-1" href="{{route('commandes.confirmation',$commande->id) }}">
            <span class="    fa fa-arrow-down    "></span>
        </a> 
 --}}


        <form method="POST" action="{{route('colis.add',$commande->id) }}"  enctype="multipart/form-data">
            @csrf
     



              <input type="hidden" name="order_id" value="{{$commande->slug}}">
            
             
              <input @if ($commande->client->nom=="/") placeholder="nom" value="" 
           @endif class="form-control my-2" type="text" name="familyname" value="{{$commande->client->nom}}">
           <input  @if ($commande->client->prenom=="/")
           placeholder="prenom" value="" 
        @endif
         class="form-control my-2 " type="text" name="firstname" value="{{$commande->client->prenom}}">
              <input type="hidden" name="contact_phone" value="{{$commande->client->phone}}">
              <input type="hidden" name="address" value="{{$commande->client->address}}">


              <div class="form-group">
                  <select  @if (count($response_array->data)=="1")
                      hidden
                  @endif id="my-select" class="form-control" name="to_commune_name">
                    @foreach($response_array->data as $item){
                                            @php
                                        $wilaya_name=$item->wilaya_name
                                            @endphp
                                            
                     <option> {{$item->name}} </option>
                         @endforeach
                  </select>
              </div>
              <input type="hidden" name="to_wilaya_name" value="{{$wilaya_name}}">
              <input type="hidden" name="product_list" value="{{$commande->product->nom}}">
              <input type="hidden" name="price" value="{{$commande->total_price}}">
          
          
            <button type="submit" class="btn btn-primary">Confirmer</button>
          </form>


        @endif
        
        
        @if ($commande->type=="6")
        <a class="btn btn-success btn-circle float-left mr-1" href="{{route('commandes.done',$commande->id) }}">
            <span class="    fa fa-check   "></span>
        </a> 
        <a class="btn btn-warning btn-circle float-left   mr-1" href="{{route('commandes.return',$commande->id) }}">
            <span class="    fa fa-refresh  "></span>
        </a> 
        @endif
    </div>
    
