import _ from "lodash";
import axios from "axios";
import { createApp } from "vue";
import App from "./App.vue";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const app = createApp(App);
app.mount("#app");
