<template>
    <div class="w-full bg-gray-500 py-10">
        <!-- change background here top table -->
        <div class="mx-auto container bg-white-500 dark:bg-gray-800 dark:bg-gray-800 shadow rounded">
            <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-between items-start lg:items-stretch w-full">
                <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
                    <div class="flex items-center ">
                        <span>MANAGE USERS</span>
                    </div>
                </div>
                  <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
                    <div class="flex items-center">
                          <p class="text-base text-dark-600 dark:text-gray-400" id="page-view">  Showing Page {{ page }} of {{ meta.pagination.pages }}</p>
                    </div>
                </div>
                <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">

                <div class="flex flex-col items-center my-12">
                    <div class="flex text-gray-700">
                        <div class="h-8 w-8 mr-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                            <button  @click="previousPg(page)"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                             </button>
                        </div>

                        <div class="flex h-8 font-medium rounded-full bg-gray-200">
                            <button class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  " @click="firstPg()">1</button>
                            <button class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full disabled ">...</button>
                            <button class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full bg-pink-600 text-white " @click="currentPg()">{{ page }}</button>
                            <button class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  disabled">...</button>
                            <button class="w-8 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full"  @click="lastPg()">Last</button>
                            <button class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-pink-600 text-white"></button>
                        </div>
                        <div class="h-8 w-8 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                              <button  @click="nextPg(page)"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                            </button>
                        </div>
                    </div>
                </div>

                    <div class="flex items-center lg:border-r border-gray-300 pb-3 lg:pb-0 lg:px-6">
                        <div class="relative w-32 z-10">
                            <div class="pointer-events-none mt-5 text-gray-600 dark:text-gray-400 absolute inset-0 m-auto mr-2 xl:mr-4 z-0 w-5 h-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-chevron-down" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                            <select  v-model="filterGender" class="focus:outline-none border  border-transparent focus:border-gray-800 focus:shadow-outline-gray text-base form-select block w-full py-2 px-2 xl:px-3 rounded text-gray-600 dark:text-gray-400 appearance-none bg-transparent">
                                <option value="">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>

                            </select>
                            <div class="pointer-events-none text-gray-600 dark:text-gray-400  absolute inset-0 m-auto mr-2 xl:mr-4 z-0 w-5 h-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-chevron-down" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                             <select shadow-lg v-model="filterStatus" class="focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray text-base form-select block w-full py-2 px-2 xl:px-3 rounded text-gray-600 dark:text-gray-400 appearance-none bg-transparent">
                                <option value="" >Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                    </div>


                    <div class="lg:ml-6 flex  items-center">
                        <button @click="createUser; toggleModalCreate = !toggleModalCreate" class="bg-gray-200   hover:bg-gray-300 rounded
                        text-indigo-700 px-5 h-8 shadow-lg ">Create User</button>

                    </div>
                </div>
            </div>
            <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
                <!-- change body from bg-dark-600 to bg-gray-200 -->
                <table class="min-w-full bg-dark-600 dark:bg-gray-800">
                     <thead>
                            <tr class="bg-dark-200 text-gray-900 uppercase text-sm leading-normal">
                                <th class="py-3 px-3 text-left">No.</th>
                                <th class="py-3 px-6 text-left">User ID</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Gender</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark-600 text-sm font-light">
                            <tr  v-for= "(user, index) in filterUser" :key="user.id"   class="border-b border-gray-200 hover:bg-gray-100" >
                                 <td class="py-3 px-3 text-left whitespace-nowrap">  {{ index + 1 }}</td >
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ user.id }}</span>
                                    </div>

                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ user.name }}</span>
                                    </div>
                                </td>
                                   <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ user.email }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                      <span>{{ user.gender }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span v-if="user.status==='active'" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ user.status }}</span>
                                    <span v-if="user.status==='inactive'" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ user.status }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <button @click="readUser(user); toggleModal = !toggleModal;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            </button>
                                        </div>
                                        <div  class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                              <button @click="clickEdit(user); toggleModalEdit = !toggleModalEdit;"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            </button>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                             <button @click="deleteUser(user.id);"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg> </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                </table>

