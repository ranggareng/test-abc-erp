<template>
    <section id="content" class="font-inter">
        <div class="sgx-title">
            <h1>Employee Database</h1>
        </div>
        <div class="sgx-stats">
            <div class="item">
                <div class="big-val">242 <img src="icons/chart-line-blue.svg" class="icon o10"></div>
                <div class="small-val font-size-11"><img src="icons/users-dark.svg" class="inline-icon">Total Employees</div>
            </div>
            <div class="item">
                <div class="big-val text-success">190</div>
                <div class="small-val font-size-11"><img src="icons/users-dark.svg" class="inline-icon">Active Employees</div>
            </div>
            <div class="item">
                <div class="big-val text-danger">14</div>
                <div class="small-val font-size-11"><img src="icons/users-dark.svg" class="inline-icon">Inactive Employees</div>
            </div>
        </div>
        <div class="sgx-table alt">
            <div class="options no-scrollbar">
                <a href="employee-view.php" class="item">
                    <img src="icons/plus-dark.svg" class="icon">Register
                </a>
                <a href="#" class="item" data-toggle="modal" data-target="#search-tray">
                    <img src="icons/search-dark.svg" class="icon">Search
                </a>
            </div>
            <div class="info">
                <!-- <em>Showing 25 out items</em> -->
                <em>Showing 25 out of 240 filtered items - <a href="#">Remove Filter</a></em>
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
                   
                  </tbody>
                </table>
            </div>
            <div class="paginates text-right">
                <a href="#">Previous</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Next</a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data(){
        return {
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
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
