<template>
    <section id="content">
        <loading :active="isLoading" :is-full-page="true"></loading>
        <div class="sgx-title">
            <h1><a href="./"><img src="icons/arrow-left-blue.svg" class="separate back"></a> Register an Employee</h1>
        </div>
        <form @submit="handleSubmit">
            <div class="sgx-table">
                <div class="form-about">
                    Employee Information
                </div>
                <div class="table-wrapper">
                    <table class="table">
                      <thead>
                        <tr>
                            <th colspan="99">Work Information</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td class="sgx-w-200 cell-title">Company</td>
                            <td class="sgx-w-300 input-td">
                                <select v-model="form.company_id" :class="v$.form.company_id.$errors.length > 0 ? 'error' : ''">
                                    <option v-for="company in listCompany.data" :value="company.id">{{ company.name }}</option>
                                </select>
                            </td>
                            <td><em class="o5" v-for="error of v$.form.company_id.$errors" :key="error.$uid">{{ error.$message }}</em></td>
                        </tr>
                        <tr>
                            <td class="sgx-w-200 cell-title">Department</td>
                            <td class="sgx-w-300 input-td">
                                 <select v-model="form.department_id" :class="v$.form.department_id.$errors.length > 0 ? 'error' : ''">
                                    <option v-for="department in listDepartment.data" :value="department.id">{{ department.name }}</option>
                                </select>
                            </td>
                            <td>
                                <em class="o5" v-for="error of v$.form.department_id.$errors" :key="error.$uid">{{ error.$message }}</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="sgx-w-200 cell-title">Name</td>
                            <td class="sgx-w-300 input-td"><input type="text" v-model="form.name" :class="v$.form.name.$errors.length > 0 ? 'error' : ''"></td>
                            <td><em class="o5" v-for="error of v$.form.name.$errors" :key="error.$uid">{{ error.$message }}</em></td>
                        </tr>
                        <tr>
                            <td class="sgx-w-200 cell-title">NIK</td>
                            <td class="sgx-w-300 input-td"><input type="text" v-model="form.nik" :class="v$.form.nik.$errors.length > 0 ? 'error' : ''"></td>
                            <td><em class="o5" v-for="error of v$.form.nik.$errors" :key="error.$uid">{{ error.$message }}</em></td>
                        </tr>
                        <tr>
                            <td class="sgx-w-200 cell-title">Status</td>
                            <td class="sgx-w-300 input-td">
                                <select v-model="form.active" :class="v$.form.active.$errors.length > 0 ? 'error' : ''">
                                    <option :value="true">Active</option>
                                    <option :value="false">Inactive</option>
                                </select>
                            </td>
                            <td><em class="o5" v-for="error of v$.form.active.$errors" :key="error.$uid">{{ error.$message }}</em></td>
                        </tr>
                        <tr>
                            <td class="sgx-w-200 cell-title">Join Date</td>
                            <td class="sgx-w-300 input-td"><input type="date" v-model="form.joined" :class="v$.form.joined.$errors.length > 0 ? 'error' : ''"></td>
                            <td><em class="o5" v-for="error of v$.form.joined.$errors" :key="error.$uid">{{ error.$message }}</em></td>
                        </tr>
                        <tr>
                            <td class="sgx-w-200 cell-title">Date of Birth</td>
                            <td class="sgx-w-300 input-td"><input type="date" v-model="form.dob" :class="v$.form.dob.$errors.length > 0 ? 'error' : ''"></td>
                            <td><em class="o5" v-for="error of v$.form.dob.$errors" :key="error.$uid">{{ error.$message }}</em></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="sgx-form">
                <div class="form-section brd-bottom brd-top">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-sea hms-btn add-spinner white-spinner pop">Save</button>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Modal Search -->
        <div class="modal anchor-modal fase show d-block" id="general-dialog" v-if="showModalInfo">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="img/modal-head.jpg">
                    </div>
                    <div class="modal-body">
                        <div v-if="showModalInfoType == 'success'" class="alert alert-success" role="alert">Data has been successfully recorded</div>
                        <div v-if="showModalInfoType == 'error'" class="alert alert-danger" role="alert">Error in form submissions. Please try again.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn hms-btn btn-light pop" data-dismiss="modal" @click="closeModalInfo">Okay</button>
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
            'showModalInfo': false,
            'showModalInfoType': '',
            'listCompany': [],
            'listDepartment': [],
            'isLoading': false,
            'form' : {
                'company_id': '',
                'department_id': '',
                'name': '',
                'nik': '',
                'active': '',
                'joined': '',
                'dob': ''
            }
        }
    },
    methods: {
        async handleSubmit(e){
            e.preventDefault();

            const isFormCorrect = await this.v$.$validate();
            
            if (!isFormCorrect) return
            
            this.isLoading = true;
            // actually submit form
            axios.post(`${process.env.MIX_BASE_API_URL}/employees`, this.form)
            .then(resp => {
                this.showModalInfo = true;
                this.showModalInfoType = 'success';
                this.isLoading = false;

                this.form = {
                    'company_id': '',
                    'department_id': '',
                    'name': '',
                    'nik': '',
                    'active': '',
                    'joined': '',
                    'dob': ''
                };
            })
            .catch((err) => {
                
                if(err.response.status == 422){
                    console.log(err.response.data.errors);
                    let errorsBackend = err.response.data.errors;
                    for(const error in errorsBackend){
                        console.log("Error ", error);
                        this.v$.form[error].$errors.push({'$message': errorsBackend[error][0]});
                    }
                }else{
                    this.showModalInfo = true;
                    this.showModalInfoType = 'error';
                }
                
                this.isLoading = false;
            })
        },
        closeModalInfo(){
            this.showModalInfo = false;
            this.showModalInfoType = '';
        }
    },
    mounted() {
        axios.get(`${process.env.MIX_BASE_API_URL}/master/companies`)
        .then(resp => {                
            this.listCompany = resp.data;
            console.log(this.listCompany);
        })
        .catch((err) => {
            this.$swal({
                title: 'Error',
                text: 'Gagal mendapatkan data master, harap refresh halaman',
                icon: 'error'
            });
        });

        axios.get(`${process.env.MIX_BASE_API_URL}/master/departments`)
        .then(resp => {                
            this.listDepartment = resp.data;
            console.log(this.listDepartment);
        })
        .catch((err) => {
            this.$swal({
                title: 'Error',
                text: 'Gagal mendapatkan data master, harap refresh halaman',
                icon: 'error'
            });
        });
    },
    validations () {
        return {
            'form': { 
                'company_id': { required },
                'department_id': { required },
                'name': { required },
                'nik': { required },
                'active': { required },
                'joined': { required },
                'dob': { required },
            }, 
        }
    }
}
</script>
