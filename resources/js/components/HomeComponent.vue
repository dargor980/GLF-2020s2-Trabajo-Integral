<template>
    <div class="container mt-5 pt-4">
        <h1 class="fredoka textocolor my-2">Tipos de autómatas con los que se trabajará en esta aplicación web:</h1>
        <div class="row bg-white rounded shadow mt-4 cardaux">
            <div class="col-12 cardaux">
                <div class="row d-flex justify-content-center mx-2 my-2 pt-2">
                    <h4 class="textocolor fredoka my-2">Tipos de Autómatas</h4>
                </div>
                <hr>
                <div class="row accordion" id="automatas">
                    <ul class="col-lg-3 col-sm-12 my-2 list-group list-group-flush">
                        <li class="list-group-item analisis collapsed info textocolor" data-toggle="collapse" data-target="#af" aria-expanded="false" aria-controls="af">
                            Autómata de Pila (AP)
                        </li>
                        <li class="list-group-item analisis collapsed info textocolor" data-toggle="collapse" data-target="#afd" aria-expanded="false" aria-controls="afd">
                            Expresión Regular (ER)
                        </li>
                        
                    </ul>
                    <div class="col-lg-7 col-sm--12 my-2">
                        <div class="collapse" id="af" data-parent="#automatas">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Autómata De Pila</h4>
                                </div>
                                <p class="textocolor lato" >
                                    aaaaaaaaaa
                                </p>
                                <div class="row justify-content-center">
                                    <div class="image-parent">
                                        <img src="" class="img-fluid" alt="AP">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="collapse" id="afd" data-parent="#automatas">
                            <div class>
                                <div class="row d-flex justify-content-center">
                                    <h4 class="textocolor fredoka">Expresion Regular</h4>
                                </div>
                                <p class="textocolor lato" >
                                   aaaaaaaaa
                                </p>
                                <div class="row justify-content-center">
                                    <div class="image-parent">
                                        <img src="" class="img-fluid" alt="ER">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>               
            </div>
        </div>          
        
    </div>
    
</template>