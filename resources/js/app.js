
import { createApp } from 'vue'
import EmployeeComponent from './components/EmployeeComponent';
import CreateEmployeeComponent from './components/CreateEmployeeComponent';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
const app = createApp({});

app.use(VueSweetalert2);
app.component('employee-component', EmployeeComponent);
app.component('create-employee-component', CreateEmployeeComponent);
app.mount("#app");