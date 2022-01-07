<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modificar Categoria</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="category.name">
                                </div>
                            </div>
                   
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Modificar</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"update-category",
    data(){
        return {
            category:{
                name:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showCategory()
    },
    methods:{
        async showCategory(){
            await this.axios.get(`/api/categorias/${this.$route.params.id}`).then(response=>{
                const name  = response.data.name
                this.category.name = name
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/categorias/${this.$route.params.id}`,this.category).then(response=>{
                this.$swal('Actualizado', 'Datos modificados Correctamente', 'success');
                
                setTimeout(() => {
                            this.$router.push({name:"categoryList"})
                        }, 1500);  

            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>