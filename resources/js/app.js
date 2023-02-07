import { createApp } from 'vue'
import EmployeeComponent from './components/EmployeeComponent';

const app = createApp({});

app.component('employee-component', EmployeeComponent);
app.mount("#app");