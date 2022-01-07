<template>
  <div class="container">

                <div class="col-md-4 offset-md-4">
                    <br>
                    <div class="card">
                    <div class="mt-3" style="text-align: center;">Laravel Vue Crud</div>
                    
                        <div class="card-header">
                            <!-- INGRESO (PUTTY) -->
                        </div>
                        <div class="card-body">
                        <p style="font-weight: 700;">INGRESO</p>
                            <form id="form-login" @submit.prevent="login()">
                                <div class="form-group">
                                    <input type="text" v-model="email" id="email" class="form-control" placeholder="email" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" v-model="password" id="password" class="form-control" placeholder="Contraseña" required>
                                </div>

                                <br>              
                         
                                <button type="submit" class="btn btn-outline-success"><em class="far fa-id-card fa-lg"></em><span style="font-size:12px;"> Entrar</span></button>

                           
                           
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</template>
<script>
export default {
  data() {
       return {  
        email: '',
        password: '',
        errors: '',
        working: false
       };
    },


    methods: {


        login: function(e) {
            this.errors = '';

            axios
                .post('/api/login', {
                    "email": this.email,
                    "password": this.password
                })
                .then(response => {

         
       
                    if (response.data.status == "success") {
                        this.$swal('Has iniciado sesión', 'Datos Correctos', 'success');
                        
                        localStorage.login = 1;
                        localStorage.token = response.data.token;
                        setTimeout(function() {
                            window.location = '/';
                        }, 1500);                    
                    } else {

                        if (typeof response.data.mensaje === 'object' && response.data.mensaje !== null) {
                            Object.values(response.data.mensaje).forEach(element => {
                                this.errors += "<li style='color: red;'>" + element[0] + "</li>";
                            });
                        } else {
                            this.errors = response.data.mensaje;
                        }

                        this.$swal('Ups !!!', this.errors, 'error');
                    }
                  

                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });
        }
    }
};
</script>