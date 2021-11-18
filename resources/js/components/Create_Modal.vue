<template>
  <div class="modal h-screen w-full  fixed left-0 top-0 flex justify-center z-10 items-center bg-black bg-opacity-50" >
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3" >
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">Create Hey User</h3>
        <button class="text-black " @click="closeModal">&cross;</button>
      </div>
      <!-- modal body -->
      <div class="p-3">
            <div  v-for= "error in errors" :key="error.id" class="bg-red-100 flex items-center">

                <span class="flex text-red-500">➢ {{error.field}} {{ error.message }}</span>
            </div>
           <table class=" md:w-2/3 px-3 py-3 bg-white dark:bg-gray-800">
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal" >Name: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" name="name" class="font-medium "  v-model="form.name"/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Email: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="email" name="email" class="font-medium" v-model="form.email"/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Gender: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="radio" class="font-medium" name="gender"  value="male" v-model="form.gender" >
                            <label class="px-3 ">male</label><br>
                            <input type="radio" class="font-medium" name="gender" value="female" v-model="form.gender">
                            <label class="px-3" >female</label><br>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Status: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="radio" class="font-medium" name="status"  value="active" v-model="form.status" checked>
                            <label class="px-3 ">active</label><br>
                            <input type="radio" class="font-medium" name="status" value="inactive" v-model="form.status">
                            <label class="px-3" >inactive</label><br>
                        </div>
                    </td>
                </tr>
            </table>
      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button @click="closeModal" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
        <button @click.prevent="createUser" type="submit" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Create</button>
      </div>
    </div>
</div>
</template>

<script>
export default {

    data() {
        return {
            errors: [],
            apiToken: 'a2facd550b2decbff7ce3246c6277022e344d398d7229f378119ddf4a47b424d',
            apiURL: 'https://gorest.co.in/public/v1/users/',

            form:{
                name: '',
                email: '',
                gender:'male',
                status:'active',
            },
        }
    },
    methods: {

     createUser(){
            const config = {
            headers: { Authorization: 'Bearer '+ this.apiToken}
            };

             axios.post(this.apiURL,
                this.form,
                config
                ).then(() =>{

                    //this.getData();
                    alert("Insert Successful");
                    this.form.name='';
                    this.form.email='';
                    this.form.gender='';
                    this.form.status='';
                    this.errors = [];
                    this.closeModal();
                    this.$emit("refreshData");
            }).catch(error =>this.errors=error.response.data.data);

        },
         closeModal(){
             this.$emit("closeModal");
         },









    },
};
</script>
