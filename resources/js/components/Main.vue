<template>
  <!-- component -->
<div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-500 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">

                        <thead>
                            <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                                <th class="py-3 px-3 text-left">No.</th>
                                <th class="py-3 px-6 text-left">User ID</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Gender</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr  v-for= "user in users" :key="user.id"   class="border-b border-gray-200 hover:bg-gray-100" >
                                <div v-if="incrementCounter(users)"></div>
                                 <td  class="py-3 px-3 text-left whitespace-nowrap"  >{{ counter }}</td >
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
                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ user.status }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
        data(){
            return{
                counter: -2000,
                users:[],
            }
        },
        methods:{
            getData(){
                     axios.get('https://gorest.co.in/public/v1/users').then((response)=>{
                    this.users=response.data.data;
                    console.warn( this.users.data);
                })
            },
            incrementCounter(yes) {
                this.counter += 1
                 if(yes) {

                return false
                } else {

                return true
                }

             },
        },
        mounted: function(){
            this.getData();
        },


}
</script>
