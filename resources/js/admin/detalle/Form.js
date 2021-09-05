import AppForm from '../app-components/Form/AppForm';

Vue.component('detalle-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                idoperacion:  '' ,
                idproducto:  '' ,
                
            }
        }
    }

});