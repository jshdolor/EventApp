import App from "~/Framework/Components/Application";
import Store from '~/Framework/Store';

import { Notification } from '~/Framework/Plugins/BootstrapVue';
class Bootstrap {
    init() {

        window.Store = Store;

        let app = new Vue({
            render: h => {
                return h(App);
            },
            store : Store
        });

        app.$mount("#app");
        window.$notify = Notification.notify
    }
}

export default Bootstrap;
