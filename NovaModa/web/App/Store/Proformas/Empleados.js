/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Empleados', {

    model: 'App.Model.Proformas.Empleados',
    url: 'empleados/empleados',
    //url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'nombres',
    extend: 'App.Config.Abstract.Store'
});