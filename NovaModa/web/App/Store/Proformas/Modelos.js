/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Modelos', {

    model: 'App.Model.Proformas.Modelos',
    //url: 'proformas/proformas',
    url: 'proformas/modelos',
    sortProperty: 'codigo',
    extend: 'App.Config.Abstract.Store',
    remoteSort : false,
    simpleSortMode : false
});