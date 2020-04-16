Ext.define('MyApp.store.Personnel', {
    extend: 'Ext.data.Store',
    
    alias: 'store.personnel',
    autoLoad:true,

    autoSync : true, // untuk memastikan, frontend sama backend sync selalu.. kasih tahhu yang lain dit

    fields: [
        'id','nama','birthplace','birthday', 'created_at', 'updated_at',
    ],

 

    proxy: {
        type: 'jsonp',
        api:{
            read: "http://localhost/extjs_latihan/php/read.php",
            update: "http://localhost/extjs_latihan/php/update.php",
            destroy: "http://localhost/extjs_latihan/php/destroy.php",
            create: "http://localhost/extjs_latihan/php/create.php",
            
            
        },
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    }
});
