function Peticion(){
    /**
     * 
     *     $.ajax({
            url: 'https://api.skydropx.com/v1/quotations/',
            beforeSend: function (xhr) {
                console.log("Entro");
                xhr.setRequestHeader ( "Authorization", "Token token=0DlPnjVUYq24lXB7ZOFF4zzawwO8GwC1j1LQFEdXMKst");
            },
            method: 'post',
            dataType: 'json',
            contentType: 'application/json',
            data: '{ "zip_from": "16020", "zip_to": "03400", "parcel": { "weight": "1", "height": "10", "width": "10", "length": "10" }, "carriers": [{ "name": "Estafeta" }, { "name": "Fedex" }, { "name": "Redpack" }, { "name": "Mensajeros urbanos" }] }',
            error: function(e){
                console.log(e.status);
                console.log(e.statusText);
                },
        }).done(function(data){
            console.log("Salio");
            console.log(data);
        });
    
     */
    
        /**
         * 
         *     var carriers = [];
        $.ajax({
            url: 'https://api.skydropx.com/v1/carriers',
            beforeSend: function (xhr) {
                console.log("Entro");
                xhr.setRequestHeader ( "Authorization", "Token token=0DlPnjVUYq24lXB7ZOFF4zzawwO8GwC1j1LQFEdXMKst");
            },
            method: 'GET',
            dataType: 'json',
            contentType: 'application/json',
            error: function(e){
                console.log(e.status);
                console.log(e.statusText);
                },
        }).done(function(data){
            console.log("Salio");
            //console.log(data.data);
           
            for(let i=0;i<data.data.length;i++){
                carriers.push( data.data[i].attributes.name );
            }
            
    
            
        });
    
    
        console.log(carriers);
         * 
         */
    
        var  cp = 10350;
        var destino = 3002;
        var weight  = 1;
        var height = 1;
        var width = 10;
        var length = 1;


        let datosApi = `{
            "zip_from": "5020", 
            "zip_to": "03400", 
            "parcel": { 
                "weight": "1", 
                "height": "10", 
                "width": "10", 
                "length": "10" 
            }, 
            "carriers":  
                [   {"name": "Fedex"},
                    {"name": "UPS"},
                    {"name": "Paquetexpress"},
                    {"name": "Sendex"},
                    {"name": "Carssa"},
                    {"name": "Quiken"},
                    {"name": "Tracusa"},
                    {"name": "Dostavista"},
                    {"name": "AMPM"},
                    {"name": "Ninetynineminutes"},
                    {"name": "Mensajerosurbanos"},
                    {"name": "Moova"},
                    {"name": "Uber"},
                    {"name": "Dliver"},
                    {"name": "Zubut"},
                    {"name": "Treggo"},
                    {"name": "Chazki"},
                    {"name": "Estafeta"},
                    {"name": "Redpack"}
                ]

        }`;        
        console.log (typeof datosApi);


        //parseo para manipular los atributos del objeto JSON,

        const datosJson = JSON.parse(datosApi);
        console.log (typeof datosJson);


        datosJson.zip_from = cp;

        //se modifico la propiedad...
        console.log(datosJson);

        //parseamos de nuevo a cadena para mandar por petición ajax..
        const datosEnvio = JSON.stringify(datosJson);



        $.ajax({
        url: 'https://api.skydropx.com/v1/quotations/',
        beforeSend: function (xhr) {
            console.log("Entro");
            xhr.setRequestHeader ( "Authorization", "Token token=0DlPnjVUYq24lXB7ZOFF4zzawwO8GwC1j1LQFEdXMKst");
        },
        method: 'post',
        dataType: 'json',
        contentType: 'application/json',
        //data: '{ "zip_from": "10350", "zip_to": "03400", "parcel": { "weight": "1", "height": "10", "width": "10", "length": "10" }, "carriers":  [ {"name": "Fedex"},{"name": "UPS"},{"name": "Paquetexpress"},{"name": "Sendex"},{"name": "Carssa"},{"name": "Quiken"},{"name": "Tracusa"},{"name": "Dostavista"},{"name": "AMPM"},{"name": "Ninetynineminutes"},{"name": "Mensajerosurbanos"},{"name": "Moova"},{"name": "Uber"},{"name": "Dliver"},{"name": "Zubut"},{"name": "Treggo"},{"name": "Chazki"},{"name": "Estafeta"},{"name": "Redpack"}] }',
        data : datosEnvio,
        error: function(e){
            console.log(e.status);
            console.log(e.statusText);
            },
    }).done(function(data){
        console.log("Salio");
        console.log(data);
    });
    
    
    }
    
    
    
    