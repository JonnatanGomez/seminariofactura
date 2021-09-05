import AppListing from '../app-components/Listing/AppListing';

Vue.component('operacion-listing', {
    mixins: [AppListing],
    data() {
        return {
            showClienteFilter: false,
            clienteMultiselect: {},
            filters: {
                cliente: [],
            },
        }
    },
    watch: {
        showClienteFilter: function (newVal, oldVal) {
            this.clienteMultiselect = [];
        },
        clienteMultiselect: function(newVal, oldVal) {
            this.filters.cliente = newVal.map(function(object) { return object['key']; });
            this.filter('cliente', this.filters.cliente);
        }
    }
});