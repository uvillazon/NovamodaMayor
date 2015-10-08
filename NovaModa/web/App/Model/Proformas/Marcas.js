/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define('App.Model.Proformas.Marcas', {
    extend: 'Ext.data.Model',
    fields: [
        {type: "string", name: "idmarca"},
        {type: "string", name: "id_proforma"},
        {type: "string", name: "coleccion"},
        {type: "string", name: "nombre"},
        {type: "string", name: "tipo"}
    ]
});