<!-- Read User -->
 <div v-if="toggleModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">{{ modalTitle }}</h3>
        <button class="text-black " @click="toggleModal=false">&cross;</button>
      </div>
      <!-- modal body -->
      <div class="p-3">
           <table class="min-w-full px-3 py-3 bg-white dark:bg-gray-800">
                <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal ">ID: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="text" class="font-medium" v-model="userID"/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal" >Name: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" class="font-medium" v-model="userName"/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Email: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="email" class="font-medium" v-model="userEmail"/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Gender: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="text" class="font-medium" v-model="userGender"/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Status: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" class="font-medium"  v-model="userStatus"/>
                        </div>
                    </td>
                </tr>
            </table>
      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button @click="toggleModal=false" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
        <button  class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Oke</button>
      </div>
    </div>
</div>

<!--  Create User Modal -->
 <div v-if="toggleModalCreate" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">{{ modalTitle }}</h3>
        <button class="text-black " @click="toggleModalCreate=false">&cross;</button>
      </div>
      <!-- modal body -->
      <div class="p-3">
           <table class="min-w-full px-3 py-3 bg-white dark:bg-gray-800">
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal" >Name: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" name="name" class="font-medium px-5" v-model="form.name"/>
                              <span class="flex text-red-500">{{ errors.get('name')}}</span>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Email: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="email" name="email" class="font-medium" v-model="form.email"/>
                             <span class="flex text-red-500">{{ errors.get('email')}}</span>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Gender: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="radio" class="font-medium" name="gender"  value="male" v-model="form.gender" checked>
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
        <button @click="toggleModalCreate=false" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
        <button @click.prevent="createUser" type="submit" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Create</button>
      </div>
    </div>
</div>

<!--  Edit User Modal -->
 <div v-if="toggleModalEdit" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">{{ modalTitle }}</h3>
        <button class="text-black " @click="toggleModalEdit=false">&cross;</button>
      </div>
      <!-- modal body -->
      <div class="p-3">
           <table class="min-w-full px-3 py-3 bg-white dark:bg-gray-800">
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal" >Name: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" name="name" class="font-medium px-5" v-model="formEdit.name"/>
                              <span class="flex text-red-500">{{ errors.get('name')}}</span>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Email: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="email" name="email" class="font-medium" v-model="formEdit.email"/>
                             <span class="flex text-red-500">{{ errors.get('email')}}</span>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Gender: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="radio" class="font-medium" name="gender"  value="male" v-model="formEdit.gender" checked>
                            <label class="px-3 ">male</label><br>
                            <input type="radio" class="font-medium" name="gender" value="female" v-model="formEdit.gender">
                            <label class="px-3" >female</label><br>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Status: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="radio" class="font-medium" name="status"  value="active" v-model="formEdit.status" checked>
                            <label class="px-3 ">active</label><br>
                            <input type="radio" class="font-medium" name="status" value="inactive" v-model="formEdit.status">
                            <label class="px-3" >inactive</label><br>
                        </div>
                    </td>
                </tr>
            </table>
      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button @click="toggleModalEdit=false" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
        <button @click.prevent="editUser" type="submit" class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white">Update</button>
      </div>
    </div>
</div>


            </div>
        </div>

    </div>


</template>

<script>

class Errors{
    constructor(){
        this.errors = {};
    }
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors.errors;
    }
}

