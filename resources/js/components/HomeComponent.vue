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
                                    <option v-for="(item,index) in puntosVenta" :key="index" :value="item.N">Punto Venta {{item.N}}</option>
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
                            <button class="btn btn-lg btn-success">Generar Hoja de rutas</button>
                        </div>  
                    </div>
                </div> 
            </div>
        </div>    
        <!--/LISTADO DE CAMIONES-->


        <div class="row">
            <div class="col-6" v-if="option3==true">
                
            </div> 
            <div class="col-6" v-if="option3==true">
                <h4 class="fredoka textocolor">Centros de Distribución</h4>
                <table class="table table-bordered cardaux textocolor">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">N</th>
                        <th scope="col">Coordenadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="(item, index) in centrosDistribucion" :key="index">
                            <th scope="row">{{item.N}}</th>
                            <td>X: {{item.x}}; Y: {{item.y}}</td>
                        </tr>
                        
                    </tbody>
                </table>
                <h4 class="fredoka textocolor">Puntos de Venta</h4>
                <table class="table table-bordered cardaux textocolor">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">N</th>
                        <th scope="col">Coordenadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="(item, index) in puntosVenta" :key="index">
                            <th scope="row">{{item.N}}</th>
                            <td>X: {{item.x}}; Y: {{item.y}}</td>
                        </tr>
                        
                    </tbody>
                </table>
                
            </div>
            <div v-if="option3==true" class="container cardaux">
                
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
            centrosDistribucion:[],
            dRestante:'',
            camionesD:'',
            camiones:[],
            
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
            this.puntosVenta=response.data;
        });
        axios.get('centrosdistribucion').then(response =>{
            this.centrosDistribucion=response.data;
        });

        for(var i=0; i<this.puntosVenta.length;i++){
            this.nodo.id= this.puntosVenta[i].N;
            this.nodo.label= this.puntosVenta[i].N;
            this.nodo.x= this.puntosVenta[i].x;
            this.nodo.y= this.puntosVenta[i].y;
            this.nodos.push(this.nodo);
            this.nodo={id:'', label:'', x:'', y:''};
        }

        for(var j=0; j<this.centrosDistribucion.length; j++){
            this.nodo.id= this.centrosDistribucion[j].N;
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
            console.log("Camiones:", this.camiones);
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
        },
        createCamiones(){
            var camion={id:'', centroDist:'', puntoVenta:[],cantdisponible:1000};
            for(var i=0; i<parseInt(this.camionesD);i++){
                camion.id=i+1;
                this.camiones.push(camion);
                camion={id:'', centroDist:'', puntoVenta:[],cantdisponible:1000};
            }
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
            let pVenta={id:'',cant:''};
            for(var i=0; i<this.camiones.length; i++){
                if(this.camiones[i].id==id){
                    if(this.camiones[i].cantdisponible>=this.cantidad){
                        pVenta.id=this.valor2;
                        pVenta.cant=this.cantidad;
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


        distanciaPuntoAPunto(puntoA, puntoB){
            return parseFloat(Math.sqrt(Math.pow(puntoB.x-puntoA.x,2)+ Math.pow(puntoB.y-puntoA.y,2)));
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

                    distanciaPuntoVenta_PuntoVenta = this.distanciaPuntoAPunto(camion[i].puntoVenta[j], camion[i].puntoVenta[j+1]);

                    if(camion[i].puntoVenta[j-1]){
                        distanciaPuntoVenta_Estacionamiento = this.distanciaPuntoAPunto(camion[i].puntoVenta[j], estacionamiento);
                    }
    
                }
            }
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

                    distanciaPuntoVenta_PuntoVenta = this.distanciaPuntoAPunto(camion[i].puntoVenta[j], camion[i].puntoVenta[j+1]);

                    if(camion[i].puntoVenta[j-1]){
                        distanciaPuntoVenta_Estacionamiento = this.distanciaPuntoAPunto(camion[i].puntoVenta[j], estacionamiento);
                    }
    
                }
            }
        },
        
    },
}
</script>