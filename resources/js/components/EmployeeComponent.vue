<template>
    <section id="content" class="font-inter">
        <loading :active="isLoading" :is-full-page="true"></loading>
        <div class="sgx-title">
            <h1>Employee Database</h1>
        </div>
        <div class="sgx-stats">
            <div class="item">
                <div class="big-val">{{ summaryEmployee.count }} <img src="icons/chart-line-blue.svg" class="icon o10"></div>
                <div class="small-val font-size-11"><img src="icons/users-dark.svg" class="inline-icon">Total Employees</div>
            </div>
            <div class="item">
                <div class="big-val text-success">{{ summaryEmployee.active }}</div>
                <div class="small-val font-size-11"><img src="icons/users-dark.svg" class="inline-icon">Active Employees</div>
            </div>
            <div class="item">
                <div class="big-val text-danger">{{ summaryEmployee.inactive }}</div>
                <div class="small-val font-size-11"><img src="icons/users-dark.svg" class="inline-icon">Inactive Employees</div>
            </div>
        </div>
        <div class="sgx-table alt">
            <div class="options no-scrollbar">
                <a href="create" class="item">
                    <img src="icons/plus-dark.svg" class="icon">Register
                </a>
                <a href="#" class="item" @click="showModalSearch()" data-target="#search-tray">
                    <img src="icons/search-dark.svg" class="icon">Search
                </a>
            </div>
            <div class="info">
                <em v-if="searchKeyword === ''">Showing {{ listEmployee.data ? listEmployee.data.length : '0'}} out of {{ listEmployee.meta ? listEmployee.meta.total : '0' }}</em>
                <em v-if="searchKeyword !== ''">Showing {{ listEmployee.data ? listEmployee.data.length : '0'}} out of {{ listEmployee.meta ? listEmployee.meta.total : '0' }} filtered items by <b>Keyword: {{ searchKeyword }} </b>- <a href="#" @click="removeFilter()" style="cursor:pointer">Remove Filter</a></em>
            </div>
            <div class="table-wrapper no-scrollbar">
                <table class="table hoverable">
                  <thead>
                    <tr>
                        <th class="sgx-w-100">
                            Name
                        </th>
                        <th class="sgx-w-50">Status</th>
                        <th class="sgx-w-50">NIK</th>
                        <th class="sgx-w-50">Joined</th>
                        <th class="sgx-w-50">Srv Year</th>
                        <th class="sgx-w-50">Company</th>
                        <th class="sgx-w-100">Department</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="employee in listEmployee.data" v-key="employee.id">
                        <td> {{ employee.name }} </td>
                        <td> {{ employee.active ? "Active" : "Inactive" }} </td>
                        <td> {{ employee.nik }} </td>
                        <td> {{ employee.display_joined }} </td>
                        <td><img class="inline-icon" src="/icons/clock-dark.svg">{{ employee.srv_year }} </td>
                        <td> {{ employee.company_name }} </td>
                        <td> {{ employee.department_name }} </td>
                        <td></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="paginates text-right">
                <button type="button" class="btn hms-btn btn-light pop" @click="prevPage()" :disabled="currentPage == 1">Prev</button>
                <button type="button" class="btn hms-btn btn-light pop" @click="nextPage()" :disabled="currentPage == listEmployee.meta.last_page">Next</button>
            </div>
        </div>

        <!-- Modal Search -->
        <div class="modal anchor-modal fade show d-block" id="search-tray" v-if="modalSearchOpen">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="img/modal-head.jpg">
                    </div>
                    <div class="modal-desc">
                        Employee Database Search
                    </div>
                    <div class="modal-body">
                        <form @submit="handleSubmit">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control hms-control hms-small first-focus" :class="v$.searchKeyword.$errors.length > 0 ? ' is-invalid' : ''" v-model="searchKeyword">
                                <div class="invalid-feedback" v-for="error of v$.searchKeyword.$errors" :key="error.$uid">
                                    <div class="error-msg">{{ error.$message }}</div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn hms-btn btn-light" data-dismiss="modal" @click="closeModalSearch">Close</button>
                        <button type="button" class="btn hms-btn btn-sea add-spinner white-spinner" @click="doSearch()">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import Loading from 'vue3-loading-overlay';
import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';
import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

export default {
    setup () {
        return { v$: useVuelidate() }
    },
    components:{
        Loading
    },
    data(){
        return {
            'searchKeyword': '',
            'isLoading': false,
            'modalSearchOpen': false,
            'listEmployee': {
                'meta': {
                    'last_page': 1,
                    'current_page': 1,
                }
            },
            'summaryEmployee': [],
            'currentPage': 1,
            'pos': [
                'Human Capital',
                'ICT',
                'Finance',
                'Accounting',
                'Tax',
                'Technical',
                'HSE',
                'General Affair',
                'CSR',
                'Corporate Planning',
            ],
            'lvl': [
                'BOC',
                'Director',
                'General Manager',
                'Senior Manager',
                'Manager',
                'Senior Supervisor',
                'Supervisor',
                'Senior Staff',
                'Staff',
                'Overtime Staff',
                'Overtime Non Staff',
            ],
            'grade': [
                'A',
                'A2',
                'A3',
                'B',
                'B2',
                'C',
            ],
            'loc': [
                'Jakarta',
                'Banjarmasin',
                'Balikpapan',
            ],
            'religion': [
                'Muslim',
                'Christian',
                'Catholic',
                'Buddhist',
                'Hindu',
                'Other',
            ]
        }
    },
    methods: {
        callAPISearchAndFilter(url){
            if(url !== null){
                this.isLoading = true;
                axios.get(url)
                .then(resp => {                
                    this.listEmployee = resp.data;
                    this.currentPage = this.listEmployee.meta.current_page;
                    console.log(this.listEmployee);
                    this.isLoading = false;

                    if(this.modalSearchOpen){
                        this.closeModalSearch();
                    }
                })
                .catch((err) => {
                    this.isLoading = false;
                    this.$swal({
                        title: 'Error',
                        text: 'Gagal mendapatkan data employee',
                        icon: 'error'
                    });
                });
            }
        },
        callAPISummary(){
            axios.get(`${process.env.MIX_BASE_API_URL}/employees/summary`)
            .then(resp => {                
                this.summaryEmployee = resp.data;
                console.log(this.listEmployee);
            });
        },
        nextPage(){
            this.callAPISearchAndFilter(this.listEmployee.links.next);
        },
        prevPage(){
            this.callAPISearchAndFilter(this.listEmployee.links.prev);
        },
        showModalSearch(){
            this.modalSearchOpen = true;
        },
        closeModalSearch(){
            this.modalSearchOpen = false;
        },
        async doSearch(){
            const isFormCorrect = await this.v$.$validate();
            
            if (!isFormCorrect) return
            
            // actually submit form
            this.callAPISearchAndFilter(`${process.env.MIX_BASE_API_URL}/employees?search=${this.searchKeyword}`);
        },
        async handleSubmit(e){
            e.preventDefault();
            this.doSearch();    
        },
        removeFilter(){
            this.searchKeyword = '';
            this.callAPISearchAndFilter(`${process.env.MIX_BASE_API_URL}/employees`);
        }
    },
    mounted() {
        this.callAPISearchAndFilter(`${process.env.MIX_BASE_API_URL}/employees?search=${this.searchKeyword}`);
        this.callAPISummary();
        console.log('Component mounted.')
    },
    validations () {
        return {
            searchKeyword: { required }, 
        }
    }
}
</script>
