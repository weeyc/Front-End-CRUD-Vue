<template>
 <div  class="modal h-screen w-full fixed left-0 top-0 flex justify-center z-10 items-center bg-black bg-opacity-50" >
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
      <!-- modal header -->
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg">View User Details</h3>
        <button class="text-black " @click="closeModal">&cross;</button>
      </div>
      <!-- modal body -->
      <div class="p-3">
           <table class="min-w-full px-3 py-3 bg-white dark:bg-gray-800">
                <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal ">ID: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="text" class="font-medium" :value="form.userID" readonly/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal" >Name: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" class="font-medium" :value="form.userName" readonly/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Email: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="email" class="font-medium" :value="form.userEmail" readonly/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Gender: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="text" class="font-medium" :value="form.userGender" readonly/>
                        </div>
                    </td>
                </tr>
                    <tr  class="border-b border-gray-200 hover:bg-gray-100" >
                    <td class="py-3 px-3 bg-gray-200 text-gray-900 uppercase text-sm leading-normal">Status: </td >
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                             <input type="text" class="font-medium" :value="form.userStatus" readonly/>
                        </div>
                    </td>
                </tr>
            </table>
      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button @click="closeModal" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white mr-1 close-modal">Okay</button>

      </div>
    </div>
</div>
</template>

<script>
export default {

    props: {
        form: Object,
        readForm: Function,
        toggle: Boolean
    },
    data() {
        return {

        }
    },
    methods: {

         closeModal(){
            this.toggle =! this.toggle;
            this.$emit('closeModal',this.toggle);
         },





    },
};
</script>
