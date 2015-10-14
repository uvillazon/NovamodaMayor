/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define('App.Model.Proformas.Empleados', {
    extend: 'Ext.data.Model',
    fields: [
        {type: "string", name: "idempleado"},
        {type: "string", name: "codigo"},
        {type: "string", name: "apellidos"},
        {type: "string", name: "nombres"},
        {type: "string", name: "telefono"}
    ]
});