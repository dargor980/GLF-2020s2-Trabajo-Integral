<template>
    <div class="container mt-5 pt-4">
        <button class="btn btn-lg btn-success" @click="texto"> Test</button>
        <form @submit.prevent="readFile" enctype="multipart/form-data">
            <input type="file" class="form-control"  name="archivo" @change="previewFiles"> Ingrese el archivo
            <button class="btn btn-success" >Enviar</button>
        </form>
    </div>
    
</template>

<script>
export default {
    data(){
        return{
            archivo:[],
            dato:"Escribiendo algo sin sentido para probar que la vida no tiene sentido cuando esta patas para arriba como una tortuga dada vuelta luego de pelear contra zeus",
            
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
        texto(archivo){
            
            fs.readFile(archivo, 'utf-8', (err, data) => {
                if(err) {
                    console.log('error: ', err);
                } else {
                    console.log(data);
                }
            });
        },

        readFile(e){
            var f= e.dataTransfer.files;
            this.texto(f);

        },
        previewFiles(event) {
            console.log(event.target.files);
            this.archivo.push(event.target.files[0]);
            console.log(this.archivo[0].name);
            this.texto(this.archivo[0].name);
        }
        // readFile:function(e)
        // {
        // }
    },
}
</script>

 

  

  


