/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define('App.Model.Proformas.CodigosBarra', {
    extend: 'Ext.data.Model',
    fields: [
        {type: "float", name: "cantidad"},
        {type: "string", name: "talla"},
        {type: "float", name: "codigobarra" , useNull : true}

    ]
});