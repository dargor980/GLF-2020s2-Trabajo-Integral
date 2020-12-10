<template>
    <div class="container mt-5 pt-4">
        
        <form @submit.prevent="sendTXT" enctype="multipart/form-data">
            <input type="file" class="form-control"  name="archivo" id="file" @change="onFileChange">
            
            <button class="btn btn-success my-3">Enviar</button>
        </form>
    </div>
</template>

<script>
import eventBus from '../Bus';
export default {
    data(){
        return{
            attachment :{name:null, file:null},
        }
    },
    created(){
    /*
        cargar archivo txt;        P;N;x,y;
        P: punto venta
        C: CARGA
        N: cantidad de productos que tiene el camion;
        x,y: coordenadas

        guardarlos en variables
        enviamos por axios a los controllers
        de los controllers lo guardamos a la BD.

        eliges camiones y las rutas ( a donde van)
        se calcula la ruta mas corta (minimizar km => (x,y)=> debemos calcular  todas las distancias punto a punto posibles)
    */

    },

    methods:{
        onFileChange(event){
            this.attachment.file= event.target.files[0];
        },

        sendTXT(){
            let fd= new FormData();
            fd.append('name',this.attachment.name);
            fd.append('texto',this.attachment.file);

            axios.post("/sendtxt",fd).then(resp =>{
                console.log("entró");
                if(resp.data=='INVALID_FORMAT'){
                    swal("Formato Inválido",{
                        className:"alertas",
                        title:"Error",
                        icon:"error"
                    });
                    return;
                }
                eventBus.$emit('controlvista',1);
                console.log(resp.data);
            });

        },
    }
}
</script>

 

  

  


