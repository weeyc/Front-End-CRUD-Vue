<template>
    <div class="w-full bg-gray-200 py-10">
        <div class="mx-auto container bg-white dark:bg-gray-800 dark:bg-gray-800 shadow rounded">
            <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-between items-start lg:items-stretch w-full">
                <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
                    <div class="flex items-center">

                    </div>
                </div>
                <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">
                    <div class="flex items-center lg:border-l lg:border-r border-gray-300 py-3 lg:py-0 lg:px-6">
                        <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing 1 - 20 of 60</p>
                        <a class="text-gray-600 dark:text-gray-400 ml-2 border-transparent border cursor-pointer rounded" onclick="pageView(false)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg>
                        </a>
                        <a class="text-gray-600 dark:text-gray-400 border-transparent border rounded focus:outline-none cursor-pointer" onclick="pageView(true)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center lg:border-r border-gray-300 pb-3 lg:pb-0 lg:px-6">
                        <div class="relative w-32 z-10">
                            <div class="pointer-events-none text-gray-600 dark:text-gray-400 absolute inset-0 m-auto mr-2 xl:mr-4 z-0 w-5 h-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-chevron-down" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>

                            <select aria-label="Selected tab" class="focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray text-base form-select block w-full py-2 px-2 xl:px-3 rounded text-gray-600 dark:text-gray-400 appearance-none bg-transparent">
                                <option>List View</option>
                                <option>Grid View</option>
                            </select>
                        </div>
                    </div>

                    <div class="lg:ml-6 flex items-center">
                        <button class="bg-gray-200 transition duration-150 ease-in-out focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray hover:bg-gray-300 rounded text-indigo-700 px-5 h-8 flex items-center text-sm">Download All</button>
                        <div class="text-white ml-4 cursor-pointer focus:outline-none border border-transparent focus:border-gray-800 focus:shadow-outline-gray bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 w-8 h-8 rounded flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
                <table class="min-w-full bg-white dark:bg-gray-800">
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
</template>

<script>
export default {
    name: "CompactTableWithActionsAndSelect",
    data() {
        return {
            temp: 0,
            counter: -2000,
            users:[],
        };
    },
    methods: {
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

        dropdownFunction(event) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            let list = event.currentTarget.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
            for (i = 0; i < dropdowns.length; i++) {
                dropdowns[i].classList.add("hidden");
            }
            list.classList.toggle("hidden");
        },
        documentClick(event) {
            if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    openDropdown.classList.add("hidden");
                }
            }
        },
        checkAll(event) {
            let rows = event.currentTarget.parentElement.parentElement.parentElement.nextElementSibling.children;
            for (var i = 0; i < rows.length; i++) {
                if (event.currentTarget.checked) {
                    rows[i].classList.add("bg-gray-100");
                    let checkbox = rows[i].getElementsByTagName("input")[0];
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                } else {
                    rows[i].classList.remove("bg-gray-100");
                    let checkbox = rows[i].getElementsByTagName("input")[0];
                    if (checkbox) {
                        checkbox.checked = false;
                    }
                }
            }
        },
        tableInteract(event) {
            var single = event.currentTarget.parentElement.parentElement;
            single.classList.toggle("bg-gray-100");
        },
        pageView(val) {
            let text = document.getElementById("page-view");
            if (val) {
                if (this.$data.temp === 2) {
                    this.$data.temp = 0;
                } else {
                    this.$data.temp = this.$data.temp + 1;
                }
            } else if (this.$data.temp !== 0) {
                this.$data.temp = this.$data.temp - 1;
            }
            switch (this.$data.temp) {
                case 0:
                    text.innerHTML = "Viewing 1 - 20 of 60";
                    break;
                case 1:
                    text.innerHTML = "Viewing 21 - 40 of 60";
                    break;
                case 2:
                    text.innerHTML = "Viewing 41 - 60 of 60";
            }
        },
    },
    created() {
        document.addEventListener("click", this.documentClick);
    },
    unmounted() {
        document.removeEventListener("click", this.documentClick);
    },
     mounted: function(){
            this.getData();
        },

};
</script>
