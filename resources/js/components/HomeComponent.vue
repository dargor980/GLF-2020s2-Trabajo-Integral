 
<template>
    <div class="container mt-5 pt-4">
        <h1 class="textocolor py-3">Nueva Hoja de Rutas</h1>  
        <div class="row">
            <div class="col-12">
                <form @submit.prevent="createCamiones" class="cardaux textocolor p-4" v-if="option1==true">  
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label for="id" class="input-group-text">N° de camiones a trabajar:</label> 
                        </div>
                        <input type="number" name="id" min="0" class="form-control" v-model="camionesD"> 
                    </div>

                    <div class="text-center my-3">
                        <button id="btn1" class="btn btn-success btn-sm" type="submit">Siguiente</button>
                    </div>
                </form>     
            </div>
        </div>
        <!--LISTADO DE CAMIONES-->
        <h3 class="fredoka textocolor" v-if="option2==true">Listado de Camiones</h3>
        <div class="row accordion cardaux" id="automatas" v-if="option2==true">
            <ul class="col-lg-3 col-sm-12 my-2 list-group list-group-flush" @click="backForm1">
                <li class="list-group-item analisis collapsed info textocolor" v-for="(item,index) in camiones" :key="index" data-toggle="collapse" :data-target="'#camion_'+item.id" aria-expanded="false" :aria-controls="'camion_'+item.id">
                    Camión N°{{item.id}}
                </li>
            </ul>
            <div class="col-lg-7 col-sm-12 my-2">
                <div class="collapse" v-for="(item,index) in camiones" :key="index" :id="'camion_'+item.id" data-parent="#automatas" >
                    <div class="my-3" >
                        <div class="row d-flex justify-content-center">
                            <h4 class="textocolor fredoka">Camión N°{{item.id}}</h4>
                        </div>
                        <form @submit.prevent="asignarDistribuidor(item.id)" class="textocolor p-3" v-if="form1==true">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">Seleccione centro de distribución</label>
                                </div>
                                <select class="custom-select" v-model="valor">
                                    <option selected value="0">Selecciona...</option>
                                    <option v-for="(item,index) in centrosDistribucion" :key="index" :value="item.N">Distribuidor {{item.N}}</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success btn-sm" type="submit">Asignar Centro</button>
                            </div>
                        </form>
                        <div class="input-group mb-3 p-3" v-if="form2==true || dist==true">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Centro de distribución</label>
                            </div>
                            <input type="text" :value="'Distribuidor'+item.centroDist" disabled class="form-control">
                        </div>
                        <div class="text-center" v-if="form2==true">
                            <button class="btn btn-success" @click="formControl2">Asignar punto de venta</button>
                        </div>
                        <h4 v-if="form3==true" class="textocolor p-3">Asignar punto de venta destino</h4>
                        <form @submit.prevent="asignarPuntoVenta(item.id)" class="textocolor p-3" v-if="form3==true"> 
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">Seleccione punto de venta</label>
                                </div>
                                <select class="custom-select" v-model="valor2">
                                    <option selected :value="0">Selecciona...</option>
                                    
                                    <option  v-for="(item,index) in puntosVenta" :key="index" :value="item.N">
                                        
                                        Punto Venta {{item.N}}
                                        
                                    </option>
                                    
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">Ingrese Cantidad de productos</label>
                                </div>
                                <input type="number" min="0" max="1000" class="form-control" v-model="cantidad">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success btn-sm" type="submit">Agregar</button>
                            </div>                  
                        </form> 
                        <div class="py-3 px-3">
                            <h4 class="textocolor"> Cantidad restante de productos disponible: {{item.cantdisponible}}</h4> 
                        </div> 

                        <div class="py-3 px-3">
                            <table class="table table-bordered textocolor">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Punto de venta</th>
                                        <th scopte="col">cantidad productos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(el,index2) in item.puntoVenta" :key="index2">
                                        <th>{{el.id}}</th>
                                        <th>{{el.cant}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 

                        <div class="text-center">
                            <button class="btn btn-lg btn-success" @click="homeControl3" >Generar Hoja de rutas</button>
                        </div>  
                    </div>
                </div> 
            </div>
        </div>    
        <!--/LISTADO DE CAMIONES-->


        <div class="row">
            <div class="col-12" v-if="option3==true">
                <h4 class="fredoka textocolor">Hoja de ruta</h4>
                <table class="table table-bordered cardaux textocolor">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Camión</th>
                        <th scope="col">Centro de distribución</th>
                        <th scope="col">Puntos de venta</th>
                        <th scope="col">Ruta</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <!--Pendiente de revisión   -->
                        <tr v-for="(item, index) in camiones" :key="index">
                            <th scope="row">{{item.id}}</th>
                            <td>{{item.centroDist}}</td>
                            <table class="table table-bordered textocolor">
                                <th colspan="3">#</th>
                                <tr v-for="(otem, ondex) in item.puntoVenta" :key="ondex">
                                    <th>id: {{otem.id}} </th> 
                                    <th>Cantidad: {{otem.cant}}</th>                                   
                                </tr>
                            </table>

                            <table class="table table-bordered textocolor">
                                <th colspan="3">Ruta</th>
                                <tr v-for="(dtem, dndex) in item.ruta" :key="dndex">
                                    <th>Punto de venta: {{dtem}} </th>                                    
                                </tr>
                            </table>
                            <td>Distancia totál{{item.distancia}}</td>

                        </tr>                       
                    </tbody>
                </table>
                
            </div>
        </div>  
              
    </div>
    
</template>

<script>

export default {
    data(){
        return{
            valor:'',
            valor2:'',
            cantidad:'',
            puntosVenta:[],
            puntosVentaEstatico:[],
            centrosDistribucion:[],
            dRestante:'',
            camionesD:'',
            camiones:[],

            fabricaCentros:[],
            centrosPuntos:[], //{p,c,d}
            puntosCercanos:[], //lista de puntos entre puntos
            
            nodos:[{id:'estacionamiento',label:'estacionamiento'}],
            nodo:{id:'', label:'', x:'', y:''},
            aristas:[],
            arista:{from:'', label:'', to:'', color: {color:'rgb(0,0,0)'}},
            //Variables control de vistas
            option1:true,
            option2:false,
            option3:false,
            form1:true,
            form2:false,
            dist:false,
            form3:false,
        }
    },

    created(){
        axios.get('puntosventa').then(response =>{
            this.puntosVenta=response.data; //[p1{id,n,x,y},p2{id,n,x,y},p3{id,n,x,y}]
            //console.log("axios",this.puntosVenta);
        });
        //console.log("axios2",this.puntosVenta);
        axios.get('centrosdistribucion').then(response =>{
            this.centrosDistribucion=response.data; //[c1{id,n,x,y},c2{id,n,x,y},c3{id,n,x,y}]
            //console.log("axios",this.centrosDistribucion);
        });
        
        //console.log("axios2",this.centrosDistribucion);
        for(var i=0; i<this.puntosVenta.length;i++){
            this.nodo.id= this.puntosVenta[i].N;
            this.nodo.type= this.puntosVenta[i].type;            
            this.nodo.label= this.puntosVenta[i].N;
            this.nodo.x= this.puntosVenta[i].x;
            this.nodo.y= this.puntosVenta[i].y;
            this.nodos.push(this.nodo);
            this.nodo={id:'', label:'', x:'', y:''};
        }
        //console.log("nodos1:",this.nodos);

        for(var j=0; j<this.centrosDistribucion.length; j++){
            this.nodo.id= this.centrosDistribucion[j].N;
            this.nodo.type= this.centrosDistribucion[j].type;
            this.nodo.label= this.centrosDistribucion[j].N;
            this.nodo.x= this.centrosDistribucion[j].x;
            this.nodo.y= this.centrosDistribucion[j].y;
            this.nodos.push(this.nodo);
            this.nodo={id:'', label:'', x:'', y:''};
        }
        
    },

    methods:{
        homeControl1(){
            
            this.option1=false;
            this.option2=true;
            this.option3=false;
            //console.log("Camiones:", this.camiones);
            return
        },
        homeControl2(){
            this.option1=false;
            this.option2=true;
            this.option3=false;
            return
        },
        backForm1(){
            this.form1=true;
            this.form2=false;
            this.form3=false;
            this.dist=false;
        },
        formControl1(){
            this.form1=false;
            this.form2=true;
            this.dist=true;
        },
        formControl2(){
            this.form1=false;
            this.form2=false;
            this.form3=true;
            this.dist=true;
        },
        homeControl3(){
            this.option2=false;
            this.option1=false;
            this.option3=true;
            this.hojaDeRuta();
        },
        createCamiones(){
            var camion={id:'', centroDist:'', puntoVenta:[], cantdisponible:1000, ruta:[], distancia:''};
            for(var i=0; i<parseInt(this.camionesD);i++){
                camion.id=i+1;
                this.camiones.push(camion);
                camion={id:'', centroDist:'', puntoVenta:[],cantdisponible:1000, ruta:[], distancia:''};
            }
            this.puntosVentaEstatico=this.copia(this.puntosVenta, this.puntosVentaEstatico);
            //this.distanciaCentro_Puntov();
            //this.asignarPunto();
            //this.hojaDeRuta();
            this.homeControl1();
        },
        asignarDistribuidor(id){
            if(this.valor==0 || this.valor==''){
                swal("Seleccione un centro de distribución antes de continuar.",{
                    className:"alertas",
                    title:"Aviso",
                    icon:"warning"
                });
                return;
            }
            for(var i =0; i< this.camiones.length;i++){
                if(this.camiones[i].id==id){
                    this.camiones[i].centroDist=this.valor;
                    console.log(this.camiones[i]);
                }
            }
            this.formControl1();
        },
        asignarPuntoVenta(id){
            if(this.valor2==0 || this.valor2=='' || this.cantidad=='' || this.cantidad==0){
                swal("Rellene los campos antes de continuar",{
                    className:"alertas",
                    title:"Aviso",
                    icon:"warning"
                });
                return;
            }
            let pVenta={id:'',cant:'', x:'', y:''};
            
            for(var i=0; i<this.camiones.length; i++){
                if(this.camiones[i].id==id){
                    if(this.camiones[i].cantdisponible>=this.cantidad){
                        pVenta.id=this.valor2;
                        pVenta.cant=this.cantidad;
                        for(let a=0; a<this.puntosVenta.length; a++){ 
                            if(this.puntosVenta[a].N==this.valor2){
                                pVenta.x=this.puntosVenta[a].x;
                                pVenta.y=this.puntosVenta[a].y;
                            }
                        }
                        this.camiones[i].puntoVenta.push(pVenta);
                        this.camiones[i].cantdisponible=this.camiones[i].cantdisponible-this.cantidad;
                    }
                    else{
                        swal("El camión sólo puede llevar 1000 productos en un día",{
                            className:"alertas",
                            title:"Capacidad Excedida",
                            icon:"error",
                        });
                        return;
                    }
                }
            }
            this.cantidad=''; 
            for(var j=0; j<this.puntosVenta.length; j++){ 
                if(this.puntosVenta[j].N==this.valor2){
                    this.puntosVenta.splice(j,1);
                    return;
                }
            }   
        },
        copia(a,b){
            for(let c=0; c<a.length; c++){
                b.push(a[c]);
            }
            return b;
        },
        distanciaPuntoAPunto(puntoA,puntoB){           
            var x = puntoB.x-puntoA.x;
            var y = puntoB.y-puntoA.y;
            var resultado = parseFloat(Math.sqrt(Math.pow(x,2)+ Math.pow(y,2)));
            return resultado;
        },
        generarAristas(){
            for(var i=0; i<this.nodos.length;i++){
                for(var j=0; j<this.nodos.length;j++){
                    if(i !=j){
                        this.arista.from= this.nodos[i].N;
                        this.arista.to= this.nodos[j].N;
                        this.arista.label= this.distanciaPuntoAPunto(this.nodos[i],this.nodos[j]);
                        this.aristas.push(this.arista);
                        this.arista.from= this.nodos[j].N;
                        this.artista.to= this.nodos[i].N;
                        this.arista.label= this.distanciaPuntoAPunto(this.nodos[i],this.nodos[j]);
                        this.aristas.push(this.arista);
                    }
                }
            }
        },
        distanciaCentro_Puntov(){
            this.enviarLog("Iniciando método distanciaCentro_Puntov");
            var distancias = [];
            var distanciasC = [];
            var rutas_cortas=[];
            var array = [];
            for(let j = 0 ; j < this.puntosVentaEstatico.length ; j++){

                for(let k = 0 ; k < this.centrosDistribucion.length ; k++){
                    
                    var distancia = this.distanciaPuntoAPunto(this.centrosDistribucion[k],this.puntosVentaEstatico[j]); 
                    array.push([this.puntosVentaEstatico[j],this.centrosDistribucion[k],distancia]);                    
                }
                distancias.push(array);
                array=[] //puntos -> centros -> punto{N,x,y,etc},centro{ con todo tambien },distancia
            }
            for(let cen = 0; cen < this.centrosDistribucion.length ; cen++){
                var arr = {x:0,y:0}
                var otro = {centro:'', fabrica:'',distancia:''}
                var distanciaC = this.distanciaPuntoAPunto(arr,this.centrosDistribucion[cen]);
                otro.centro = this.centrosDistribucion[cen].N; //this.centrosDistribucion[cen].type + 
                otro.fabrica = arr.x + ','+ arr.y;
                otro.distancia = distanciaC
                distanciasC.push(otro);
                otro = {centro:'', fabrica:'',distancia:''}
            }
            this.fabricaCentros = distanciasC;
            this.centrosPuntos = distancias;
            this.enviarLog("Método distancia Centro_Puntov finalizado");                  
        },
        distanciaEntrePuntos(camion){
            var puntoVenta=camion.puntoVenta;
            var arrayCercanos = [];
            var listaPuntos = {punto: '',cerca:[], estado: false};
            var puntoCerca = {punto: '', distancia: ''};
            for(var a=0; a<puntoVenta.length; a++){
                for(var b=0; b<puntoVenta.length; b++){
                    if(a!=b){
                        listaPuntos.punto = puntoVenta[a].id;
                        var arr1={x:'',y:''};
                        var arr2={x:'',y:''};
                        arr1.x=puntoVenta[a].x;
                        arr2.x=puntoVenta[b].x;
                        arr1.y=puntoVenta[a].y;
                        arr2.y=puntoVenta[b].y;
                        var dist = this.distanciaPuntoAPunto(arr1,arr2);
                        puntoCerca.punto = puntoVenta[b].id;
                        puntoCerca.distancia = dist;
                        listaPuntos.cerca.push(puntoCerca);
                        puntoCerca = {punto: '', distancia: ''}
                    }
                }
                arrayCercanos.push(listaPuntos);
                listaPuntos = {punto: '', cerca: [], estado: false}
            }
            return arrayCercanos;
        },

        ordenarPuntos(arrayCercanos){
            for(let a=0; a<arrayCercanos.length; a++){
                for(let b=0; b<arrayCercanos[a].cerca.length; b++){
                    arrayCercanos[a].cerca.sort((a,b)=>(a.distancia > b.distancia) ? 1 : -1);   // E + c +  p1 + p3 + E                           
                }
            }   
            return arrayCercanos;             
        },

        asignarPunto(){
            this.enviarLog("Método asignarPunto iniciado");
            var centros = [];
            var point = {punto:'',distancia:''}
            var center = {centro:'',punto:''}
            for(let cen = 0 ; cen<this.centrosPuntos.length; cen++){
                point.punto = this.centrosPuntos[cen].punto;
                point.distancia = this.centrosPuntos[cen].distancia;
                center.centro = this.centrosPuntos[cen].centro
                center.punto = point;
                centros.push(center);
                point = {punto:'',distancia:''}
                center = {centro:'',punto:''} 
            }                       
            console.log("centros",centros);
            this.centrosPuntos = centros;
            console.log("centrosPuntos",this.centrosPuntos);
            console.log("centrosDistribucion",this.centrosDistribucion);
            console.log("puntosVenta", this.puntosVenta);
            this.enviarLog("Método asignarPunto finalizado");
            return centros;
        },

        generarRuta(camion){
            var estacinamiento = {x:0, y:0};
            var distanciaCentro_PuntoVenta = 0;
            var distanciaEstacinamiento_Centro = 0;
            var distanciaPuntoVenta_PuntoVenta = 0;
            var distanciaPuntoVenta_Estacionamiento = 0;
            distanciaEstacinamiento_Centro = this.distanciaPuntoAPunto(estacionamiento, camion.centroDist);
            for(var i=0; i<camion.length; i++){
                for(var j=0; j<camion[i].puntoVenta.length; j++){
                    if(camion[i].puntoVenta[0]){
                        distanciaCentro_PuntoVenta = this.distanciaPuntoAPunto(camion.centroDist, camion[i].puntosVenta[0]);
                    }
                    else{
                        distanciaPuntoVenta_PuntoVenta = this.distanciaPuntoAPunto(camion[i].puntoVenta[j], camion[i].puntoVenta[j+1]);
                    }

                    if(camion[i].puntoVenta[j-1]){
                        distanciaPuntoVenta_Estacionamiento = this.distanciaPuntoAPunto(camion[i].puntoVenta[j], estacionamiento);
                    }
    
                }
            }
        },

        hojaDeRuta(){
            for(let cam = 0 ; cam < this.camiones.length; cam++){
                var puntosXcamion = this.distanciaEntrePuntos(this.camiones[cam]);
                puntosXcamion = this.ordenarPuntos(puntosXcamion);
                console.log("puntosXcamion", puntosXcamion);
                this.distanciaCentro_Puntov();
                var puntoCercano = {punto:'' ,distancia:''}
                var arrayAux = [];
                for(let a = 0; a<this.centrosPuntos.length; a++){
                    for(let b=0; b<this.centrosPuntos[a].length; b++){
                        for(let c=0; c<puntosXcamion.length; c++){
                            if(puntosXcamion[c].punto == this.centrosPuntos[a][b][0].N && this.camiones[cam].centroDist == this.centrosPuntos[a][b][1].N){
                                puntoCercano.punto=this.centrosPuntos[a][b][0].N;
                                puntoCercano.distancia=this.centrosPuntos[a][b][2];
                                arrayAux.push(puntoCercano);
                                puntoCercano = {punto:'' ,distancia:''}
                            }
                        }
                    }
                }
                if(arrayAux.length>0){
                    var min={punto:'', distancia:''};
                    min.punto=arrayAux[0].punto;
                    min.distancia=arrayAux[0].distancia;
                    for(let e=0; e<arrayAux.length; e++){
                        if(arrayAux[e].distancia<min.distancia){
                            min.punto=arrayAux[e].punto;
                            min.distancia=arrayAux[e].distancia;
                        }
                    }
                    console.log("min",min);
                    this.ruta(min, puntosXcamion, cam);
                }
            }
        },

        ruta(inicio, puntosXcamion, cam){
            var arrayRuta=[];
            arrayRuta.push(inicio.punto);
            var distAcumulada=inicio.distancia;
            for(let a=0; a<puntosXcamion.length; a++){
                if(inicio.punto == puntosXcamion[a].punto && puntosXcamion[a].estado==false){
                    puntosXcamion[a].estado=true;
                    for(let b=0; b<puntosXcamion[a].cerca.length; b++){
                        for(let c=0; c<puntosXcamion.length; c++){
                            if(puntosXcamion[a].cerca[b].punto==puntosXcamion[c].punto && puntosXcamion[c].estado==false){
                                distAcumulada=distAcumulada+puntosXcamion[a].cerca[b].distancia;
                                puntosXcamion[c].estado==true;
                                arrayRuta.push(puntosXcamion[c].punto);
                                inicio.punto=puntosXcamion[c].punto;
                                c=puntosXcamion.length;
                                b=puntosXcamion[a].cerca.length;
                            }
                        }
                    }
                    a=-1;
                }
            }
            var ultimo = arrayRuta[arrayRuta.length-1];
            for(let ul = 0 ; ul < this.puntosVentaEstatico.length; ul++ ){
                var arrul = {x:'',y:''}
                var arres = {x:0,y:0}
                if(ultimo == this.puntosVentaEstatico[ul].N){
                    arrul.x = this.puntosVentaEstatico[ul].x
                    arrul.y = this.puntosVentaEstatico[ul].y
                    var distEst = this.distanciaPuntoAPunto(arrul,arres);
                }
            }
            var ndis = 0
            for(let es = 0; es<this.fabricaCentros.length; es++){
                console.log("centro1",this.fabricaCentros[es].centro);
                console.log("centro2",this.camiones[cam].centroDist);
                if(this.camiones[cam].centroDist == this.fabricaCentros[es].centro){
                    ndis = this.fabricaCentros[es].distancia  
                }
            }
            console.log("ndis",ndis);
            arrayRuta.push('Estacionamiento');
            distAcumulada = distAcumulada + distEst + ndis;
            this.camiones[cam].ruta=arrayRuta;
            this.camiones[cam].distancia=distAcumulada;
            console.log("Camión:",cam,":",this.camiones[cam]);
        },

        enviarLog(str){
            axios.get("addlog",{params: {messagge: str}}).then(resp =>{
                console.log("log add");
            });
        }
    },
}
</script>
