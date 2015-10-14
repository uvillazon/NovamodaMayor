/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Clientes', {

    model: 'App.Model.Proformas.Clientes',
    url: 'clientes/clientes',
    //url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'nombre',
    extend: 'App.Config.Abstract.Store'
});