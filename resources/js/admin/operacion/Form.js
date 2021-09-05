import AppForm from '../app-components/Form/AppForm';

Vue.component('operacion-form', {
    mixins: [AppForm],
    props: [
        'cliente'
    ],
    data: function() {
        return {
            form: {
                total:  '' ,
                cliente:  '' ,
            }
        }
    }

});