export default {
    name: "CRUD_TABLE",

    data() {
        return {
            temp: 0,
            counter: 0,
            incrementor: 0,
            users:[],
            apiToken: 'a2facd550b2decbff7ce3246c6277022e344d398d7229f378119ddf4a47b424d',

            filterName: '',
            filterGender: '',
            filterStatus: '',
            toggleModal: false,
            toggleModalCreate: false,
            toggleModalEdit: false,
            buttonVisible: 0,

            modalTitle: '',
            userID: '',
            userName:'',
            userEmail:'',
            userGender:'',
            userStatus:'',

             form:{
                name:'',
                email:'',
                gender:'male',
                status:'active',
            },

            formEdit:{
                id: '',
                name:'',
                email:'',
                gender:'',
                status:'',
            },

               errors: new Errors(),

               meta: '',
               page: 1,
               lastPage: ''

          //  perPage: this.perPageOptions[0],



        };
    },
    computed:{
        filterUser: function(){
            return this.users.filter((user)=>{
               //return user.gender.match(this.filterGender);
                if(this.filterGender=="" && this.filterStatus==""){
                     return user;
                }else if(user.gender==this.filterGender && user.status==this.filterStatus){
                    return user;
                }else if(user.gender==this.filterGender && this.filterStatus==""){
                    return user;
                }else if (this.filterGender=="" && user.status==this.filterStatus)
                     return user;
            });
        },

        increment: function() {
              return this.incrementCounter(this.counter);
        },
    },
    methods: {
        getData(){
            axios.get('https://gorest.co.in/public/v1/users?page='+this.page).then((response)=>{
                this.users=response.data.data;
                console.warn( this.users.data);

                })
            },

        getMeta(){
            axios.get('https://gorest.co.in/public/v1/users').then((response)=>{
                this.meta=response.data.meta;
                this.lastPage=response.data.meta.pagination.pages
                console.warn( this.meta.data);
                })
            },
        previousPg(pg){
                if(pg<=1){
                     this.page=1;
                }
                else
                    this.page=this.page -1;
                 this.getData();
            },
        firstPg(){
                this.page=1;
                this.getData();
            },
        currentPg(){
                this.page=this.page;
                this.getData();
            },
        lastPg(){
                this.page=this.lastPage;
                this.getData();
            },
        nextPg(pg){
               if(pg>=this.lastPage)
                    this.page=this.lastPage;
                else
                     this.page=this.page + 1;
                 this.getData();
            },
        readUser(user){
            this.modalTitle = "View User Details";
            this.userID = user.id;
            this.userName = user.name;
            this.userEmail = user.email;
            this.userGender = user.gender;
            this.userStatus = user.status;
        },
         createUser(){
            this.modalTitle = "Create New User";
            this.userID = 0;

            const config = {
            headers: { Authorization: 'Bearer '+ this.apiToken}
            };

             axios.post('https://gorest.co.in/public/v1/users',
                this.form,
                config
                ).then(() =>{
                    console.log('saved');
                    this.toggleModalCreate=false;
                    this.getData();
                    alert("Insert Successful");
                    this.form.name='';
                    this.form.email='';
                    this.form.gender='';
                    this.form.status='';
                    this.form.gender='';
            }).catch(error =>this.errors.record(error.response.data.data));
        },
        clickEdit(user){
            this.modalTitle = "Edit User";
            this.formEdit.id = user.id;
            this.formEdit.name = user.name;
            this.formEdit.email = user.email;
            this.formEdit.gender = user.gender;
            this.formEdit.status = user.status;
        },
        editUser(){
            const config = {
            headers: { Authorization: 'Bearer '+ this.apiToken}
            };
            axios.patch('https://gorest.co.in/public/v1/users/'+ this.formEdit.id,
                this.formEdit,
                config
                ).then(() =>{
                    console.log('update');
                    this.toggleModalEdit=false;
                    this.getData();
                    alert("Update Successful");
            }).catch(error =>this.errors.record(error.response.data.data));
        },
        deleteUser(id){
            const config = {
                headers: { Authorization: 'Bearer '+ this.apiToken}
            };
            if(!confirm("Are you sure you would like to delete?")){
                return;
            } axios.delete('https://gorest.co.in/public/v1/users/'+ id,
                config
                ).then(() =>{
                    console.log('deleted');
                    this.getData();
                    alert("Delete Successful");
            }).catch(error =>this.errors.record(error.response.data.data));
        },


    },

     mounted: function(){
            this.getData();
            this.getMeta();
        //    this.pages();
            // this.changePage();

    },



};
</script>
