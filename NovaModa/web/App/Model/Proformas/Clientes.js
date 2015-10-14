/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define('App.Model.Proformas.Clientes', {
    extend: 'Ext.data.Model',
    fields: [
        {type: "string", name: "idcliente"},
        {type: "string", name: "codigo"},
        {type: "string", name: "apellido"},
        {type: "string", name: "nombre"},
        {type: "string", name: "nit"}
    ]
});