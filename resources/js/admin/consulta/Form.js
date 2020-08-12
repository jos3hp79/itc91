import AppForm from '../app-components/Form/AppForm';

Vue.component('consulta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                Nombre:  '' ,
                Telefono:  '' ,
                edad:  '' ,
                Fechadecita:  '' ,
                
            }
        }
    }

});