/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define('App.Model.Proformas.Almacenes', {
    extend: 'Ext.data.Model',
    fields: [
        {type: "string", name: "ciudad"},
        {type: "string", name: "idalmacen"},
        {type: "string", name: "nombre"},
        {type: "string", name: "codigo"},
        {type: "string", name: "direccion"},
        {type: "string", name: "nombrecompleto"}

    ]
});